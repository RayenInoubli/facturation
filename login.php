<?php 
if (isset($_SESSION['user'])) {
  session_destroy(); 
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
    <link rel="stylesheet" href="./css/login.css">
    <title>Facturation</title>
</head>
<body>
<section class="gradient-custom">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card bg-dark text-white" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">

            <form action="includes/login.inc.php" method="post" class="mb-md-5 mt-md-4 pb-5">

              <h2 class="fw-bold mb-2 text-uppercase">Login</h2>
              <p class="text-white-50 mb-5">Please enter your login and password!</p>

              <?php if (isset($_GET["error"])) { ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                  <strong>Oops!</strong>
                  <?php 
                    if ($_GET["error"] == "stmtfailed") {
                      echo"<p class='mb-0'> Something went wrong, please try again </p>";
                    }
                    if ($_GET["error"] == "userDoesNotExist") {
                      echo"<p class='mb-0'> this user does not exists </p>";
                    }
                    if ($_GET["error"] == "wrongPassword") {
                      echo"<p class='mb-0'> this password is wrong </p>";
                    }
                  ?>
                </div>
              <?php } ?>

              <div class="form-outline form-white mb-4">
                <input name="email" type="email" id="typeEmailX" class="form-control form-control-lg" />
                <label class="form-label" for="typeEmailX">Email</label>
              </div>

              <div class="form-outline form-white mb-4">
                <input name="password" type="password" id="typePasswordX" class="form-control form-control-lg" />
                <label class="form-label" for="typePasswordX">Password</label>
              </div>

              <button name="submit" class="btn btn-outline-light btn-lg px-5" type="submit">Login</button>

              <div class="d-flex justify-content-center text-center mt-4 pt-1">
                <a href="#!" class="text-white"><i class="fab fa-facebook-f fa-lg"></i></a>
                <a href="#!" class="text-white"><i class="fab fa-twitter fa-lg mx-4 px-2"></i></a>
                <a href="#!" class="text-white"><i class="fab fa-google fa-lg"></i></a>
              </div>

              <div>
                <p class="mb-0">Don't have an account? 
                  <a href="signup.php" class="text-white-50 fw-bold">Sign Up</a>
                </p>
              </div>
            </form>

          </div>

        </div>
      </div>
    </div>
  </div>
</section>
</body>
</html>