<?php
include ("../config/config.php");
$objEvents = new \Classes\ClassEvents();

$id = filter_input(INPUT_POST, 'id', FILTER_DEFAULT);
$date = filter_input(INPUT_POST, 'date', FILTER_DEFAULT);
$time = filter_input(INPUT_POST, 'time', FILTER_DEFAULT);
$title = filter_input(INPUT_POST, 'title', FILTER_DEFAULT);
//$description = filter_input(INPUT_POST, 'description', FILTER_DEFAULT);
//$horasAtendimento = filter_input(INPUT_POST, 'horasAtendimento', FILTER_DEFAULT);
$color = filter_input(INPUT_POST, 'color', FILTER_DEFAULT);
$start = new \DateTime($date.' '.$time, new \DateTimeZone('America/Sao_Paulo'));

if(!empty($date) && !empty($time) && !empty($title) && !empty($color) && !empty($start)){
    if(!$objEvents->updateEvents($id, $title, $color, $start->format("Y-m-d H:i:s"))){
    echo "Preencha os dados corretamente!";
    }else{
        header("location: /agenda-calendar");
    }     
}else{
    echo 'Preencha os campos corretamente';   
}

//$objEvents->updateEvents($id,$title,$description,$start->format("Y-m-d H:i:s"));

