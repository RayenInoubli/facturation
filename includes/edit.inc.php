<?php

if (isset($_POST['edit'])) {
    
    $idMAJ = $_POST["edit"];
    $client = $_POST["client"];
    $montant = $_POST["montant"];
    $datePayment = $_POST["dateP"];
    $etat = $_POST["etat"];

    include_once "db.inc.php";
    include_once "handler.inc.php";

    updateFacture($conn, $idMAJ, $client, $montant, $datePayment, $etat);


    header("location: ../main.php");

    exit();
    
}

if (isset($_POST["annul"])) {
    header("location: ../main.php");
    exit();
}