<?php session_start();

if (!isset($_SESSION['user'])) {
    header("location: login.php");
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
</head>
<body>
<section>
    <h1>Ajouter une facture</h1>
    <form method="post" action="includes/ajouter.inc.php">
    <div class="form-row">
        <div class="form-group col-md-6">
        <label for="inputEmail4">Police</label>
        <input type="text" name="police" class="form-control" id="inputEmail4" placeholder="Police">
        </div>
        <div class="form-group col-md-6">
        <label for="inputPassword4">Client</label>
        <input type="text" name="client" class="form-control" id="inputPassword4" placeholder="client">
        </div>
    </div>
    <div class="form-group">
        <label for="inputAddress">Montant</label>
        <input type="text" name="montant" class="form-control" id="inputAddress" placeholder="montant par chiffres">
    </div>
    <div class="form-group">
        <label for="inputAddress2">Date de Payment</label>
        <input type="date" name="dateP" class="form-control" id="inputAddress2" placeholder="date de payment">
    </div>
    <div class="form-row">
        <div class="form-group col-md-4">
        <label for="inputState">Etat</label>
        <select id="inputState" name="etat" class="form-control">
            <option selected>Choose...</option>
            <option>payeé</option>
            <option>non payeé</option>
        </select>
        </div>
    </div>
    <div class="form-group">
    </div>
    <button type="submit" name="add" class="btn btn-primary">Ajouter</button>
    <button type="submit" name="annul" class="btn btn-primary annuler">Annuler</button>
    </form>
</section>
</body>
</html>