<?php
/**
 * Class containing file
 * @author Kevin Kleinjung <info@kevin-kleinjung.de>
 * @package SniMa
 */

namespace SniMa\Models;

/**
 * Description of settings
 *
 * @author Kevin Kleinjung <info@kevin-kleinjung.de>
 */
class System
{
    var $Sitename = "SniMa";
    var $InstallDate = 0;
    var $Template = "default";
    var $AllowRegistration = false;
    
    /**
     * Defaultcall and value assignment
     */
    public function __construct() 
    {
        $Query = "SELECT * FROM `system`;";$DB = \db::inst();$Queryres=$DB->query($Query);$Table = $Queryres->fetchAll();$Row = $Table[0];
        $this->Sitename = $Row[0];$this->InstallDate = $Row[1];$this->Template = $Row[2];$this->AllowRegistration = $Row[3];
    }
    
    /**
     * Update the System's Settings
     * @param string $Sitename The new Portal's Sitename
     * @param string $Template The new Template to use
     * @param int $AllowRegistration The new value for allowing registrations or not
     */
    public function updateSettings($Sitename,$Template,$AllowRegistration)
    {       
        $Tmp = $Sitename.$Template.$AllowRegistration;
        return $Tmp;
//        $Query = "SELECT * FROM `system`;";$DB = \db::inst();$DB->query($Query);$Table = $DB->fetchAll();$Row = $Table[0];
//        $this->Sitename = $Row[0];$this->InstallDate = $Row[1];$this->Template = $Row[2];$this->AllowRegistration = $Row[3];
    }
    
    }
