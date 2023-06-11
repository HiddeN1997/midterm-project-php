<?php
session_start();
if(!isset($_SESSION['userid'])){
    header("location:login.php");
    die();
}
if(!isset($_GET['id'])){
    header("location:index.php");
    die();
}
include "model/connection.php";

$pid=$_GET['id'];
    $sql="SELECT * from products where id='$pid'";      
    $result=$mysql->query($sql);
    $row=$result->fetch_assoc();


$error_msg="";
if(isset($_POST['submit'])){
    if(empty($_POST['quant']))
    $error_msg="please input the quantity";
    else if($row['qnt']<$_POST['quant']){
        $error_msg="not enough product";
    }
    else{

        
        $new_qnt= $row['qnt'] - $_POST['quant'];
        $sql="UPDATE products set qnt='$new_qnt' where id='$pid'"; 
        $mysql->query($sql); 


        $sql="SELECT * from cart where pid='$pid'";
        $result=$mysql->query($sql);
        $qnt3=$_POST['quant'];
        if ($result->num_rows>0){
            $row2=$result->fetch_assoc();
            $qnt_main_cart=$row2['qnt'];
            $new_qnt_cart=$qnt_main_cart+$qnt3;
            $sql="UPDATE cart set qnt='$new_qnt_cart' where pid='$pid' ";
            $mysql->query($sql);
            
        }
        else{
            
            $sql="INSERT into cart (uid,pid,qnt) values('$userid','$pid','$qnt3')";   
            $mysql->query($sql);
        }


        $userid=$_SESSION['userid'];
        $qnt3=$_POST['quant'];
        $sql="INSERT into cart (uid,pid,qnt) values('$userid','$pid','$qnt3')";  
        $mysql->query($sql); 
        header("location:cart.php");
        die();
    }

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
   include "includes/header.php";
        ?>

<body class="home">
    
<div class="container-fluid display-table">
<div class="row display-table-row">
<div class="col-md-2 col-sm-1 hidden-xs display-table-cell v-align box" id="navigation">
<div class="logo">

</div>
<div class="navi">
<ul>
<li class="active"><a href="index.php"><i class="fa fa-home" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Home</span></a></li>
<li><a href="#"><i class="fa fa-tasks" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Workflow</span></a></li>
<li><a href="#"><i class="fa fa-bar-chart" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Statistics</span></a></li>
<li><a href="#"><i class="fa fa-cog" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Setting</span></a></li>
<li><a href="#"><i class="fa fa-calendar" aria-hidden="true"></i><span class="hidden-xs hidden-sm">calender</span></a></li>
<li><a href="logout.php"><i class="fa fa-user" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Logout</span></a></li>
  
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
 <li class="hidden-xs"><a href="adminpanel.php" class="add-project" >Admin Panel</a></li>
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
                        </div>
                    </div>

                    <div class="card" style="width: 18rem;">
  <img class="card-img-top" src="<?php echo $row['image']; ?>" alt="Card image cap" width="200px" height="200px" >
  <div class="card-body">
    <h5 class="card-title">product name:<b>  <?php echo $row['pname']; ?>   <b></h5>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item">Quantity: <b> <?php echo $row['qnt']; ?>    <b></li>
    <li class="list-group-item">price: <b> <?php echo $row['price']; ?>    <b></li>
    

  </ul>
  <div class="card-body">
  <form action="#" method="post" class="detail-form">
        <label for="qnt">Put a Number to order </label>
        <input type="text" id="#qnt" name="quant">
        <input type="submit" name="submit" value="order now">
        
  </div>
</div>

                    
<?php
    include "includes/footer.php";
        ?>       
    
</body>
</html>