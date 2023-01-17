<?php

$host = "localhost";
$user = "root";
$pwd = "";
$db = "facturation";

$conn = mysqli_connect($host, $user, $pwd, $db);

if (!$conn) {
    die("connection failed". mysqli_connect_error());

}