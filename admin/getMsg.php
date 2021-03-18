<?php
	include("./includes/connection.php");
	#echo "Nothing";
	/*echo $_GET['msg_id'];*/
	$sql = "SELECT * FROM messages WHERE msg_id='".$_GET['msg_id']."'";
	$result = mysqli_query($con,$sql);
	$rs = mysqli_fetch_array($result);
	/*echo $rs['message'];*/
	$message=$rs['message'];
/*
	echo "ID MSG:". $_GET['msg_id']. "<br/>";
*/
	$url = "messages.php?message=$message";

	header("Location: $url");
	
?>