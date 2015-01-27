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
$Messages = new Models\Messages($Session->Uid);


$Template = LanguageStringsToTemplate();
$Template->assign("sitename",$System->Sitename);
$Template->assign("lang",LL_LANG);
$Template->assign("messagesDropdown",$Messages->MessageDropdown());
$Template->assign("commentsDropdown",$Comments->UsersNotificationDropdown($Session->Uid));
$Template->assign("dropdown_languages",$Languages->DropdownLanguages());
$Template->assign("pagename", Tools\languageLoader::Get("home_sitename"));
$Template->assign("num_totalSnippets",$Snippets->TotalSnippetCount);
$Template->assign("num_newcomments",0);
$Template->assign("num_newmessages",$Messages->UnreadMessageCount);
$Template->assign("copyrightName",  "Kevin Kleinjung");
$Template->assign("copyrightYear","2015");
$LoggedInUser = Models\User::GetUser($Session->Uid);
if($LoggedInUser!=false){$Template->assign("username",$LoggedInUser["username"]);}
$Template->draw("home");
exit();