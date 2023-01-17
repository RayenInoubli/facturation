<?php

if (isset($_POST['supp'])) {
    
    $idSupp = $_POST['supp'];

    include_once "db.inc.php";
    include_once "handler.inc.php";

    supprimerFacture($conn, $idSupp);

    header("location: ../main.php");

    exit();
}

if (isset($_POST['annul'])) {
    header("location: ../main.php");
    exit();
}