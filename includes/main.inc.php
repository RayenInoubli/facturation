<?php
session_start();

if (isset($_POST["ajouter"])) {
    header("location: ../ajouter.php");
    exit();
}