<?php
session_start();

if (isset($_POST['submit'])) {
    
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    require_once 'db.inc.php';
    require_once 'handler.inc.php';
    
    
    if(userDoesNotExist($conn, $email) !== false){
        header("location: ../login.php?error=userDoesNotExist");
        exit();
    }
    if (worngPassword($conn, $email, $password) !== false) {
        header("location: ../login.php?error=wrongPassword");
        exit();
    }
    
    $userId = getUser($conn, $email);
    $_SESSION['user'] = $userId['id'];
    
    header("location: ../main.php");
    
} else{
    header("location: ../login.php");
    exit();
}