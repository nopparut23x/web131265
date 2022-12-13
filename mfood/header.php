<?php 
require_once "../connection/database.php";
$db = new Database();
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CTC FOOD</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.css">
    <link rel="stylesheet" href="../assets/fontawesome/css/all.css">
    <script src="../assets/js/bootstrap.js"></script>
    <script src="../assets/fontawesome/js/all.js"></script>

    <style>
        #sb a:hover {
            background-color: #000;
        }
    </style>
</head>

<body>