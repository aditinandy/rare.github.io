<?php

session_start();

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="login.css">
    <link rel="stylesheet" type="text/css" href="login1.css">
    <?php 
include 'links.php';
?>

    <title>Document</title>
</head>
<body>

<?php

include 'dbcon.php';

if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $email_search = " select * from registration where email='$email' ";
    $query = mysqli_query($con, $email_search);

    $email_count = mysqli_num_rows($query);


    if($email_count){
        $email_pass = mysqli_fetch_assoc($query);
        
        $db_pass = $email_pass['password'];

        $_SESSION['username'] = $email_pass['username'];

        $pass_decode = password_verify($password, $db_pass);

        if($pass_decode){
            echo "Login Successful";
            ?>

            <script>
                location.replace("homepage.php");
            </script>


            <?php
        }else{
            echo "Password Incorrect";
        }
    }else{
        echo "invalid Email";
    }
}

?>



<nav class="navbar navbar-expand-lg navbar-light bg-light navbar-scroll">
    <div class="container-fluid">
        <a href="#" class="navbar-brand"><img class="logo" src="img/p0wm1a90.png"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse text-center" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a href="" class="nav-link text-dark">
                      Features</a>
                </li>
                <li class="nav-item">
                    <a href="" class="nav-link text-dark">Pricing</a>
                </li>
                <li class="nav-item">
                    <a href="" class="nav-link text-dark">FAQ</a>
                </li>
                <li class="nav-item">
                  <button class="bttn text-center">Login</button>
                </li>
                <li class="nav-item">
                  <button class="bttn text-center">Sign Up</button>
                </li>
            </ul>
        </div>
    </div>
</nav>




<div class="card bg-light">
        <article class="card-body mx-auto" style="max-width: 400px;">
        <h4 class="card-title text-center">Create Account</h4>
        <p class="text-center">
            Get Started With Your Free Account
        
        <a href="" class="btn btn-block btn-gmail"><i class="fa fa-google"></i>
        Login via Gmail
    </a>

    <a href="" class="btn btn-block btn-facebook"><i class="fa fa-facebook-f"></i>
        Login via Facebook
    </a>
        </p>
        <p class="divider-text">
            <span class="bg-light">OR</span>
        </p>
        <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">
            
            
            <div class="form-group input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                </div>
                <input name="email" class="form-control" placeholder="Email" type="email" required>
            </div>
            
            <div class="form-group input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-lock"></i></span>
                </div>
                <input name="password" class="form-control" placeholder="Create Password" type="password" required>
            </div>
            
            <div class="form-group">
                <button type="submit" name="submit" class="btn btn-primary btn-block">
                    Login Now
                </button>
            </div>
    <p class="text-center">Create an account? <a href="login.php">Sign Up</a></p>
            </div>
            
        </form>
        
    </article>
    </div>
</body>
</html>