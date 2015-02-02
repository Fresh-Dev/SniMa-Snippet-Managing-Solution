<?php
/**
 * Class containing file
 * @author Kevin Kleinjung <info@kevin-kleinjung.de>
 * @package SniMa
 */

namespace SniMa\Models;

/**
 * 
 */
class AuthKeys
{  
    /**
     * Generates and returns a new AuthKey
     * @return string AuthKey
     */
    public static function CreateNewAuthkey()
    {
        $length = 64;
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {$randomString .= $characters[rand(0, $charactersLength - 1)];}
        $Query = "INSERT INTO  `authkeys` (`authkey` ,`isUsed`) VALUES ('$randomString',  '0');";
        $DB = \db::inst();
        $DB->query($Query);
        return $randomString;
    }
    
    /**
     * Checks if the given AuthKey exists and is still unused
     * @param string $Authkey
     * @return boolean
     */
    public static function CheckAuthKey($Authkey)
    {
        $DB = \db::inst();
        $Query = "SELECT * FROM `authkeys` WHERE  `authkey` =  \"$Authkey\";";
        $QueryResult = $DB->query($Query);
        $Result = $QueryResult->fetchAll();
        if($Result[0]["isUsed"]==0){return true;}
        return false;       
    }            
}