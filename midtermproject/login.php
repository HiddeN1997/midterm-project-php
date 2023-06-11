<?php
session_start();
if(isset($_SESSION['userid'])){
    header("location:index.php");
    die();
}
$msg=" ";
include "model/connection.php";

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <title>Document</title>
</head>
<body>
   
<!-- ---------------------------------------header--------------------------------------------------------------- -->
<?php
    include "includes/header.php";
    
    if (isset($_POST['submit'])){
        if(empty($_POST['username']) or empty($_POST['password'])){
            $msg="please fill all the blanks";
        }
        else{
        $user=$_POST['username'];
        $pass=$_POST['password'];
        $encrypt_pass=md5($pass);
        $sql="SELECT * from users where username='$user' and password='$encrypt_pass'";
        $result=$mysql->query($sql);
        if($result->num_rows>0){
    $row=$result->fetch_assoc();
    $id=$row['id'];
    $_SESSION['userid']=$id;
    header("location:index.php");
    die();
        }
        else{
            $msg="wrong username or password";
        }
        }
    }
   
        ?>


<!-- -----------------------------------------------------------main------------------------------------------- -->


<div class="container-fluid px-1 px-md-5 px-lg-1 px-xl-5 py-5 mx-auto">
    <div class="card card0 border-0">
        <div class="row d-flex">
            <div class="col-lg-6">
                <div class="card1 pb-5">
                    <div class="row">
                        <img src="https://i.imgur.com/CXQmsmF.png" class="logo">
                    </div>
                    <div class="row px-3 justify-content-center mt-4 mb-5 border-line">
                        <img src="https://i.imgur.com/uNGdWHi.png" class="image">
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card2 card border-0 px-4 py-5">
                    <div class="row mb-4 px-3">
                        <h6 class="mb-0 mr-4 mt-2">Sign in with</h6>
                        <div class="facebook text-center mr-3"><div class="fa fa-facebook"></div></div>
                        <div class="twitter text-center mr-3"><div class="fa fa-twitter"></div></div>
                        <div class="linkedin text-center mr-3"><div class="fa fa-linkedin"></div></div>
                    </div>
                    <div class="row px-3 mb-4">
                        <div class="line"></div>
                        <small class="or text-center">Or</small>
                        <div class="line"></div>
                    </div>
                    <form action="#" method="post">
                    <div class="row px-3">
                        <label class="mb-1"><h6 class="mb-0 text-sm">Username</h6></label>
                        <input class="mb-4" type="text" name="username" id="user" placeholder="Enter a valid username">
                    </div>
                    <div class="row px-3">
                        <label class="mb-1"><h6 class="mb-0 text-sm">Password</h6></label>
                        <input type="password" name="password" id="pass" placeholder="Enter password">
                    </div>
                    <div class="row px-3 mb-4">
                        <div class="custom-control custom-checkbox custom-control-inline">
                            <input id="chk1" type="checkbox" name="chk" class="custom-control-input"> 
                            <label for="chk1" class="custom-control-label text-sm">Remember me</label>
                        </div>
                        <a href="#" class="ml-auto mb-0 text-sm">Forgot Password?</a>
                    </div>
                    <div class="row mb-3 px-3">
                        <!-- <button type="submit" class="btn btn-blue text-center" name="login">Login</button> -->
                        <input type="submit" value="login" name="submit">
                    </div>
                    <div class="row mb-4 px-3">
                        <small class="font-weight-bold">Don't have an account? <a href="signup.php" class="text-danger ">Register</a></small>
                        </form>
                        
                    </div>
                    <h3 style="color:red;text-align:center"> <?php  echo $msg;?></h3>
                </div>
            </div>
        </div>

        
    <!-- ----------------------------------------------footer------------------------------------ -->
    <?php
    include "includes/footer.php";
        ?>

</body>
</html>