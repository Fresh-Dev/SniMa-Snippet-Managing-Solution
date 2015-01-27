<?php
/**
 * @author Kevin Kleinjung <info@kevin-kleinjung.de>
 */
namespace SniMa;

if(isset($_SESSION['snima_username']))
{
    $Session = new Models\Sessions();    
    $Session->VerifyByToken($_SESSION["snima_username"]);
}
else{require ROOTPFAD."/views/login.php";}

/*Default-Assignments*/
$System = new Models\System();
$Comments = new Models\Comments();
$Languages = new Models\Langs();
$Snippets = new Models\Snippets();
$Template = LanguageStringsToTemplate();

$Template->assign("sitename",$System->Sitename);
$Template->assign("pagename", Tools\languageLoader::Get("register_pagetitle"));
$Template->assign("lang",LL_LANG);

$Template->assign("messagesDropdown","");
$Template->assign("commentsDropdown",$Comments->UsersNotificationDropdown($Session->Uid));
$Template->assign("dropdown_languages",$Languages->DropdownLanguages());
$Template->assign("num_totalSnippets",$Snippets->TotalSnippetCount);
$Template->assign("num_newcomments",0);
$Template->assign("num_newmessages",0);

$OpenSnippet = $Snippets->GetSnippet(filter_input(INPUT_GET, "snippet"))[0];

$Template->assign("langName",$Languages->GetLang($OpenSnippet["language"])["name"]);

$Template->assign("headline",$OpenSnippet["title"]);
$Template->assign("snippetAuthor",  Models\User::GetUser($OpenSnippet["user"])["username"]);

$Template->assign("snippetCreated",  date("d.m.Y",$OpenSnippet["composed"])." | ".date("H:i",$OpenSnippet["composed"]));
$Template->assign("snippetSource",$OpenSnippet["content"]);
$Template->assign("snippetCodeMode",$Languages->GetLang($OpenSnippet["language"])["acefile"]);

$Template->assign("num_views",9);
$Template->assign("num_comments",9);
$Template->assign("username","Kevin Kleinjung");
$Template->assign("copyrightName",  "Kevin Kleinjung");
$Template->assign("copyrightYear","2015");



$Template->draw("snippet");
exit();