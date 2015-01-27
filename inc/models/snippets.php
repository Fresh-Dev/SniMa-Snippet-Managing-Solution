<?php
/**
 * Class containing file
 * @author Kevin Kleinjung <info@kevin-kleinjung.de>
 * @package SniMa
 */

namespace SniMa\Models;

/**
 * Description of snippets
 *
 * @author Kevin Kleinjung <info@kevin-kleinjung.de>
 */
class Snippets
{
    var $TotalSnippetCount;
    
    public function __construct() 
    {
        $DB = \db::inst();$Qr=$DB->query("SELECT COUNT(*) FROM `snippets`;");
        $Res=$Qr->fetchAll();$this->TotalSnippetCount = intval($Res[0]['COUNT(*)']);
    }
    
    /**
     * 
     * @param string $Title
     * @param string $Language
     * @param string $Description
     * @param string $Tags
     * @param string $Source
     * @param int $UserID
     * @param bool $Private
     */
    public function NewSnippet($Title,$Language,$Description,$Tags,$Source,$UserID,$Private=false)
    {
        $DB = \db::inst();
        $DB->query("INSERT INTO  `snima`.`snippets` (`user` ,`language` ,`title` ,`description` ,`tags` ,`content` ,`composed` ,`private`) VALUES ('$UserID',  '$Language',  '$Title',  '$Description',  '$Tags',  '$Source',  '".  time()."',  '".(int)$Private."');");
    }
    
    /**
     * 
     * @return array
     */
    public static function GetAll()
    {
        $DB = \db::inst();$Qr=$DB->query("SELECT * FROM `snippets`;");
        $Res=$Qr->fetchAll();
        return $Res;
    }
    
    public static function GetSnippet($Id)
    {
        $DB = \db::inst();$Qr=$DB->query("SELECT * FROM `snippets` WHERE `id`=$Id;");
        $Res=$Qr->fetchAll();
        return $Res;
    }

    public function ListAllSnippets()
    {
        $DB = \db::inst();$Qr=$DB->query("SELECT * FROM `snippets` WHERE `private`=0;");
        $Res=$Qr->fetchAll();
        $Return = "";
        
       foreach ($Res as $row)
        {
            $L=Langs::GetLang($row["language"]);        
            $Return.="<div class=\"snippetlist entrywrapper\">";
                $Return.="<div class=\"snippetlistHeadline\"><span class=\"snippetTitle\"><a href=\"index.php?page=snippet&snippet=".$row['id']."\" class=\"snippetlink\">[".$L["name"]."] - ".$row["title"]."</a></span><span class=\"snippetComposed\">". date("d.m.Y",$row["composed"])." | ".date("H:i",$row["composed"])."</span><div style=\"clear:both;\"></div></div>";
                $Return.="<div class=\"snippetlistSubheadline\">";
                $Return.="<span class=\"snippetAuthor\"><a href=\"index.php?page=user&user=".$row["user"]." class=\"userlink\">". User::GetUser($row["user"])["username"]."</a></span></div>";
                $Return.="<span class=\"snippetDescription\">".  $row["description"]."</span>";
            $Return.="</div>";
        }
        return $Return;
    }
    
    public function ListSnippetsByLang($Lang,$Sortby="id")
    {
        $DBx = \db::inst();
        $Qr=$DBx->query("SELECT * FROM `snippets` WHERE `private`=0 AND `language`=$Lang ORDER BY `$Sortby` DESC;");
        $Res=$Qr->fetchAll();
        $Return = "";
        
        foreach ($Res as $row)
        {
            $L=Langs::GetLang($row["language"]);        
            $Return.="<div class=\"snippetlist entrywrapper\">";
                $Return.="<div class=\"snippetlistHeadline\"><span class=\"snippetTitle\"><a href=\"index.php?page=snippet&snippet=".$row['id']."\" class=\"snippetlink\">[".$L["name"]."] - ".$row["title"]."</a></span><span class=\"snippetComposed\">". date("d.m.Y",$row["composed"])." | ".date("H:i",$row["composed"])."</span><div style=\"clear:both;\"></div></div>";
                $Return.="<div class=\"snippetlistSubheadline\">";
                $Return.="<span class=\"snippetAuthor\"><a href=\"index.php?page=user&user=".$row["user"]." class=\"userlink\">". User::GetUser($row["user"])["username"]."</a></span></div>";
                $Return.="<span class=\"snippetDescription\">".  $row["description"]."</span>";
            $Return.="</div>";
        }
        return $Return;
    }
    
    public static function AllUsersSnippets($UID)
    {
        $DBx = \db::inst();
        $sql = "SELECT * FROM `snippets` WHERE `user`=$UID;";
        $Qr=$DBx->query($sql);        
        $Res=$Qr->fetchAll();
        return $Res;
    }
    
    public function ListMySnippet()
    {
        $Session = new Sessions();
        $Session->VerifyByToken($_SESSION["snima_username"]);
        $UID = $Session->Uid;
    
        $DBx = \db::inst();
        $sql = "SELECT * FROM `snippets` WHERE `user`=$UID;";
        $Qr=$DBx->query($sql);
        
        $Res=$Qr->fetchAll();
        
        $Return = "";
        
        foreach ($Res as $row)
            {
            $L=Langs::GetLang($row["language"]);
        
            $Return.="<div class=\"snippetlist entrywrapper\">";
                $Return.="<div class=\"snippetlistHeadline\"><span class=\"snippetTitle\"><a href=\"index.php?page=snippet&snippet=".$row['id']."\" class=\"snippetlink\">[".$L["name"]."] - ".$row["title"]."</a></span><span class=\"snippetComposed\">". date("d.m.Y",$row["composed"])." | ".date("H:i",$row["composed"])."</span><div style=\"clear:both;\"></div></div>";
                $Return.="<div class=\"snippetlistSubheadline\">";
                $Return.="<span class=\"snippetAuthor\"><a href=\"index.php?page=user&user=".$row["user"]." class=\"userlink\">". User::GetUser($row["user"])["username"]."</a></span></div>";
                $Return.="<span class=\"snippetDescription\">".  $row["description"]."</span>";
            $Return.="</div>";
        }
        return $Return;
    }
    
    public static function SearchAllSnippets($Titlepart)
    {
        $DB = \db::inst();
        $QueryResult = $DB->init("SELECT * FROM `snippets` WHERE `title` LIKE '%$Titlepart%';");
        $Row = $QueryResult;
        return $Row;
    }
    
    
}
