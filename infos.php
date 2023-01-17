<?php
session_start();

if (!isset($_SESSION['user'])) {
    header("location: login.php");
}

if (isset($_GET['id'])) {
    require_once 'includes/db.inc.php';
    require_once 'includes/handler.inc.php';
    $idInf = $_GET['id'];
    $facture = afficherUneFacture($conn, $idInf);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Facturation</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" 
    href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" 
   >
   <link rel="stylesheet" href="./css/ajouter.css">
   <link rel="stylesheet" href="./css/infos.css">
</head>
<body>
<section>
    <h1>Facture #?</h1>
    <form method="post" action="./includes/edit.inc.php">
    <div class="form-row">
        <div class="form-group col-md-6">
        <label for="inputEmail4">Police</label>
        <input name="police" type="text" class="form-control" id="inputEmail4" placeholder="Police" value=<?php echo $facture['police']; ?>>
        </div>
        <div class="form-group col-md-6">
        <label for="inputPassword4">Client</label>
        <input name="client" type="text" class="form-control" id="inputPassword4" placeholder="client" value=<?php echo $facture['client']; ?>>
        </div>
    </div>
    <div class="form-group">
        <label for="inputAddress">Montant</label>
        <input name="montant" type="text" class="form-control" id="inputAddress" placeholder="montant par chiffres" value=<?php echo $facture['montant']; ?>>
    </div>
    <div class="form-group">
        <label for="inputAddress2">Date de Payment</label>
        <input name="dateP" type="date" class="form-control" id="inputAddress2" placeholder="date de payment" value=<?php echo $facture['datePay']; ?>>
    </div>
    <div class="form-row">
        <div class="form-group col-md-4">
        <label for="inputState">Etat</label>
        <input name="etat" type="text" class="form-control" id="inputEmail4" placeholder="etat" value=<?php echo $facture['etat']; ?>>
        </div>
    </div>
    <div class="form-group">
    </div>
    <button name="super" type="submit" class="btn btn-primary annuler"><a href="main.php">Super!</a></button>
    </form>
</section>
</body>
</html>