<?php

   include('../connect.php');
   $id = $_GET['id'];
   $query = "DELETE FROM products WHERE id = $id"; 
   $result = mysqli_query($connect,$query) or die ( mysqli_error());
   header("Location: products.php"); 

?>