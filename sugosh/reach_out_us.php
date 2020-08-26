<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="homepage.css">
    
    <?php 
   include 'links.php';
   ?>
    <title>Document</title>
</head>
<body>


<?php

include 'commdb.php';

if(isset($_POST['submit'])){
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $comm = mysqli_real_escape_string($con, $_POST['comment']);

    $emailquery = " select  * from comment where email='$email' ";
    $query = mysqli_query($con, $emailquery);

    $insertquery = "insert into comment(name, email, comment) values('$username','$email','$comm')";

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
                  <button class="btn text-center">Login</button>
                </li>
                <li class="nav-item">
                  <button class="btn text-center">Sign Up</button>
                </li>
            </ul>
        </div>
    </div>
</nav>


<div class="card bg-light">
        <article class="card-body mx-auto" style="max-width: 400px;">
        <h4 class="card-title text-center">Contact us</h4>
        <p class="text-center">
        Work together? Coffee chat? Partner? Drop us a note 👇</p>
        
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
                    <span class="input-group-text"><i class="fa fa-pencil"></i></span>
                </div>
                <input name="comment" class="form-control" placeholder="Coffee? chat? Partner?" type="text" required>
            </div>
            
            <div class="form-group">
                <button type="submit" name="submit" class="btn btn-primary btn-block">
                Send Message
                </button>
            
            
        </form>
        
    </article>
    </div>
</body>


</body>
</html>