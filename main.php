<?php
session_start();

if (!isset($_SESSION['user'])) {
  header("location: login.php");
}
require_once 'includes/db.inc.php';
require_once 'includes/handler.inc.php';
$userId = $_SESSION['user'];
$factures;
//pagination
@$page = $_GET['page'];
if (empty($page))  $page=1;
$nbr_element_par_page = 6;
$count = nombreFactures($conn, $userId);
$nombreFactures = mysqli_fetch_assoc($count);
$nbr_pages = ceil($nombreFactures['cnt'] / $nbr_element_par_page);
$debut = ($page-1) * $nbr_element_par_page;
if (isset($_POST['rechBtn'])) {
  $req = $_POST['recherche'];
  $factures = afficherRechFactures($conn, $req, $userId);
} else {
  $factures = afficherTousFactures($conn, $userId, $debut, $nbr_element_par_page);
}
$num = 0;
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
    <link rel="stylesheet" href="./css/main.css">
    <title>Facturation</title>
</head>
<body>
  <div class="header">
    <form class="logout" method="post" action="includes/logout.inc.php" style=" width: 70%; display: flex; align-items: center; justify-content: space-between;">
    <div></div>  
    <button type="submit" name="logout" class="btn btn-danger">Log out</button>
   </form>
    <form class="new" action="includes/main.inc.php" method="post" >
      <h3>Liste des factures</h3>
      <button type="submit" name="ajouter" class="btn btn-primary">Ajouter</button>
    </form>

    <div class="recherche">
      <div></div>
      <form method="post" action="main.php">
        <button type="submit" name="rechBtn" class="rechBtn">Recherche</button>
        <input type="text" name="recherche">
      </form>
    </div>
  </div>
<section>
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Police</th>
      <th scope="col">Client</th>
      <th scope="col">Montant</th>
      <th scope="col">Date de Payment</th>
      <th scope="col">Etat</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  <?php while ($row = mysqli_fetch_assoc($factures)) { ?>
    <tr>
      <th scope="col"><?php echo ++$num; ?></th>
      <th scope="col"><?php echo($row['police']); ?></th>
      <th scope="col"><?php echo($row['client']); ?></th>
      <th scope="col"><?php echo($row['montant']); ?></th>
      <th scope="col"><?php echo($row['datePay']); ?></th>
      <th scope="col"><?php echo($row['etat']); ?></th>
      <th scope="col" class="icons">
        <a href=<?php echo "confirmDelete.php?id=".$row['police']; ?>><img src="./img/trash.svg" alt="" class="fa-trash"></a>
        <a href=<?php echo "edit.php?id=".$row['police']; ?>><img src="./img/edit.svg" alt="" class="fa-edit"></a>
        <a href=<?php echo "infos.php?id=".$row['police']; ?>><img src="./img/infos.svg" alt="" class="fa-info-circle"></a>
      </th>
    </tr>
  <?php }?>
  </tbody>
</table>

</section>
<div id="pagination-container" style="width: 100%; display: flex; align-items: center; justify-content: center;">
  <nav aria-label="Page navigation example">
    <ul class="pagination">
  <?php 
  //var_dump($nombreFactures['cnt']); 
  for ($i=1; $i <= $nbr_pages; $i++) { 
    if ($page != $i) {
      echo "<li class='page-item'><a class='page-link' href='?page=$i'>$i</a></li>";
    } else{
      echo "<li class='page-item'><a class='page-link'>$i</a></li>";
    }
  } 
  ?>
  </ul>
  </nav>
</div>
</body>
</html>