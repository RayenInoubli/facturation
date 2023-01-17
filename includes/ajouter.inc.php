<?php
session_start();

if (isset($_POST['add'])) {

    $police = $_POST["police"];
    $client = $_POST["client"];
    $montant = $_POST["montant"];
    $datePayment = $_POST["dateP"];
    $etat = $_POST["etat"];
    $user = $_SESSION["user"];

    include_once "db.inc.php";
    include_once "handler.inc.php";

    ajouterFacture($conn, $police, $client, $montant, $datePayment, $etat, $user);


    header("location: ../main.php");

    exit();
    
}

if (isset($_POST["annul"])) {
    header("location: ../main.php");
    exit();
}