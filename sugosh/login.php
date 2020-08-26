<!DOCTYPE html>
<html lang="en">
<head>
<?php 
include 'links.php';
?>


    <link rel="stylesheet" type="text/css" href="login.css">

</head>
<body>

<?php

include 'dbcon.php';

if(isset($_POST['submit'])){
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);

    $pass = password_hash($password, PASSWORD_BCRYPT);
    $cpass = password_hash($cpassword, PASSWORD_BCRYPT);

    $emailquery = " select  * from registration where email='$email' ";
    $query = mysqli_query($con, $emailquery);

    $emailcount = mysqli_num_rows($query);

    if($emailcount>0){
                ?>
                <script>
                    alert("Email already exist");
                </script>
                <?php
    }else{
        if($password === $cpassword){

            $insertquery = "insert into registration(username, email, mobile, password, cpassword) values('$username','$email','$phone','$pass','$cpass')";

            $iquery = mysqli_query($con, $insertquery);
            if($iquery){
                ?>
                <script>
                    alert("Inserted successful");
                </script>
                <?php
            }else{
                ?>
                <script>
                    alert("No Inserted");
                </script>
                <?php
            }
            

        }else{
            ?>
            <script>
                alert("password not matching");
            </script>
            <?php
        }
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
        <form action="" method="POST">
            <div class="from-group input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-user"></i></span>
                </div>
                <input name="username" class="form-control" placeholder="User_Name" type="text" required>
            </div>
            <br>
            <div class="form-group input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                </div>
                <input name="email" class="form-control" placeholder="Email" type="email" required>
            </div>
            <div class="form-group input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-phone"></i></span>
                </div>
                <input name="phone" class="form-control" placeholder="Phone Number" type="phone" required>
            </div>
            <div class="form-group input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-lock"></i></span>
                </div>
                <input name="password" class="form-control" placeholder="Create Password" type="password" required>
            </div>
            <div class="form-group input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-lock"></i></span>
                </div>
                <input name="cpassword" class="form-control" placeholder="Conform Password" type="password" required>
            </div>
            <div class="form-group">
                <button type="submit" name="submit" class="btn btn-primary btn-block">
                    Create Account
                </button>
            </div>
    <p class="text-center">Create an account? <a href="login1.php">Log in</a></p>
            </div>
            
        </form>
        
    </article>
    </div>
</body>
</html>