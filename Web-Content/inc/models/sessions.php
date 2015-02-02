<?php
namespace SniMa\Models;
/**
 * Contains the Session-Class
 */

/**
 * Session-Class
 */
class Sessions
{
    var $Id;
    var $Uid;
    var $LoginDate;
    var $Token;
    
    
    /**
     * Creates a new Session-Entry, execute Garbage-Collector and return new Session's Token-Value
     * @param int $UserId
     * @return string Session-Token
     */
    public function NewSession($UserId)
    {
        $this->GarbageCollector();
        $RandomToken = $this->GenerateToken();
        $DB = \db::inst();
        $Query = "INSERT INTO `sessions` (`uid` ,`loginDate` ,`token`) VALUES ('$UserId',  '".time()."',  '".$RandomToken."');";
        $DB->query($Query);
        return $RandomToken;
    }

    /**
     * Returns the Validstate for the given Token
     * @param string $Token
     * @return boolean
     */
    public function VerifyByToken($Token)
    {
        $DB = \db::inst();
        $Query = "SELECT * FROM  `sessions` WHERE  `token` =  \"$Token\";";
        $QueryResult = $DB->query($Query);
        $Result = $QueryResult->fetchAll();
        if(isset($Result[0]["id"]))
        {
            $this->Id = $Result[0]["id"];
            $this->Uid = $Result[0]["uid"];
            $this->LoginDate = $Result[0]["loginDate"];
            $this->Token = $Result[0]["token"];
            return true;
        }
        return false;
    }
    
    /**
     * Remove every Session, older then 1 hr.
     */
    private function GarbageCollector()
    {
        $DB = \db::inst();
        $Query = "SELECT * FROM  `sessions`;";
        $QueryResult = $DB->query($Query);
        $Result = $QueryResult->fetchAll();
        foreach ($Result as $row)
        {
            if($row["loginDate"] - (intval(time()-3600)*48) <= 0)
            {
                $Query = "DELETE FROM `sessions` WHERE `id` = ".$row["id"].";";
                $DB->query($Query);
            }
        }
    }
    
    /**
     * Returns an Random-MD5 Value
     * @return string
     */
    private function GenerateToken()
    {
            return md5(uniqid(rand(), true));
    }
}