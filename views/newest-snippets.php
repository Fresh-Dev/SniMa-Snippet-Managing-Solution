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
$Template = new \RainTPL();
$Template->assign("sitename",$System->Sitename);
$Template->assign("pagename", "Neuste Snippets");
$Template->assign("lang",LL_LANG);

$Template->assign("messagesDropdown","");
$Template->assign("commentsDropdown","");


$Template->assign("str_myAccount",  Tools\languageLoader::Get("str_myAccount"));
$Template->assign("str_logout",  Tools\languageLoader::Get("str_logout"));
$Template->assign("str_search",  Tools\languageLoader::Get("str_search"));
$Template->assign("home_sitename",  Tools\languageLoader::Get("home_sitename"));
$Template->assign("str_newSnippet",  Tools\languageLoader::Get("str_newSnippet"));
$Template->assign("str_mySnippets",  Tools\languageLoader::Get("str_mySnippets"));
$Template->assign("str_newest",  Tools\languageLoader::Get("str_newest"));
$Template->assign("str_mostCommented",  Tools\languageLoader::Get("str_mostCommented"));
$Template->assign("str_mostViewed",  Tools\languageLoader::Get("str_mostViewed"));
$Template->assign("str_snippetsByLanguage",  Tools\languageLoader::Get("str_snippetsByLanguage"));
$Template->assign("str_myAccount",  Tools\languageLoader::Get("str_myAccount"));
$Template->assign("str_logout",  Tools\languageLoader::Get("str_logout"));
$Template->assign("str_home", Tools\languageLoader::Get("str_home"));
$Template->assign("str_snippets",  Tools\languageLoader::Get("str_snippets"));
$Template->assign("num_newmessages",0);

$Snippets = new Models\Snippets();
$Template->assign("num_totalSnippets",$Snippets->TotalSnippetCount);
$Template->assign("str_totalSnippets",Tools\languageLoader::Get("str_totalSnippets"));
$Template->assign("str_newmessages",Tools\languageLoader::Get("str_newmessages"));
$Template->assign("str_viewall",Tools\languageLoader::Get("str_viewall"));
$Template->assign("num_newcomments",0);
$Template->assign("str_newcomments",Tools\languageLoader::Get("str_newcomments"));
$Template->assign("str_snippetName",Tools\languageLoader::Get("str_snippetName"));
$Template->assign("str_description",Tools\languageLoader::Get("str_description"));
$Template->assign("str_tags",Tools\languageLoader::Get("str_tags"));
$Template->assign("label_code",Tools\languageLoader::Get("label_code"));
$Template->assign("str_save",Tools\languageLoader::Get("str_save"));
$Template->assign("str_reset",Tools\languageLoader::Get("str_reset"));
$Template->assign("str_private",Tools\languageLoader::Get("str_private"));
$Template->assign("str_select",Tools\languageLoader::Get("str_select"));
$Languages = new Models\Langs();
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


$Template->assign("snippetList",$Snippets->ListAllSnippets());




$Template->assign("view_headline","Neuste Snippets");

$Template->draw("snippet-list");
exit();