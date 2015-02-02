<?php
/**
 * Configuration-File
 */

$sqlServer = "<youre-host>";
$sqlUser ="<youre-user>";
$sqlPasswort="<youre-pass>";
$sqlDatenbank="<youre-database>";
$PassSalt1="bQ423hbHM8Sbdb9pjquUQU1IWxcxnybBSjqnyBJ23HjqnI3WbkxUQsxnPw813jkq";//random phrase
$PassSalt2="cH!swe!retReGu7W6bEDRup7usuDUh9THeD2CHeGE*ewr4n39=E@rAsp7c-Ph@pH";//random phrase
$DebuggingMode = false;

 DEFINE("SQL_HOST", $sqlServer);
 DEFINE("SQL_USER", $sqlUser);
 DEFINE("SQL_PASS", $sqlPasswort);
 DEFINE("SQL_DB", $sqlDatenbank);
 DEFINE("SALZ", $PassSalt1);
 DEFINE("SALZ2", $PassSalt2);