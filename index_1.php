<?php
          require_once('backend/db.php');
          session_start();
          // error_reporting(0);
          $errors = '';
            // posting data
          if (isset($_POST['signup'])) {
            // error array
            $errors = array();
            // keep values in variables
            $post_email = trim($_POST['email']);
            $post_name = trim($_POST['name']);
            $post_contact = trim($_POST['contact']);
            $post_password = $_POST['password'];
            // check whether empty

            if (empty($post_email) && empty($post_name) && empty($post_contact) && empty($post_password)) {
                $errors = 'Sorry come values are empty';
                exit;
            }
            // check contact
            if(strlen($post_contact) < 0 ){
                $errors = 'invalid contact';
                exit;
            }
            // check email
            if(!filter_var($post_email, FILTER_VALIDATE_EMAIL)){
                $errors = 'email is invalid';
            }

            $hash_password = md5($post_password);
            $query = "INSERT into users (email,name,contact,pasword)
            values('$post_email', '$post_name', '$post_contact', '$hash_password')";

            if(mysqli_query($conn, $query)){
                  echo '<script>
                  alert("data has been submited");
                    </script>';
            }
            $errors = 'error submitting';
          }
 ?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>TIMOS TRADING COMPANY</title>

    <meta charset="utf-8">
    <meta name="keywords" content="login">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="we sell information">
    <title>TIMOS TRADING COMPANY</title>
    <link rel="shortcut icon" type="image/png" href="assets/img/enter.png">
    <link rel="stylesheet" href="assets/css/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="assets/css/all.css" type="text/css">
    <link rel="stylesheet" href="assets/css/style.css" type="text/css">


    

    <!-- Bootstrap core CSS -->
<link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">
  </head>
  <body class="text-center">
    
<main class="form-signin">
  <form>
   
    <h1 class="h3 mb-3 fw-normal">Login</h1>

    <div class="form-floating">
      <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="email" required>
      <label for="floatingInput">Email address</label>
    </div>
    <div class="form-floating">
      <input type="password" class="form-control" id="floatingPassword" placeholder="Password" required>
      <label for="floatingPassword">Password</label>
    </div>

    <div class="checkbox mb-3">
      <label>
        <input type="checkbox" value="remember-me">
        <a class="link" href="terms and conditions.php">I accept the terms and conditions</a>
      </label>
    </div>
    <button class="w-100 btn btn-lg btn-primary mb-4 " type="submit">
      <a class="btn" href="Dashboard.php">   Sign in</a></button>

    <button class="w-50 btn btn-lg btn-primary btn-outline-dark" type="submit">
      <a class="btn" href="Signup.php">Sign Up</a></button>
    <p class="mt-5 mb-3 text-muted">&copy; 2017–2021</p>
  </form>
</main>
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.js"></script>
    <script src="assets/js/main.js"></script>

    
  </body>
</html>
