<?php

/**
 * Class containing file
 * @author Kevin Kleinjung <info@kevin-kleinjung.de>
 * @package Error on line 5, column 15 in Templates/Scripting/PHPClass.php
  Expecting a string, date or number here, Expression project is instead a freemarker.template.SimpleHash
 */

namespace SniMa\Models;

/**
 * Description of langs
 *
 * @author Kevin Kleinjung <info@kevin-kleinjung.de>
 */
class Langs
{
    var $Count;
    
    public function __construct() 
    {
        $DB = \db::inst();$Qr=$DB->query("SELECT COUNT(*) FROM `langs`;");$Cnt=$Qr->fetchAll();
        
        $this->Count = $Cnt[0]["COUNT(*)"];
    }
    
    public static function AllLanguages()
    {
        $DB = \db::inst();$Qr=$DB->query("SELECT * FROM `langs`;");
        return $Qr->fetchAll();        
    }
    
    public static function GetLang($ID)
    {
        $DB = \db::inst();$Qr=$DB->query("SELECT * FROM `langs` WHERE `id`=$ID;");
        $Res=$Qr->fetchAll();        
        return $Res[0];
    }
    
    public function DropdownLanguages()
    {
        $Groups = Categories::AllCategories();
        $Return = "";
        foreach ($Groups as $Grp)
        {
            $Langs = $this->GetLangsByCategorie($Grp["id"]);
            $Return .= '<optgroup label="'.$Grp["name"].'">';            
            foreach ($Langs as $Lang)
            {
                $Return.='<option data-lang-id="'.$Lang["id"].'" data-acemode="'.$Lang["acefile"].'" value="'.$Lang["acefile"].'">'.$Lang["name"].'</option>';
            }
            $Return .= '</optgroup>';
        }
        return $Return;
    }
    
    public function GetLangsByCategorie($Category)
    {
        $DB = \db::inst();$Qr=$DB->query("SELECT * FROM `langs` WHERE `category` =$Category;");
        return $Qr->fetchAll();
    }
    
    
}
