<?php

use Controller\PersonController;
use Controller\TaskController;
use Helper\PersonHelper;
use Helper\TaskHelper;

include("loader.php");
//$con = mysqli_connect($server, $username, $password);
//if (!$con) {
//    echo "Not Connect" . mysqli_connect_error();
//} else {
//    echo "connected";
//}
//
//$sql ="CREATE DATABASE task_manager2";
//if($con->query($sql)){
//    echo "Database Created";
//}
//else
//    echo "Error".$con->error;
//$con->close();

//try {
//    $con = new PDO("mysql:host=localhost;port3306;dbname=task_manager", $username, $password);
//    echo "hiiiiiiii";
//} catch (PDOException $exception) {
//    echo $exception->getMessage();
//}
//echo $_SERVER['REQUEST_URI'];
$uri = str_replace("/Negar.Ighani_FinalProject.Backend", "", $_SERVER['REQUEST_URI']);


if ($uri === '/login' || $uri === '/signup') {
    $controller = new PersonController();
    $controller->switcher($uri, $_REQUEST);
} else {
    $controller = new TaskController();
    $controller->switcher($uri, $_REQUEST);
}

