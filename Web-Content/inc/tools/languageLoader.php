<?php
/**
 * Class containing file
 * @author Kevin Kleinjung <info@kevin-kleinjung.de>
 * @package SniMa
 */

namespace SniMa\Tools;

define("LL_LANG","de");
define("LL_LANGPATH","/inc/lang/");

/**
 * Description of languageLoader
 *
 * @author Kevin Kleinjung <info@kevin-kleinjung.de>
 */
class languageLoader
{   
    /**
     * Returns the content of given String from the Lang-Json file
     * @param string $Var
     * @return string
     */
    public static function Get($Var)
    {
        $LangVars = json_decode(file_get_contents(ROOTPFAD.LL_LANGPATH.LL_LANG.".json"),true);
        return $LangVars[$Var];
    }
    
    /**
     * List all Languages aviable
     * @return array List of Languages aviable
     */
    public static function ListLanguages()
    {
        $LanguageFiles = scandir(ROOTPFAD.LL_LANGPATH);
        $Languages = array();
        foreach ($LanguageFiles as $LangFile){array_push($Languages, str_replace(".json", "", $LangFile));}
        return $Languages;
    }
    
    public static function GetAllStrings()
    {
        $LangVars = json_decode(file_get_contents(ROOTPFAD.LL_LANGPATH.LL_LANG.".json"),false);
        $ReturnArray = array();
        foreach ($LangVars as $Identifier=>$Value)
        {
            array_push($ReturnArray, $Identifier);
        }
        
        return $ReturnArray;
    }
}
