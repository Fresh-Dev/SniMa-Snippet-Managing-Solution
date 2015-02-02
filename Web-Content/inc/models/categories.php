<?php

/**
 * Class containing file
 * @author Kevin Kleinjung <info@kevin-kleinjung.de>
 * @package Error on line 5, column 15 in Templates/Scripting/PHPClass.php
  Expecting a string, date or number here, Expression project is instead a freemarker.template.SimpleHash
 */

namespace SniMa\Models;

/**
 * Description of categories
 *
 * @author Kevin Kleinjung <info@kevin-kleinjung.de>
 */
class Categories
{
    var $Count;
    
    public function __construct() 
    {
        $DB = \db::inst();$Qr=$DB->query("SELECT COUNT(*) FROM `categories`;");
        $Res=$Qr->fetchAll();
        $this->Count = intval($Res[0]['COUNT(*)']);
    }
    
    /**
     * Returns every entry of categories as array
     * @return array
     */
    public static function AllCategories()
    {
        $DB = \db::inst();$Qr=$DB->query("SELECT * FROM `categories`;");
        $Res=$Qr->fetchAll();
        return $Res;
    }
}
