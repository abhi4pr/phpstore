<?php

session_start();
include 'connect.php';

    $aaa = "SELECT * from customers WHERE email = '".$_SESSION['email']."'";
	$bbb = mysqli_query($connect,$aaa);
	 while($ccc = mysqli_fetch_assoc($bbb)){
	    $email = $ccc['email'];
	}

 if(isset($_POST['pid'])){
 	$id = $_POST['pid'];
 	$name = $_POST['pname'];
 	$price = $_POST['pprice'];
 	$image = $_POST['pimage'];
 	$qty = 1;

 	$sql = "SELECT name from cart WHERE name='".$name."' AND email='".$_SESSION['email']."'";
 	$run = mysqli_query($connect,$sql);
 	if(mysqli_num_rows($run)>0){
 		echo '<div class="alert alert-danger alert-dismissible">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				<strong>Item is allready in your cart</strong>
			  </div>';
 	} elseif(!isset($_SESSION['email'])) {
 		echo "<script>alert('Please Login to add cart !')</script>";
 		echo "<script>location.reload();</script>";
 	} else {
 		$query = "INSERT into cart(name,price,picture,qty,total_price,email) VALUES('$name','$price','$image','$qty','$price','$email')";
 		$run = mysqli_query($connect,$query);
 		echo '<div class="alert alert-success alert-dismissible">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				<strong>Item added in your cart</strong>
			  </div>';
 	}
 }

  if(isset($_GET['cartItem']) && isset($_GET['cartItem']) == 'cart_item'){
 	$query = "SELECT * from cart WHERE email = '".$_SESSION['email']."'";
 	$run = mysqli_query($connect,$query);
 	$rowcount = mysqli_num_rows($run);
 	echo $rowcount;
 }

  if(isset($_GET['remove'])){
 	$id = $_GET['remove'];
 	$query = "DELETE from cart WHERE id='".$id."'";
 	$run = mysqli_query($connect,$query);
 	header('location:cart.php');
 }

  if(isset($_GET['clear'])){
 	$query = "DELETE from cart WHERE email = '".$_SESSION['email']."'";
 	$run = mysqli_query($connect,$query);
 	header('location:cart.php');
 }

  if(isset($_POST['pqty'])){
 	$qty = $_POST['pqty'];
 	$id = $_POST['pid'];
 	$price = $_POST['pprice'];

 	$tprice = $qty*$price;

 	$query = "UPDATE cart SET qty='".$qty."',total_price='".$tprice."' WHERE id='".$id."'";
 	$run = mysqli_query($connect,$query);
 	$query2 = "DELETE from cart WHERE name=''";
 	$run2 = mysqli_query($connect,$query2);
 }

  if(isset($_POST['action']) && isset($_POST['action']) == 'order'){
 	$username = $_POST['username'];
 	$email = $_POST['email'];
 	$number = $_POST['number'];
 	$address = $_POST['address'];
 	$pmode = $_POST['pmode'];
 	$products = $_POST['products'];
 	$grand_total = $_POST['grand_total'];

 	$query = "INSERT into orders (username,email,number,address,pmode,products,grand_total) VALUES ('$username','$email','$number','$address','$pmode','$products','$grand_total')";
 	$run = mysqli_query($connect,$query);

 	$query2 = "DELETE from cart WHERE email = '".$_SESSION['email']."'";
 	$run2 = mysqli_query($connect,$query2);
 }

?>