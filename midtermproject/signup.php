<?php
session_start();
if(isset($_SESSION['userid'])){
    header("location:index.php");
    die();
    include "model/connection.php";
}
include "model/connection.php";

$errormsg="";
if(isset($_POST['submit'])){
    $user=$_POST['user'];
    $sql="SELECT * from users where username='$user'";
    $result=$mysql->query($sql);

    if( empty ($_POST['pass']) or empty ($_POST['cpass'])
     or empty( $_POST['fname']) or empty( $_POST['lname']) or empty($_POST['user'])){
        $errormsg="please fill all the blanks";
    }
    else if(strlen($_POST['pass'])<8){
        $errormsg="password must be more than 8 characters";
    }
    else if($_POST['pass']!=$_POST['cpass']){
        echo $errormsg="please confirm your password correctly";
    }
    else if($result->num_rows>0){
        $errormsg="username already exists";
    }
    else{
        $encrypt_pass=md5($_POST['pass']);
        $fname=$_POST['fname'];
        $lname=$_POST['lname'];
        $addr=$_POST['addr'];
        $sql="INSERT INTO users (fname,lname,addr,username,password)
        values('$fname','$lname','$addr','$user','$encrypt_pass')";
         $mysql->query($sql);
         header( "refresh:0.5;url=done.php" );
         
        }
    
}
include "includes/header.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/style.css">
    <title>Document</title>
</head>
<body>
<section class="vh-100 bg-image"
  style="background-image: url('https://mdbcdn.b-cdn.net/img/Photos/new-templates/search-box/img4.webp');">
  <div class="mask d-flex align-items-center h-100 gradient-custom-3">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
          <div class="card" style="border-radius: 15px;">
            <div class="card-body p-5">
              <h2 class="text-uppercase text-center mb-5">Create an account</h2>

              <form action="#" method="post">

                <div class="form-outline mb-4">
                  <input type="text" id="form3Example1cg" name="fname" class="form-control form-control-lg" />
                  <label class="form-label" for="form3Example1cg">First Name</label>
                </div>

                <div class="form-outline mb-4">
                  <input type="text" id="form3Example1cg" name="lname" class="form-control form-control-lg" />
                  <label class="form-label" for="form3Example1cg">Last Name</label>
                </div>


                <div class="form-outline mb-4">
                  <input type="text" id="form3Example1cg" name="user" class="form-control form-control-lg" />
                  <label class="form-label" for="form3Example1cg">Username</label>
                </div>


                <div class="form-outline mb-4">
                  <input type="text" id="form3Example1cg" name="addr" class="form-control form-control-lg" />
                  <label class="form-label" for="form3Example1cg">Address</label>
                </div>




                <div class="form-outline mb-4">
                  <input type="password" id="form3Example4cg" name="pass" class="form-control form-control-lg" />
                  <label class="form-label" for="form3Example4cg">Password</label>
                </div>

                <div class="form-outline mb-4">
                  <input type="password" id="form3Example4cdg" name="cpass" class="form-control form-control-lg" />
                  <label class="form-label" for="form3Example4cdg">Repeat your password</label>
                </div>

                

                <div class="d-flex justify-content-center">
                <input type="submit" value="signup" name="submit">
                </div>

                <p class="text-center text-muted mt-5 mb-0">Have already an account? <a href="login.php"
                    class="fw-bold text-body"><u>Login here</u></a></p>

              </form>
              <h4 style="color:red">
    <?php
    echo $errormsg;

    ?>
</h4>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
</section>



<?php
    include "includes/footer.php";
        ?>
</body>
</html>

