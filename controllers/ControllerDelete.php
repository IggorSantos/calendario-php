<?php
include ("../config/config.php");
$objEvents = new \Classes\ClassEvents();

$id = filter_input(INPUT_GET, 'id', FILTER_DEFAULT);

if($objEvents->deleteEvents($id)){
    header("location: /agenda-calendar"); 
}else{
    return 'Erro';
}

//header("location: /agenda-calendar");



