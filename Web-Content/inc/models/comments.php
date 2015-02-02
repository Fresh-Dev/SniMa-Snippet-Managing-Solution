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
    var $UnreadedCommentCount=0;
    
    public function __construct() 
    {   
        $Session = new Sessions();
        if($Session->VerifyByToken($_SESSION["snima_username"])==true)
        {
            $User = User::GetUser($Session->Uid);$Snippets = Snippets::AllUsersSnippets($User["id"]);
            foreach ($Snippets as $Snippet){$this->UnreadedCommentCount = $this->UnreadedCommentCount+$this->CountUnreadCommentsOfSnippet($Snippet["id"]);}
        }        
    }
    
    public function MarkAllCommentsReaded($SnippetID)
    {
        $Comments = $this->UnreadCommentsOfSnippet($SnippetID);
        foreach ($Comments as $Comment)
        {
            $DB = \db::inst();$DB->query("UPDATE `comments` SET `readDate` = '".time()."' WHERE `id` =".$Comment['id'].";");
        }
    }

    public function CountAllCommentsOfSnippet($SnippetID)
    {
        $DB = \db::inst();$Qr=$DB->query("SELECT COUNT(*) FROM `comments` WHERE `snippet`=$SnippetID;");
        $Res=$Qr->fetchAll();return intval($Res[0]['COUNT(*)']);
    }
    
    public function CountUnreadCommentsOfSnippet($SnippetID)
    {
        $DB = \db::inst();$Qr=$DB->query("SELECT COUNT(*) FROM `comments` WHERE `snippet`=$SnippetID AND `readDate` IS NULL;");        
        $Res=$Qr->fetchAll();return intval($Res[0]['COUNT(*)']);
    }
    
    public function AllCommentsOfSnippet($SnippetID)
    {
        $DB = \db::inst();$Qr=$DB->query("SELECT * FROM `comments` WHERE `snippet`=$SnippetID;");
        $Res=$Qr->fetchAll();return $Res;
    }
    
    public function UnreadCommentsOfSnippet($SnippetID)
    {
        $DB = \db::inst();$Qr=$DB->query("SELECT * FROM `comments` WHERE `snippet`=$SnippetID AND `readDate` IS NULL;");
        $Res=$Qr->fetchAll();
        return $Res;
    }
    
    public function UsersNotificationDropdown()
    {
        $Session = new Sessions();$Session->VerifyByToken($_SESSION["snima_username"]);
        $User = User::GetUser($Session->Uid);        
        $Snippets = Snippets::AllUsersSnippets($User["id"]);        
        $Return = array();        
        foreach ($Snippets as $Snippet)
        {
            if(count($this->UnreadCommentsOfSnippet($Snippet["id"]))>0)
            {
                array_push($Return, $this->UnreadCommentsOfSnippet($Snippet["id"]));
            }            
        }
        return $Return[0];
    }
    
    public function WriteComment($SnippetID,$Message)
    {
        $Session = new Sessions();$Session->VerifyByToken($_SESSION["snima_username"]);
        $Query  = "INSERT INTO `comments` (`snippet` ,`user` ,`text` ,`composeDate`) VALUES ('$SnippetID',  '$Session->Uid', '$Message', '".time()."');";
        $DB = \db::inst();
        $DB->query($Query);        
        $AllComments = $this->AllCommentsOfSnippet($SnippetID);
        return $AllComments[count($AllComments)-1];
    }    
}
