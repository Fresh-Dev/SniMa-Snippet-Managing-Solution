<?php

/**
 * Class containing file
 * @author Kevin Kleinjung <info@kevin-kleinjung.de>
 * @package Error on line 5, column 15 in Templates/Scripting/PHPClass.php
  Expecting a string, date or number here, Expression project is instead a freemarker.template.SimpleHash
 */

namespace SniMa\Models;

/**
 * Description of comments
 *
 * @author Kevin Kleinjung <info@kevin-kleinjung.de>
 */
class Comments
{
    var $SnippetID;
    
    
    public function CountAllCommentsOfSnippet($SnippetID)
    {
        $DB = \db::inst();$Qr=$DB->query("SELECT COUNT(*) FROM `comments` WHERE `snippet`=$SnippetID;");
        $Res=$Qr->fetchAll();
        return intval($Res[0]['COUNT(*)']);
    }
    
    public function CountUnreadCommentsOfSnippet($SnippetID)
    {
        $DB = \db::inst();$Qr=$DB->query("SELECT COUNT(*) FROM `comments` WHERE `snippet`=$SnippetID AND `readDate`= NULL;");
        
        $Res=$Qr->fetchAll();
        d($Res);
        return intval($Res[0]['COUNT(*)']);
    }
    
     public function AllCommentsOfSnippet($SnippetID)
    {
        $DB = \db::inst();$Qr=$DB->query("SELECT * FROM `comments` WHERE `snippet`=$SnippetID;");
        $Res=$Qr->fetchAll();return $Res;
    }
    
    public function UnreadCommentsOfSnippet($SnippetID)
    {
        $DB = \db::inst();$Qr=$DB->query("SELECT * FROM `comments` WHERE `snippet`=$SnippetID AND `readDate` LIKE 'NULL';");
        $Res=$Qr->fetchAll();return $Res;
    }
    
    public function UsersNotificationDropdown()
    {
   
    }
    
}
