<?php

/**
 * Class containing file
 * @author Kevin Kleinjung <info@kevin-kleinjung.de>
 * @package Error on line 5, column 15 in Templates/Scripting/PHPClass.php
  Expecting a string, date or number here, Expression project is instead a freemarker.template.SimpleHash
 */

namespace SniMa\Models;

/**
 * Description of messages
 *
 * @author Kevin Kleinjung <info@kevin-kleinjung.de>
 */
class Messages
{
    var $User;
    
    var $TotalMessageCount;
    var $UnreadMessageCount;

    public function __construct($UserID)
    {
        $this->User = $UserID;        
        $this->CountUnreadUserMessages();
        $this->CountAllUserMessages();
    }
    
    public function CountUnreadUserMessages()
    {
        $DB = \db::inst();$Qr=$DB->query("SELECT COUNT(*) FROM `messages` WHERE `to`=".$this->User." AND `readdate` IS NULL;");
        $Res=$Qr->fetchAll();
        $this->UnreadMessageCount = intval($Res[0]['COUNT(*)']);
    }
    
    public function CountAllUserMessages()
    {
        $DB = \db::inst();$Qr=$DB->query("SELECT COUNT(*) FROM `messages` WHERE `to`=".$this->User.";");
        $Res=$Qr->fetchAll();        
        $this->UnreadMessageCount = intval($Res[0]['COUNT(*)']);
    }
    
    public function GetUnreadUserMessages()
    {
        $DB = \db::inst();$Qr=$DB->query("SELECT * FROM `messages` WHERE `to`=".$this->User." AND `readdate` IS NULL;");
        $Res=$Qr->fetchAll();
        return $Res;
    }
    
    public function GetAllUserMessages()
    {
        $DB = \db::inst();$Qr=$DB->query("SELECT * FROM `messages` WHERE `to`=".$this->User.";");
        $Res=$Qr->fetchAll();
        return $Res;
    }
    
    public function WriteMessage($To,$Message)
    {
        
    }
    
    public function ReadMessage($ID)
    {
        
    }
    
    public function MessageDropdown()
    {
        $UnreadedMessages = $this->GetUnreadUserMessages();
        $Return = "";
        
        foreach ($UnreadedMessages as $msg)
        {
            $UserFrom = User::GetUser($msg["from"]);
            $Return .= '<li><a href="index.php?page=messages&message='.$msg["id"].'"><div><strong>'.$UserFrom["username"].'</strong><span class="pull-right text-muted"><em>'.time_elapsed_string($msg["senddate"]).'</em></span></div><div>'.string_trim($msg["message"],30).'</div></a></li><li class="divider"></li>';
        }
        
        return $Return;
    }
    
}
