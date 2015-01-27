<?php
/**
 * @author Kevin Kleinjung <info@kevin-kleinjung.de>
 */
namespace SniMa;

$System = new Models\System();
$Template = new \RainTPL();
$Template->assign("sitename",$System->Sitename);
$Template->assign("lang","de");
$Template->assign("pagename", Tools\languageLoader::Get("login_pagetitle"));

$Template->assign("login_title", Tools\languageLoader::Get("login_title"));
$Template->assign("login_submit", Tools\languageLoader::Get("login_submit"));
$Template->assign("login_error",Tools\languageLoader::Get("login_error"));
$Template->assign("login_success",Tools\languageLoader::Get("login_success"));
$Template->assign("str_pleaseWait",Tools\languageLoader::Get("str_pleaseWait"));

$Template->assign("label_username", Tools\languageLoader::Get("label_username"));
$Template->assign("label_password", Tools\languageLoader::Get("label_password"));

$Template->assign("str_validate",Tools\languageLoader::Get("str_validate"));
$Template->assign("str_cancel",Tools\languageLoader::Get("str_cancel"));
$Template->assign("str_registration",Tools\languageLoader::Get("str_registration"));


$Template->assign("placeholder_username",Tools\languageLoader::Get("placeholder_username"));
$Template->assign("placeholder_password",Tools\languageLoader::Get("placeholder_password"));

if(isset($_SESSION["login_error"])){$Template->assign("loginerror",true);}else{$Template->assign("loginerror",false);}

$Template->assign("login_submit",Tools\languageLoader::Get("login_submit"));


$Template->draw("login");
exit();