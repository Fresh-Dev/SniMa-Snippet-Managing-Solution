<?php
/**
 * Class containing file
 * @author Kevin Kleinjung <info@kevin-kleinjung.de>
 * @package SniMa
 */

namespace SniMa\Models;

/**
 * Description of user
 *
 * @author Kevin Kleinjung <info@kevin-kleinjung.de>
 */
class User
{
    
    /**
     * 
     * @param string $Login Username or Email
     * @param string $Password Entered Password
     * @return boolean
     */
    public function Login($Login,$Password)
    {
        $DecryptedPassword = sperren_sha256_rijndael($Password, SALZ, SALZ2);
        
        $DBUsrCnt = \db::inst();$QRUsrCnt=$DBUsrCnt->query("SELECT COUNT(*) FROM `user` WHERE `username` = '$Login'");$UsrCnt=$QRUsrCnt->fetchAll();$UsrCntRes = $UsrCnt[0][0];
        
        $DB = \db::inst();$QR=$DB->query("SELECT * FROM `user` WHERE `username` = '$Login'");        
        
        if($UsrCntRes==0){return false;}
        else{
            $Rows = $QR->fetchAll();
            if(count($Rows)>0)
            {
                $Userrow = $Rows[0];
                if($Userrow['password'] == $DecryptedPassword)
                {
                    $Session = new Sessions();
                    $Token = $Session->NewSession($Userrow[0]);
                    $_SESSION["snima_username"] = $Token;
                    $_COOKIE["snima_username"]=$Token;
                    return true;
                }
                else{return false;}
            }
            else{$QueryMail = "SELECT * FROM `user` WHERE `email` = '$Login'";$DBMail = \db::inst();$DBMail->query($QueryMail);$RowsMail = $DB->fetchAll();$Userrow =$RowsMail[0];if($Userrow["password"] == $DecryptedPassword){return true;}else{return false;}}
        }
    }
    
    /**
     * Register an user-account or returns false if given values are invalid
     * @param type $Username
     * @param type $Password
     * @param type $PasswordRepeat
     * @param type $Email
     * @param type $Authkey
     * @return boolean Registration Successful or not
     */
    public function Register($Username,$Password,$PasswordRepeat,$Email="",$Authkey="")
    {   
        if($this->CheckAuthkey($Authkey)==false || $this->CheckEmail($Email)==false || $this->CheckPasswords($Password, $PasswordRepeat)==false || $this->CheckUsername($Username)==false)
        {
            return false;
        }
        else
        {
            $EnryptedPassword = sperren_sha256_rijndael($Password, SALZ, SALZ2);
            $this->InsertUserdata($Username, $EnryptedPassword);
            $this->Login($Username, $Password);
            return true;
        }
        
    }
    
    private function InsertUserdata($Username,$EnryptedPassword,$Email="")
    {
        $Query = "INSERT INTO `user` (`username`, `password`, `regDate`) VALUES ('$Username', '$EnryptedPassword', '".time()."');";
        $DB = \db::inst();$DB->query($Query);
    }
    
    /**
     * Checks if the given Username is already in Database or length is under 4 characters
     * @param type $Username
     * @return boolean Aviable or not
     */
    private function CheckUsername($Username)
    {
        if(strlen($Username)<=3){return false;}
        $Query = "SELECT COUNT(*) FROM `user` WHERE `username` ='$Username'";$DB = \db::inst();
        $QueryResult=$DB->query($Query);
        $Fetched = $QueryResult->fetchAll();
        if(intval($Fetched[0][0])==0){return true;}
        return false;
    }
    
    /**
     * Checks if the given Email is already in Database
     * @param string $Email
     * @return boolean Aviable or not
     */
    private function CheckEmail($Email)
    {
        $Query = "SELECT COUNT(*) FROM `user` WHERE `email`='$Email'";
        $DB = \db::inst();
        $QueryResult=$DB->query($Query);
        $Fetched = $QueryResult->fetchAll();        
        if(intval($Fetched[0][0])==0){return true;}
        return false;
    }
    
    /**
     * Validates the Password and the Password-Repeatment
     * @param string $Password
     * @param string $PasswordRepeat
     * @return boolean Valid or not
     */
    private function CheckPasswords($Password,$PasswordRepeat)
    {
        if($Password != $PasswordRepeat){return false;}
        if(strlen($Password)<6 || strlen($Password)>33){return false;}
        else{return true;}
    }
    
    /**
     * Checks, if AuthKey is needed (returns true if not needed).Returns true/false AuthKey is valid or not.
     * @param string $Authkey
     * @return bool Validstate
     */
    private function CheckAuthkey($Authkey)
    {
        $System = new System();
        if($System->AllowRegistration == true){return true;}
        else{return AuthKeys::CheckAuthKey($Authkey);}
    }
    
    public static function GetUser($ID)
    {
        $DBCount = \db::inst();$DBCountResult = $DBCount->init("SELECT COUNT(*) FROM `user` WHERE `id` =$ID;");
        if(intval($DBCountResult[0]['COUNT(*)']) == 0){return false;}
        $DB = \db::inst();
        $QueryResult = $DB->init("SELECT * FROM `user` WHERE `id` =$ID;");
        $Row = $QueryResult[0];
        return $Row;
    }
    
    public static function GetAllUser()
    {
        $DB = \db::inst();
        $QueryResult = $DB->init("SELECT * FROM `user` WHERE `id`;");
        $Row = $QueryResult;
        return $Row;
    }
    
    public static function SearchAllUser($Usernamepart)
    {
        $DB = \db::inst();
        $QueryResult = $DB->init("SELECT * FROM `user` WHERE `username` LIKE '%$Usernamepart%';");        
        $Row = $QueryResult;
        return $Row;
    }
       
}
