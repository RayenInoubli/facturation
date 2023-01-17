<?php
session_start();

if (isset($_POST['submit'])) {
    
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    require_once 'db.inc.php';
    require_once 'handler.inc.php';
    
    
    if(userExist($conn, $email) !== false){
        header("location: ../signup.php?error=userExist");
        exit();
    }
    

    $_SESSION['user'] = createUser($conn, $email, $password);
    header("location: ../main.php");

    
} else{
    header("location: ../login.php");
    exit();
}