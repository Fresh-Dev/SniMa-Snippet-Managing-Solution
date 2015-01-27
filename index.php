<?php
/**
 * Main-Start File
 * 
 * @author Kevin Kleinjung <info@kevin-kleinjung.de>
 * @version 1.0
 * @package SniMa
 */

namespace SniMa;



session_start();
/**
 * Routing - Handler
 */
$ViewFilePage = "views/login.php";


require 'inc/autoloader.php';
error_reporting(E_ALL);

if(strlen(filter_input(INPUT_GET, "form")) > 0){if(file_exists("views/forms/".filter_input(INPUT_GET, "form").".php")){$ViewFilePage = "views/forms/".filter_input(INPUT_GET, "form").".php";require $ViewFilePage;exit();}}

//LATER
if(isset($_SESSION["snima_username"]))
{       
    if(strlen(filter_input(INPUT_GET, "form")) > 0){if(file_exists("views/forms/".filter_input(INPUT_GET, "form").".php")){$ViewFilePage = "views/".filter_input(INPUT_GET, "form").".php";}require $ViewFilePage;exit();}
    if(strlen(filter_input(INPUT_GET, "ajax")) > 0)
        {
            if(file_exists("views/ajax/".filter_input(INPUT_GET, "ajax").".php"))
            {
                $ViewFilePage = "views/ajax/".filter_input(INPUT_GET, "ajax").".php";

            }
            require $ViewFilePage;
            exit();
            
        }
    if(strlen(filter_input(INPUT_GET, "page")) > 0){if(file_exists("views/".filter_input(INPUT_GET, "page").".php")){$ViewFilePage = "views/".filter_input(INPUT_GET, "page").".php";}require $ViewFilePage;exit();}
}
else
{
    if(strlen(filter_input(INPUT_GET, "page") > 0))
    {
        if(filter_input(INPUT_GET, "page")=="registration"){$ViewFilePage = "views/registration.php";}
    }
} 

require $ViewFilePage;

exit();