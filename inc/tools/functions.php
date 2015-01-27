<?php


function HtmlLinkedText($Text,$Link="#")
{
    return "<a href=\"$Link\">$Text</a>";
}

function time_elapsed_string($ptime)
{
    $etime = time() - $ptime;
    if ($etime < 1){return '0 sec.';}
    $a = array( 365 * 24 * 60 * 60  =>  'year',
                 30 * 24 * 60 * 60  =>  'month',
                      24 * 60 * 60  =>  'day',
                           60 * 60  =>  'hour',
                                60  =>  'minute',
                                 1  =>  'second'
                );
    $a_plural = array( 'year'   => 'years',
                       'month'  => 'months',
                       'day'    => 'days',
                       'hour'   => 'hours',
                       'minute' => 'minutes',
                       'second' => 'seconds'
                );
    foreach ($a as $secs => $str){$d = $etime / $secs;if ($d >= 1){$r = round($d);return $r . ' ' . ($r > 1 ? $a_plural[$str] : $str) . ' ago';}}
}


function LanguageStringsToTemplate()
{
    $Template = new \RainTPL();
    $LangVars = \SniMa\Tools\languageLoader::GetAllStrings();
    foreach ($LangVars as $LangIdentifier)
    {
        $Template->assign($LangIdentifier,  \SniMa\Tools\languageLoader::Get($LangIdentifier));
    }
    return $Template;
}

function string_trim($string, $trimLength = 30) {
    $length = strlen($string);
    if ($length > $trimLength) {
        $count = 0;
        $prevCount = 0;
        $array = explode(" ", $string);
        foreach ($array as $word) {
            $count = $count + strlen($word);
            $count = $count + 1;
            if ($count > ($trimLength - 3)) {
                return substr($string, 0, $prevCount) . "...";
            }
            $prevCount = $count;
        }
    } else {
        return $string;
    }
}