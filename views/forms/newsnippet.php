<?php

/**
 * File-Description
 * @author Kevin Kleinjung <info@kevin-kleinjung.de>
 */
$Session = new SniMa\Models\Sessions();$Session->VerifyByToken($_SESSION["snima_username"]);      
$Snippets = new SniMa\Models\Snippets();

$Input_Title = filter_input(INPUT_POST,'title');
$Input_Language = filter_input(INPUT_POST,'language');
$Input_Description = filter_input(INPUT_POST,'description');
$Input_Tags = filter_input(INPUT_POST,'tags');
$Input_Private = isset($_POST["private"]);
$Input_Source = filter_input(INPUT_POST,'source');
$SnippetWriteResult = $Snippets->NewSnippet($Input_Title, $Input_Language, $Input_Description, $Input_Tags, $Input_Source, $Session->Uid,$Input_Private);
require ROOTPFAD."/views/dashboard.php";
