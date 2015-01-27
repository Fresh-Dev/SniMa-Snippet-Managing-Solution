<?php
/**
 * @author Kevin Kleinjung <info@kevin-kleinjung.de>
 */
namespace SniMa;

$System = new Models\System();
$Template = new \RainTPL();
$Template->assign("sitename",$System->Sitename);
$Template->assign("pagename", Tools\languageLoader::Get("register_pagetitle"));
 
$Template->assign("register_title",Tools\languageLoader::Get("register_pagetitle"));
$Template->assign("register_error",Tools\languageLoader::Get("register_error"));
$Template->assign("register_success",Tools\languageLoader::Get("register_success"));
$Template->assign("label_username",Tools\languageLoader::Get("label_username"));
$Template->assign("label_email",Tools\languageLoader::Get("label_email"));
$Template->assign("label_password",Tools\languageLoader::Get("label_password"));
$Template->assign("help_password",Tools\languageLoader::Get("help_password"));
$Template->assign("help_username",Tools\languageLoader::Get("help_username"));
$Template->assign("label_password_repeat",Tools\languageLoader::Get("label_password_repeat"));
$Template->assign("str_select",Tools\languageLoader::Get("str_select"));
$Template->assign("str_validate",Tools\languageLoader::Get("str_validate"));
$Template->assign("str_cancel",Tools\languageLoader::Get("str_cancel"));

if(isset($_SESSION["regerror"]) && $_SESSION["regerror"]==true){$Template->assign("regError",true);}else{$Template->assign("regError",false);}
$Template->assign("lang",LL_LANG); 

$Template->draw("registration");
exit();