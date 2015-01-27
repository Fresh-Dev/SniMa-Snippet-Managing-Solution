<?php

/**
 * File-Description
 * @author Kevin Kleinjung <info@kevin-kleinjung.de>
 */
$SearchMode = filter_input(INPUT_GET,"mode");
switch ($SearchMode)
{
    case "usernames":
        $Users = SniMa\Models\User::SearchAllUser(filter_input(INPUT_GET, "query"));
        $suggestions = array(); 
        foreach($Users as $result){$suggestions[] = array("value" => $result["username"],"data" => $result["id"]);}
        echo json_encode(array('suggestions' => $suggestions));exit();
    break;
    case "navsearch":
        error_reporting(E_ALL);
        $Users = SniMa\Models\Snippets::SearchAllSnippets(filter_input(INPUT_GET, "query"));
        error_reporting(E_ALL);
        $suggestions = array(); 
        error_reporting(E_ALL);
        foreach($Users as $result)
        {
            
            $SnippetsLang = new \SniMa\Models\Langs();
            $SL = $SnippetsLang->GetLang($result['language']);
            $suggestions[] = array("value" => $SL["name"]." - ".$result["title"],"data" => $result["id"]);
        }
        error_reporting(E_ALL);
        echo json_encode(array('suggestions' => $suggestions));error_reporting(E_ALL);exit(); 
        
    break;
}

