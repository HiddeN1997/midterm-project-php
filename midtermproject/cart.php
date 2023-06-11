<?php
session_start();
if(!isset($_SESSION['userid'])){
    header("location:login.php");
    die();
}

include "model/connection.php";
$errormsg="";


if(isset($_POST['finalize'])){
    $uid=$_SESSION['userid'];
    $sql="SELECT * from cart where uid='$uid' ";
    $result=$mysql->query($sql);
    $row=$result->fetch_assoc();

    while($row){
        $uid1=$row['uid'];
        $pid1=$row['pid'];
        $qnt1=$row['qnt'];
        
        $sql="INSERT INTO final_shop (uid,pid,qnt) VALUES('$uid1','$pid1','$qnt1')";
        $mysql->query($sql);
        $row=$result->fetch_assoc();

    }

    $sql="DELETE FROM cart where uid='$uid' ";
    $mysql->query($sql);

    $succesmsg="thanks for your shopping!";


}




if (isset($_POST['delete'])){
    $pid=$_POST['pid'];
    $sql="DELETE from cart where pid='$pid'";
    $mysql->query($sql);

    $sql="SELECT qnt from products where id='$pid' ";
    $result=$mysql->query($sql);
    $row=$result->fetch_assoc();

    $min_qnt=$row['qnt'];
    $qnt=$_POST['old_qnt'];
    $final_qnt=$min_qnt+$qnt;

    
    $sql="UPDATE products set qnt='$final_qnt'     where id='$pid'";
    $mysql->query($sql);



}


if (isset($_POST['edit'])){
    $pid=$_POST['pid'];
    $edit_qnt=$_POST['new_qnt'];

    $sql="SELECT * from products where id='$pid'";      
    $result=$mysql->query($sql);
    $row=$result->fetch_assoc();

    if($row['qnt']<$edit_qnt)
        $errormsg="not enough quantity";
        else if($edit_qnt<=0 or empty($edit_qnt))
        $errormsg="wrong value for edit";
    
    
    else{
        $sql="UPDATE cart set qnt='$edit_qnt' where pid='$pid' ";
        $mysql->query($sql);

        $edit_old_qnt=$_POST['old_qnt'];
        $edit_final_qnt=$edit_old_qnt-$edit_qnt;
        $sql="UPDATE products set qnt=qnt+'$edit_final_qnt' ";
        $mysql->query($sql);
    }



}
$userid=$_SESSION['userid'];
$sql="SELECT products.pname,products.brand,products.price,cart.qnt,cart.pid from cart inner join products on cart.pid=products.id
where cart.uid='$userid'";
$result=$mysql->query($sql);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/style.css">
    <title>Document</title>
</head>
<body>

<?php
    include "includes/header.php";
    if(isset($succesmsg)){
        echo $succesmsg;
        header("refresh=2;url=index.php");
        die();
    }
    $row=$result->fetch_assoc();
    $ebox=0;
    while($row){
        $ebox+=($row['price'] * $row['qnt'] );

    ?>
    <div style="height:495px;">
    <h1> name: <?php echo $row['pname'];    ?> </h1>
    <h1> brand: <?php echo $row['brand'];    ?> </h1>
    <h1> price: <?php echo $row['price'];    ?> </h1>
    <h1> quantity: <?php echo $row['qnt'];    ?> </h1>
    <form action="#" method="post">
    <input type="text" name="new_qnt" id="" style="width:80px;">
        <input type="submit" value="delete" name="delete" style="width:80px;">
        <input type="submit" value="edit" name="edit" style="width:80px;">
       
        <input type="hidden" name="pid" value=<?php echo $row['pid'];    ?>>
        <input type="hidden" name="old_qnt" value=<?php echo $row['qnt'];    ?>>
        
    </form>

    <hr>
    </div>

<?php
$row=$result->fetch_assoc();
}

echo $errormsg;   


?>

<h1>total price: <?php echo $ebox;     ?></h1>

<form action="#" method="post">
    <input type="submit" value="finalize shop" name="finalize" style="width:150px;">

</form>
<?php
    include "includes/footer.php";
        ?>       

</body>
</html>