<?php

// Connect to database

$request_method = $_SERVER["REQUEST_METHOD"];
$config = include 'config.php';



if(!isset($_SERVER['PHP_AUTH_USER']) || !isset($_SERVER['PHP_AUTH_PW']) || !isset($_GET['table'])) {
    header("HTTP/1.1 401 Unauthorized");
} else {
    if(!$_SERVER['PHP_AUTH_USER'] == $config['api-call-username'] && $_SERVER['PHP_AUTH_PW'] == $config['api-call-key']) {
        header("HTTP/1.1 400 Bad Request");
    } else {

        include_once "iplant/user.php";
        include_once "iplant/location.php";
        include_once "iplant/plant.php";
        include_once "iplant/record.php";
        include_once "iplant/planning.php";
        include_once "iplant/event.php";

        $conn = mysqli_connect(
            $config['host'],
            $config['username'],
            $config['password'],
            $config['database']
        );
    }
}

switch($request_method) {

    default:
        // Invalid Request Method
        header("HTTP/1.0 405 Method Not Allowed");
        break;

    case 'GET':
        // get
        $function = "get".$_GET['table'];
        if(isset($_GET['id'])) {
            $function($_GET['id']);
        } else {
            $function();
        }
        break;

    case 'POST':
        $function = "add".$_GET['table'];
        $function();
        break;

    case 'PUT':
        if(isset($_GET['id'])) {
            $function = "update".$_GET['table'];
            $function($_GET['id']);
        }
        break;

    case 'DELETE':
        if(isset($_GET['id'])) {
            $function = "delete".$_GET['table'];
            $function($_GET['id']);
        }
        break;
}

