<?php
/**
 * File-Description
 * @author Kevin Kleinjung <info@kevin-kleinjung.de>
 */
$InputUsername = filter_input(INPUT_POST, "username");
$InputEmail = filter_input(INPUT_POST, "email");
$InputPassword = filter_input(INPUT_POST, "password");
$InputPasswordRepeat = filter_input(INPUT_POST, "password_repeat");
$RegUser = new SniMa\Models\User();
$RegistrationResult=$RegUser->Register($InputUsername, $InputPassword, $InputPasswordRepeat,$InputEmail);
if($RegistrationResult==TRUE){
    if(isset($_SESSION["regerror"])){unset($_SESSION["regerror"]);}
    require ROOTPFAD."/views/dashboard.php";exit();
}
else{$_SESSION["regerror"]=true;}