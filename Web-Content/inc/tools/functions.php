<?php


function HtmlLinkedText($Text,$Link="#")
{
    return "<a href=\"$Link\">$Text</a>";
}

function time_elapsed_string($ptime)
{
    error_reporting(E_ALL);
    $etime = time() - $ptime;
    if ($etime < 1){return '0 sec.';}
    $a = array( 365 * 24 * 60 * 60  => \SniMa\Tools\languageLoader::Get('time_year'),
                 30 * 24 * 60 * 60  =>  \SniMa\Tools\languageLoader::Get('time_month'),
                      24 * 60 * 60  =>  \SniMa\Tools\languageLoader::Get('time_day'),
                           60 * 60  =>  \SniMa\Tools\languageLoader::Get('time_hour'),
                                60  =>  \SniMa\Tools\languageLoader::Get('time_minute'),
                                 1  =>  \SniMa\Tools\languageLoader::Get('time_second')
                );
    $a_plural = array( \SniMa\Tools\languageLoader::Get('time_year')   => \SniMa\Tools\languageLoader::Get('time_plural_year'),
                       \SniMa\Tools\languageLoader::Get('time_month')  => \SniMa\Tools\languageLoader::Get('time_plural_month'),
                       \SniMa\Tools\languageLoader::Get('time_day')    => \SniMa\Tools\languageLoader::Get('time_plural_day'),
                       \SniMa\Tools\languageLoader::Get('time_hour')   => \SniMa\Tools\languageLoader::Get('time_plural_hour'),
                       \SniMa\Tools\languageLoader::Get('time_minute') => \SniMa\Tools\languageLoader::Get('time_plural_minute'),
                       \SniMa\Tools\languageLoader::Get('time_second') => \SniMa\Tools\languageLoader::Get('time_plural_second'),
                );
    foreach ($a as $secs => $str)
    {
        $d = $etime / $secs;
        if ($d >= 1)
        {
            $r = round($d);
            $Returnstring = \SniMa\Tools\languageLoader::Get("time_ago_string");
            
            $Returnstring_stepa = str_replace("%1", $r, $Returnstring);
            return str_replace("%2", ($r > 1 ? $a_plural[$str] : $str), $Returnstring_stepa);
        }    
    }
}


function LanguageStringsToTemplate()
{
    $Template = new \RainTPL();
    $LangVars = \SniMa\Tools\languageLoader::GetAllStrings();
    foreach ($LangVars as $LangIdentifier)
    {
        $Template->assign($LangIdentifier,  \SniMa\Tools\languageLoader::Get($LangIdentifier));
    }
    
    $SnippetsByLangNav="";
    $CodeLangs = \SniMa\Models\Langs::AllLanguages();
    foreach ($CodeLangs as $cc)
    {
        $SnippetsByLangNav.="<li><a href=\"index.php?page=by-language&lang=".$cc["id"]."\">".$cc['name']."</a></li>";
    }
    $Template->assign("snippetLangList",$SnippetsByLangNav);
    
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

function niceDatetime($timestamp)
{
    return date("d.m.Y",$timestamp)." | ".date("H:i",$timestamp);
}