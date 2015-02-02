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
        $this->CountAllUserMessages = intval($Res[0]['COUNT(*)']);
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
        
        $Session = new Sessions();
        $Session->VerifyByToken($_SESSION["snima_username"]);
        $from = $Session->Uid;        
        $DB = \db::inst();
        $DB->query("INSERT INTO `messages` (`from` ,`to` ,`message` ,`senddate`) VALUES ('$from','$To', '$Message', '".time()."');");
    }
    
    public function ReadMessage($ID)
    {
        $DB = \db::inst();
        $DB->query("UPDATE `messages` SET `readdate` = '".time()."' WHERE `id` =$ID;");
    }
    
    public function TrashMessage($ID)
    {
        $DB = \db::inst();
        $DB->query("DELETE FROM `messages` WHERE `id` =$ID;");
    }
   
    public function GetMessage($ID)
    {
        $DB = \db::inst();
        $QueryResult = $DB->query("SELECT * FROM `messages` WHERE `id` =$ID;");
        $Message = $QueryResult->fetchAll();        
        return $Message[0];
    }
    
    public function MessageDropdown()
    {
        $UnreadedMessages = $this->GetUnreadUserMessages();
        $Return = "";
        if(count($UnreadedMessages)>0)
        {
            foreach ($UnreadedMessages as $msg)
            {
                $UserFrom = User::GetUser($msg["from"]);
                $Return .= '<li><a href="index.php?page=messages&message='.$msg["id"].'"><div><strong>'.$UserFrom["username"].'</strong><span class="pull-right text-muted"><em>'.time_elapsed_string($msg["senddate"]).'</em></span></div><div>'.string_trim($msg["message"],30).'</div></a></li><li class="divider"></li>';
            }        
        }
        else
        {
            $Return.="<li><a href=\"#\">".\SniMa\Tools\languageLoader::Get("str_noNewMessages")."</a></li>";
        }
        return $Return;
    }
    
    public function ReadedAllMsg()
    {
        $UnreadMessages = $this->GetUnreadUserMessages();
        foreach ($UnreadMessages as $msg){$this->ReadMessage($msg["id"]);}
    }
    
    public function TrashAllMsg()
    {
        $AllMessages = $this->GetAllUserMessages();
        foreach ($AllMessages as $msg){$this->TrashMessage($msg["id"]);}
    }
    
}
