<?php
session_start();

if (!isset($_SESSION['user'])) {
    header("location: login.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" 
        href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" 
    >
    <link rel="stylesheet" href="./css/confirm.css">
    <title>confirme</title>
</head>
<body>

<div class="card" style="width: 40rem;">
    <form class="card-body" method="post" action="includes/supprimer.inc.php">
        <h5 class="card-title">Vous allez supprimer cette facture</h5>
        <h6 class="card-subtitle mb-2 text-muted text-align-center">cette opération irriversible</h6>
        <p class="card-text"></p>
        <button type="submit" name="supp" value=<?php echo $_GET['id']; ?> class="btn btn-primary">Supprimer</button>
        <button type="submit" name="annul" class="btn btn-danger">Annuler</button>
    </form>
</div>
    
</body>
</html>