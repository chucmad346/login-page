<?php
    session_start();
    require_once "madfamDatabase.php";
    require_once "register-inc.php";
    require_once "login-inc.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="index.css">
</head>
<body>
    <div class="header">
        <h1>MadFam database</h1>
    </div>
    <div class="navbar">
        <ul>
            <li><a href="index.php"><i class="fa fa-fw fa-home"></i>Home</a></li>
            <li><a href="login.php">Login</a></li>
            <li><a href="register.php">Register</a></li>
        </ul>
    </div>

