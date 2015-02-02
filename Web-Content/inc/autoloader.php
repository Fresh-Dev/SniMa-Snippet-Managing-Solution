<?php
/**
 * Load the systems files.
 * 
 * All neccessary files, classes and pre-use settings are made in this file.
 */

@session_start();
require_once 'config.php';

if (!defined('ROOTPFAD'))
{
    DEFINE("ROOTPFAD", dirname(dirname(__FILE__)));
}
if (!defined('DS'))
{
    DEFINE("DS", "/");
}

if (!defined('SQLPREFIX'))
{
    DEFINE("SQLPREFIX", "mysql");
}


/**
 * Loading Basic-Classes
 */
load(ROOTPFAD . DS . "inc" . DS . "Basics" . DS . "templating.php");
load(ROOTPFAD . DS . "inc" . DS . "Basics" . DS . "pdoSql.php");
load(ROOTPFAD . DS . "inc" . DS . "Basics" . DS . "Cryptographie.php");

/**
 * Loading Tool-Classes
 */
load(ROOTPFAD . DS . "inc" . DS . "tools" . DS . "array_multisort.php");
load(ROOTPFAD . DS . "inc" . DS . "tools" . DS . "functions.php");
load(ROOTPFAD . DS . "inc" . DS . "tools" . DS . "languageLoader.php");

/**
 * Loading Model-Classes
 */
load(ROOTPFAD.DS."inc".DS."models".DS."user.php");
load(ROOTPFAD.DS."inc".DS."models".DS."snippets.php");
load(ROOTPFAD.DS."inc".DS."models".DS."userrights.php");
load(ROOTPFAD.DS."inc".DS."models".DS."devices.php");
load(ROOTPFAD.DS."inc".DS."models".DS."system.php");
load(ROOTPFAD.DS."inc".DS."models".DS."sessions.php");
load(ROOTPFAD.DS."inc".DS."models".DS."categories.php");
load(ROOTPFAD.DS."inc".DS."models".DS."comments.php");
load(ROOTPFAD.DS."inc".DS."models".DS."langs.php");
load(ROOTPFAD.DS."inc".DS."models".DS."messages.php");
load(ROOTPFAD.DS."inc".DS."models".DS."authkeys.php");


load(ROOTPFAD.DS."views".DS."htmlWrapper".DS."htmlParser.php");



/**
 * Checks / Handles the Session-Init.
 */
if(isset($_SESSION["login"]) || strlen(filter_input(INPUT_COOKIE, "user"))>0)
{
    if(!isset($_SESSION["login"]))
    {
        $_SESSION["login"] = filter_input(INPUT_COOKIE, "user");
    }
    $Session = new Sessions();
    $SessionVerifyState = $Session->VerifyByToken($_SESSION["login"]);
    if($SessionVerifyState == true)
    {
        $SessionUserObject = new User(); 
        $SessionUser = $SessionUserObject->GetUser($Session->Uid);
        $_SESSION["username"] = $SessionUser["username"];
        $UserRights = new UserRights();
        $UserRights->GetUsersRights($Session->Uid);
        $ViewFilePage = "views/dashboard.php";
    }    
}

/**
 * Configure Templating-Engine
 */
\raintpl::$tpl_dir = "templates/default/pages/";
\raintpl::$cache_dir = "templates/_cache/";
\raintpl::$tpl_ext = "tpl";

/**
 * Loads a file if existing
 * @param string $File Filepath
 */
function load($File)  
{
    if (file_exists($File))
    {
        require ($File);
    }
}
