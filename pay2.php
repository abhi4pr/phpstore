<?php

include('header.php');
include('connect.php');
//session_start();

$status=$_POST["status"];
$firstname=$_POST["firstname"];
$amount=$_POST["amount"];
$txnid=$_POST["txnid"];
$posted_hash=$_POST["hash"];
$key=$_POST["key"];
$productinfo=$_POST["productinfo"];
$email=$_POST["email"];
$salt="jFdrP6QzU7";
$udf1=$_POST["udf1"];
$udf2=$_POST["udf2"];
$udf3=$_POST["udf3"];
$udf4=$_POST["udf4"];
$udf5=$_POST["udf5"];

// Salt should be same Post Request 

If (isset($_POST["additionalCharges"])) {
       $additionalCharges=$_POST["additionalCharges"];
        $retHashSeq = $additionalCharges.'|'.$salt.'|'.$status.'|||||||||||'.$email.'|'.$firstname.'|'.$productinfo.'|'.$amount.'|'.$txnid.'|'.$key;
  } else {
        $retHashSeq = $salt.'|'.$status.'||||||'.$udf5.'|'.$udf4.'|'.$udf3.'|'.$udf2.'|'.$udf1.'|'.$email.'|'.$firstname.'|'.$productinfo.'|'.$amount.'|'.$txnid.'|'.$key;
         }
     $hash = hash("sha512", $retHashSeq);
       if ($hash != $posted_hash) {
         echo "Invalid Transaction. Please try again";
       } else {

            $select2 = "SELECT * from customers WHERE email = '".$email."'";
            $run5 = mysqli_query($connect,$select2);
             while($row1 = mysqli_fetch_assoc($run5)){
                $username = $row1['username'];
                $email = $row1['email'];
                $number = $row1['number'];
                $address = $row1['address'];
             }

             $_SESSION['email'] = $email;

            $insert1 = "INSERT into orders (username,email,number,address,pmode,grand_total) VALUES ('$username','$email','$number','$address','Payumoney','$amount')";
            $run1 = mysqli_query($connect,$insert1);
            $order_id = mysqli_insert_id($connect);

            $select1 = "SELECT * from cart WHERE pid IN ('$udf1','$udf2','$udf3','$udf4','$udf5') AND email = '".$_SESSION['email']."'";
            $run2 = mysqli_query($connect,$select1);
            while($row2 = mysqli_fetch_array($run2)){
              $pid = $row2["pid"];  
              $qty = $row2["qty"];
              $price = $row2["price"];

              $insert2 = "INSERT into order_items (order_id,product_id,qty,price,pmode,email,grand_total) values ('$order_id','$pid','$qty','$price','Payumoney','$email','$amount')";              
              $run3 = mysqli_query($connect,$insert2);
            }

            $delete1 = "DELETE from cart WHERE email = '".$_SESSION['email']."'";
            $run4 = mysqli_query($connect,$delete1);

          echo "<script>alert('Ordered successfully')</script>";
          echo "<script>window.open('myaccount.php','_self')</script>";
       }
?>  