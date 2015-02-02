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
    
    /**
     * 
     * @param integer $Id
     * @return array
     */
    public static function GetSnippet($Id)
    {
        $DB = \db::inst();$Qr=$DB->query("SELECT * FROM `snippets` WHERE `id`=$Id;");
        $Res=$Qr->fetchAll();
        return $Res;
    }
    
    /**
     * 
     * @param integer $Snippet
     * @return string
     */
    private function EditButtonIfUsersSnippet($Snippet)
    {
         $Session = new Sessions();
         $Session->VerifyByToken($_SESSION["snima_username"]);
         $UID = $Session->Uid;
         if($Snippet["user"] == $UID)
         {
             return "<a href=\"index.php?page=snippet&snippet=".$Snippet["id"]."&action=edit\" class=\"btn btn-small btn-warning listEditBtn\">".\SniMa\Tools\languageLoader::Get("str_editSnippet")."</a>";
         }         
    }
    
    /**
     * 
     * @return string
     */
    public function ListAllSnippets($OrderBy="id",$Sort="ASC")
    {
        $DB = \db::inst();$Qr=$DB->query("SELECT * FROM `snippets` WHERE `private`=0 ORDER BY `$OrderBy` $Sort;");
        $Res=$Qr->fetchAll();
        $Return = "";
        
       foreach ($Res as $row)
        {
            $L=Langs::GetLang($row["language"]);        
            $C =new Comments();
            $ComNum=$C->CountAllCommentsOfSnippet($row["id"]);
            $Return.="<div class=\"snippetlist entrywrapper\">";
                $Return.="<div class=\"snippetlistHeadline\">".$this->EditButtonIfUsersSnippet($row)."<span class=\"snippetTitle\"><a href=\"index.php?page=snippet&snippet=".$row['id']."\" class=\"snippetlink\"><span class=\"snippetListLang\"><i class=\"fa fa-code\"></i> ".$L["name"]."</span>".$row["title"]."</a></span><span class=\"snippetComposed\"><i class=\"fa fa-calendar\"></i> ". date("d.m.Y",$row["composed"])." | ".date("H:i",$row["composed"])."</span><div style=\"clear:both;\"></div></div>";
                $Return.="<div class=\"snippetlistSubheadline\">";
                $Return.="<span class=\"snippetAuthor\"><a href=\"index.php?page=user&user=".$row["user"]." class=\"userlink\"><i class=\"fa fa-user\"></i> ". User::GetUser($row["user"])["username"]."</a></span><span class=\"snippetListInfoWrap\"><span class=\"snippetListViews\"><i class=\"fa fa-eye\"></i> ".$row["views"]."</span><span class=\"snippetListViews\"><i class=\"fa fa-comments\"></i> $ComNum</span></span><div style=\"clear:both;\"></div></div>";
                $Return.="<span class=\"snippetDescription\">".  $row["description"]."</span>";
            $Return.="</div>";
        }
        return $Return;
    }
    
    /**
     * 
     * @param type $Lang
     * @param type $Sortby
     * @return string
     */
    public function ListSnippetsByLang($Lang,$Sortby="id",$Order="DESC")
    {
        $DBx = \db::inst();
        $Qr=$DBx->query("SELECT * FROM `snippets` WHERE `private`=0 AND `language`=$Lang ORDER BY `$Sortby` $Order;");
        $Res=$Qr->fetchAll();
        $Return = "";
        
       foreach ($Res as $row)
        {
            $L=Langs::GetLang($row["language"]);        
            $C =new Comments();
            $ComNum=$C->CountAllCommentsOfSnippet($row["id"]);
            $Return.="<div class=\"snippetlist entrywrapper\">";
                $Return.="<div class=\"snippetlistHeadline\">".$this->EditButtonIfUsersSnippet($row)."<span class=\"snippetTitle\"><a href=\"index.php?page=snippet&snippet=".$row['id']."\" class=\"snippetlink\"><span class=\"snippetListLang\"><i class=\"fa fa-code\"></i> ".$L["name"]."</span>".$row["title"]."</a></span><span class=\"snippetComposed\"><i class=\"fa fa-calendar\"></i> ". date("d.m.Y",$row["composed"])." | ".date("H:i",$row["composed"])."</span><div style=\"clear:both;\"></div></div>";
                $Return.="<div class=\"snippetlistSubheadline\">";
                $Return.="<span class=\"snippetAuthor\"><a href=\"index.php?page=user&user=".$row["user"]." class=\"userlink\"><i class=\"fa fa-user\"></i> ". User::GetUser($row["user"])["username"]."</a></span><span class=\"snippetListInfoWrap\"><span class=\"snippetListViews\"><i class=\"fa fa-eye\"></i> ".$row["views"]."</span><span class=\"snippetListViews\"><i class=\"fa fa-comments\"></i> $ComNum</span></span><div style=\"clear:both;\"></div></div>";
                $Return.="<span class=\"snippetDescription\">".  $row["description"]."</span>";
            $Return.="</div>";
        }
        return $Return;
    }
    
    /**
     * 
     * @param string $UID
     * @return array
     */
    public static function AllUsersSnippets($UID)
    {
        $DBx = \db::inst();
        $sql = "SELECT * FROM `snippets` WHERE `user`=$UID;";
        $Qr=$DBx->query($sql);        
        $Res=$Qr->fetchAll();
        return $Res;
    }
       
    
    /**
     * 
     * @return string
     */
    public function ListMySnippet()
    {
        $Session = new Sessions();
        $Session->VerifyByToken($_SESSION["snima_username"]);
        $UID = $Session->Uid;    
        $DBx = \db::inst();$Qr=$DBx->query("SELECT * FROM `snippets` WHERE `user`=$UID;");$Res=$Qr->fetchAll();        
        $Return = "";        
       foreach ($Res as $row)
        {
            $L=Langs::GetLang($row["language"]);        
            $C =new Comments();
            $ComNum=$C->CountAllCommentsOfSnippet($row["id"]);
            $Return.="<div class=\"snippetlist entrywrapper\">";
                $Return.="<div class=\"snippetlistHeadline\">".$this->EditButtonIfUsersSnippet($row)."<span class=\"snippetTitle\"><a href=\"index.php?page=snippet&snippet=".$row['id']."\" class=\"snippetlink\"><span class=\"snippetListLang\"><i class=\"fa fa-code\"></i> ".$L["name"]."</span>".$row["title"]."</a></span><span class=\"snippetComposed\"><i class=\"fa fa-calendar\"></i> ". date("d.m.Y",$row["composed"])." | ".date("H:i",$row["composed"])."</span><div style=\"clear:both;\"></div></div>";
                $Return.="<div class=\"snippetlistSubheadline\">";
                $Return.="<span class=\"snippetAuthor\"><a href=\"index.php?page=user&user=".$row["user"]." class=\"userlink\"><i class=\"fa fa-user\"></i> ". User::GetUser($row["user"])["username"]."</a></span><span class=\"snippetListInfoWrap\"><span class=\"snippetListViews\"><i class=\"fa fa-eye\"></i> ".$row["views"]."</span><span class=\"snippetListViews\"><i class=\"fa fa-comments\"></i> $ComNum</span></span><div style=\"clear:both;\"></div></div>";
                $Return.="<span class=\"snippetDescription\">".  $row["description"]."</span>";
            $Return.="</div>";
        }
        return $Return;
    }
    
    /**
     * 
     * @param string $Titlepart
     * @return array
     */
    public static function SearchAllSnippets($Titlepart)
    {
        $DB = \db::inst();
        $QueryResult = $DB->init("SELECT * FROM `snippets` WHERE `title` LIKE '%$Titlepart%';");
        $Row = $QueryResult;
        return $Row;
    }
    
    /**
     * 
     * @param integer $SnippetID
     */
    public function AddView($SnippetID)
    {        
        $SnippetToUpdate = $this->GetSnippet($SnippetID)[0];
        $NewViewCount = intval($SnippetToUpdate["views"])+1;        
        $UpdateQuery = "UPDATE `snippets` SET `views` =$NewViewCount WHERE `id` =$SnippetID;";
        $DB = \db::inst();$DB->query($UpdateQuery);        
    }
    
}
