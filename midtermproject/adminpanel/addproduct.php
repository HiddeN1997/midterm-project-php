<?php
session_start();
if(!isset($_SESSION['userid'])){
    header("location:index.php");
    die();
}

    include "../model/connection.php";
$id=$_SESSION['userid'];
$sql="SELECT Fname,username from users where id='$id'";
$result_header=$mysql->query($sql);
$row_header=$result_header->fetch_assoc();
$myuser=$row_header['username'];

if($myuser!="admin"){

    header("location:index.php");
    die();

    

}
$msg="";
if(isset($_POST['submit'])){
   
    $sql="SELECT * from products  ";
    $result=$mysql->query($sql);
    $row=$result->fetch_assoc();

   
        $pname=$_POST['pname'];
        $qnt=$_POST['qnt'];
        $brand=$_POST['brand'];
        $cat=$_POST['category'];
        $price=$_POST['price'];
        $image=$_POST['image'];
        
        $sql="INSERT INTO products ( `pname`, `qnt`, `brand`, `category`, `image`, `price`) 
        VALUES('$pname','$qnt','$brand','$cat','$image','$price')";
        $mysql->query($sql);
        $row=$result->fetch_assoc();
        $msg="Your product has been added to database successfully!";

    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/style.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    
    

    <?php
   include "../includes/header.php";
        ?>

<body class="home">
    
<div class="container-fluid display-table">
<div class="row display-table-row">
<div class="col-md-2 col-sm-1 hidden-xs display-table-cell v-align box" id="navigation">
<div class="logo">

</div>
<div class="navi">
<ul>
<li class="active"><a href="../index.php"><i class="fa fa-home" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Home</span></a></li>
<li><a href="registers.php"><i class="fa fa-tasks" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Registers</span></a></li>
<li><a href="addproduct.php"><i class="fa fa-bar-chart" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Add product</span></a></li>
<li><a href="#"><i class="fa fa-cog" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Setting</span></a></li>
<li><a href="#"><i class="fa fa-calendar" aria-hidden="true"></i><span class="hidden-xs hidden-sm">calender</span></a></li>
<li><a href="../logout.php"><i class="fa fa-user" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Logout</span></a></li>
  
 </ul>
</div>
 </div>
<div class="col-md-10 col-sm-11 display-table-cell v-align">
<!--<button type="button" class="slide-toggle">Slide Toggle</button> -->
  <div class="row">
 <header>
    <div class="col-md-7">
   <nav class="navbar-default pull-left">
    <div class="navbar-header">
    <button type="button" class="navbar-toggle collapsed" data-toggle="offcanvas" data-target="#side-menu" aria-expanded="false">
 <span class="sr-only">Toggle navigation</span>
  <span class="icon-bar"></span>
<span class="icon-bar"></span>
 <span class="icon-bar"></span>
</button>
 </div>
 </nav>
  <div class="search hidden-xs hidden-sm">
  <input type="text" placeholder="Search" id="search">
   </div>
  </div>
  <div class="col-md-5">
  <div class="header-rightside">
    <ul class="list-inline header-top pull-right">

    <?php
 if($myuser=="admin"){
 ?>
 <li class="hidden-xs"><a href="../adminpanel.php" class="add-project" >Admin Panel</a></li>
 <?php
}
?>

<li><a href="#"><i class="fa fa-envelope" aria-hidden="true"></i></a></li>
<li>
<a href="#" class="icon-info">
<i class="fa fa-bell" aria-hidden="true"></i>
<span class="label label-primary">3</span>
</a>
</li>

<ul class="dropdown-menu">
<li>
<div class="navbar-content">
<span>JS Krishna</span>
<p class="text-muted small">
me@jskrishna.com
</p>
<div class="divider">
</div>
<a href="#" class="view btn-sm active">View Profile</a>
</div>
</li>
</ul>
</li>
</ul>
</div>
</div>
</header>
</div>
<div class="user-dashboard">


<div class="col-md-5 col-sm-5 col-xs-12 gutter">

<div class="sales">
<h2>Your Sale</h2>

<div class="btn-group">
<button class="btn btn-secondary btn-lg dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
<span>Period:</span> Last Year
                                    </button>
                                    <div class="dropdown-menu">
                                        <a href="#">2020</a>
                                        <a href="#">2021</a>
                                        <a href="#">2022</a>
                                        <a href="#">2023</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-7 col-sm-7 col-xs-12 gutter">

                            <div class="sales report">
                                <h2>Report</h2>
                                <div class="btn-group">
<button class="btn btn-secondary btn-lg dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span>Period:</span> Last Year
                                    </button>
                                    <div class="dropdown-menu">
                                        <a href="#">2020</a>
                                        <a href="#">2021</a>
                                        <a href="#">2022</a>
                                        <a href="#">2023</a>
                                    </div>

                                </div>
                                <h2>products list</h2>


                        </div>
                       
                    </div>
                    <div >
                        <form action="#" method="post">
                          <h2> product name:</h2> <input type="text" name="pname" id="pname"style="width:400px;">
                         <h2>  quantity: </h2><input type="text" name="qnt" id="qnt" style="width:400px;">
                         <h2>  brand: </h2> <input type="text" name="brand" id="brand"style="width:400px;">
                         <h2>  category:</h2> <input type="text" name="category" id="category"style="width:400px;">
                         <h2>   price:</h2> <input type="text" name="price" id="price"style="width:400px;">
                         <h2>  image: </h2><input type="file" name="image" id="image"style="width:400px;"><br>
                            <input type="submit" name="submit"value="submit"style="width:400px;">
                        </form>
                        <h4 style="color:red">
    <?php
    echo $msg;

    ?>
               



</div>
                </div>
            </div>
        </div>
        

    </div>

   

    <!-- Modal -->
    <div id="add_project" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header login-header">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                    <h4 class="modal-title">Add Project</h4>
                </div>
                <div class="modal-body">
                            <input type="text" placeholder="Project Title" name="name">
                            <input type="text" placeholder="Post of Post" name="mail">
                            <input type="text" placeholder="Author" name="passsword">
                            <textarea placeholder="Desicrption"></textarea>
                    </div>
                <div class="modal-footer">
                    <button type="button" class="cancel" data-dismiss="modal">Close</button>
                    <button type="button" class="add-project" data-dismiss="modal">Save</button>
                </div>
            </div>

        </div>
    </div>


    <?php
   include "../includes/footer.php";
        ?>
</body>
</html>