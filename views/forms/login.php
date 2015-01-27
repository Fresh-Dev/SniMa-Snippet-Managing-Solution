<?php
/**
 * File-Description
 * @author Kevin Kleinjung <info@kevin-kleinjung.de>
 */

//FILTER ALL POST-INPUTS
$InputUsername = filter_input(INPUT_POST, "username");
$InputPassword = filter_input(INPUT_POST, "password");
$UserObject = new SniMa\Models\User;
$LoginResult = $UserObject->Login($InputUsername, $InputPassword);

if($LoginResult==true){unset($_SESSION["login_error"]);require(ROOTPFAD.DS."views".DS."dashboard.php");exit();}
    else{$_SESSION["login_error"]=true;require(ROOTPFAD.DS."views".DS."login.php");exit();}