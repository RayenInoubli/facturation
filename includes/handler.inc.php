<?php

function userDoesNotExist($conn, $email) {

    $query = "SELECT * FROM users WHERE email = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $query)) {
        header("location: ../login.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($result);

    if ($row) {

        $_SESSION["user"] = $row['id'];

        $return = false;

    } else{
        return $row; 
    }

    return $return;
    mysqli_stmt_close($stmt);
}

function worngPassword($conn, $email, $password){

    $return;
    $query = "SELECT * FROM users WHERE email = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $query)) {
        header("location: ../login.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($result)) {

        if($row["password"] == $password) {
            $return = false;
        } else {
            $return = true;   
        }

    } else{
        $return = true;
    }
    
    return $return;

    mysqli_stmt_close($stmt);
}

function createUser($conn, $email, $password){

    $id = uniqid($email);
    //$hashPwd = password_hash($password, PASSWORD_DEFAULT);

    $query = "INSERT INTO `users`(id, email, password) VALUES (?,?,?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $query)) {
        header("location: ../signup.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "sss", $id, $email, $password);
    mysqli_stmt_execute($stmt);

    mysqli_stmt_close($stmt);

    return $id;
    header("location: ../main.php");

    exit();
}

function userExist($conn, $email) {

    $query = "SELECT * FROM users WHERE email = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $query)) {
        header("location: ../signup.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($result)) {

        $return = true;

    } else{
        $return = false; 
    }

    return $return;
    mysqli_stmt_close($stmt);
}

function ajouterFacture($conn, $police, $client, $montant, $datePayment, $etat, $user){

    $user= $_SESSION["user"] ;

    $query = "INSERT INTO `factures`(police, montant, client, datePay, etat, userId) VALUES (?,?,?,?,?,?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $query)) {
        header("location: ../ajouter.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ssssss", $police, $montant, $client, $datePayment, $etat, $user);
    mysqli_stmt_execute($stmt);

    mysqli_stmt_close($stmt);
}

function updateFacture($conn, $idMAJ, $client, $montant, $datePayment, $etat){

    $query = "UPDATE factures
              SET montant=?, client=?, datePay=?, etat=?
              WHERE police = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $query)) {
        header("location: ../edit.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "sssss", $montant, $client, $datePayment, $etat, $idMAJ);
    mysqli_stmt_execute($stmt);

    mysqli_stmt_close($stmt);
}

function supprimerFacture($conn, $idSupp){

    $query = "DELETE FROM factures WHERE police = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $query)) {
        header("location: ../ajouter.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $idSupp);
    mysqli_stmt_execute($stmt);

    mysqli_stmt_close($stmt);
}

function afficherUneFacture($conn, $idMAJ){

    $query = "SELECT *
              FROM factures
              WHERE police = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $query)) {
        header("location: ../main.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $idMAJ);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($result)) {

        return $row;

    }

    mysqli_stmt_close($stmt);
}

function afficherTousFactures($conn, $userId, $debut, $nbr_element_par_page){
    
    $query = "SELECT * FROM factures WHERE userId = ? LIMIT ?,?;";

    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $query)) {
        header("location: ../main.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "sss", $userId, $debut, $nbr_element_par_page);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);
    
    return $result;

    mysqli_stmt_close($stmt);
}

function afficherRechFactures($conn, $req){

    $query = "SELECT * FROM factures 
              WHERE police like '%$req%'
              OR client like '%$req%'
              OR datePay like '%$req%'
              OR etat like '%$req%';";

    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $query)) {
        header("location: ../main.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);
    
    return $result;

    mysqli_stmt_close($stmt);
}

function nombreFactures($conn, $userId){
    
    $query = "SELECT COUNT(police) AS cnt FROM factures WHERE userId = ?;";

    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $query)) {
        header("location: ../main.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $userId);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);
    
    return $result;

    mysqli_stmt_close($stmt);
}

function getUser($conn, $email){
    
    $query = "SELECT id FROM users WHERE email = ?;";

    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $query)) {
        header("location: ../main.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($result);
    
    return $row;

    mysqli_stmt_close($stmt);
}