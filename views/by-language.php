<?php

/**
 * File-Description
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
$Snippets = new Models\Snippets();
$Languages = new Models\Langs();

$Template = LanguageStringsToTemplate();
$Template->assign("sitename",$System->Sitename);
$Template->assign("pagename", Tools\languageLoader::Get("home_sitename"));
$Template->assign("lang",LL_LANG);
$Template->assign("messagesDropdown","");
$Template->assign("commentsDropdown","");
$Template->assign("num_newmessages",0);
$Template->assign("num_newcomments",0);
$Template->assign("num_totalSnippets",$Snippets->TotalSnippetCount);
$Template->assign("dropdown_languages",$Languages->DropdownLanguages());
$Template->assign("str_snippetlanguage","Sprache");
$Template->assign("copyrightName",  "Kevin Kleinjung");
$Template->assign("copyrightYear","2015");
$LoggedInUser = Models\User::GetUser($Session->Uid);
if($LoggedInUser!=false){$Template->assign("username",$LoggedInUser["username"]);}

$Start=0;
$Entrycount=20;
$Lang="php";
$Sortby="id";

if(strlen(filter_input(INPUT_GET,"startpage"))>0){$Start=filter_input(INPUT_GET,"startpage");}
if(strlen(filter_input(INPUT_GET, "num"))>0){$Entrycount=filter_input(INPUT_GET,"num");}
if(strlen(filter_input(INPUT_GET, "lang"))>0){$Lang=filter_input(INPUT_GET,"lang");}
if(strlen(filter_input(INPUT_GET, "sortby"))>0){$Sortby=filter_input(INPUT_GET,"sortby");}
$Template->assign("snippetList",$Snippets->ListSnippetsByLang($Lang));

$Template->draw("snippet-list");
exit();