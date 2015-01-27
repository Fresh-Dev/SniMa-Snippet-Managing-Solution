<?php
/**
 * Configuration-File
 */

$sqlServer = "localhost";
$sqlUser ="root";
$sqlPasswort="";
$sqlDatenbank="snima";
$PassSalt1="bQ423hbHM8Sbdb9pjquUQU1IWxcxnybBSjqnyBJ23HjqnI3WbkxUQsxnPw813jka";
$PassSalt2="cH!swe!retReGu7W6bEDRup7usuDUh9THeD2CHeGE*ewr4n39=E@rAsp7c-Ph@pv";
$DebuggingMode = true;

 DEFINE("SQL_HOST", $sqlServer);
 DEFINE("SQL_USER", $sqlUser);
 DEFINE("SQL_PASS", $sqlPasswort);
 DEFINE("SQL_DB", $sqlDatenbank);
 DEFINE("SALZ", $PassSalt1);
 DEFINE("SALZ2", $PassSalt2);

 if ($DebuggingMode == true)
{
    error_reporting(E_ALL);
    require "debugging/kint/Kint.class.php";
}
else
{
    error_reporting(0);
}
