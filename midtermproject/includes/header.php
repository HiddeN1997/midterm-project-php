<?php
if (isset($_SESSION['userid'])){
    $id=$_SESSION['userid'];
    $sql="SELECT Fname,username from users where id='$id'";
    $result_header=$mysql->query($sql);
    $row_header=$result_header->fetch_assoc();
    $name=$row_header['Fname'];
    $myuser=$row_header['username'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <title>Document</title>
</head>
<body>
    
<div id="navbar">
    <div class="container">
        <div class="row row1">
            <ul class="largenav pull-right">
               
                <li class="upper-links"><a class="links" href="login.php">Login & SignUp</a></li>
                <li class="upper-links">
                    <a class="links" href="">
                        <svg class="" width="16px" height="12px" style="overflow: visible;">
                            <path d="M8.037 17.546c1.487 0 2.417-.93 2.417-2.417H5.62c0 1.486.93 2.415 2.417 2.415m5.315-6.463v-2.97h-.005c-.044-3.266-1.67-5.46-4.337-5.98v-.81C9.01.622 8.436.05 7.735.05 7.033.05 6.46.624 6.46 1.325v.808c-2.667.52-4.294 2.716-4.338 5.98h-.005v2.972l-1.843 1.42v1.376h14.92v-1.375l-1.842-1.42z" fill="#fff"></path>
                        </svg>
                    </a>
                </li>
               
                    <ul class="dropdown-menu">
                        <li class="profile-li"><a class="profile-links" href="">Contact Us</a></li>
                        <li class="profile-li"><a class="profile-links" href="">Advertise</a></li>
                        
                    </ul>
                </li>
            </ul>
        </div>
        <div class="row row2">
            <div class="col-sm-2">
                
                <h1 style="margin:0px;"><a href="index.php" style="text-decoration:none;" class="largenav">Your phone </a></h1>
               
            </div>
            <div class="navbar-search smallsearch col-sm-8 col-xs-11">
                <div class="row">
                <form action="findproduct.php" method="get" >
                    <input style="width:580px;color:black;" class="navbar-input col-xs-11" id="productid" placeholder="Search for Products, Brands and more" name="pname">
                    <input class="submit" type="submit" value="Search" style="width:80px;height: 44px;color:black;">
                        </form>
                        
                        

                </div>
            </div>


        
               
            </div>
        </div>
    </div>
</div>

</body>
</html>



