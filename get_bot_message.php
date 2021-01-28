<?php
date_default_timezone_set('Asia/Kolkata');
include('connect.php');

$txt = mysqli_real_escape_string($connect,$_POST['txt']);
$sql = "SELECT reply from chatbot_hints where question like '%$txt%'";
$res = mysqli_query($connect,$sql);

if(mysqli_num_rows($res)>0){
	$row=mysqli_fetch_assoc($res);
	echo $row['reply'];
} else {
	echo "Sorry not be able to understand you";
}

?>