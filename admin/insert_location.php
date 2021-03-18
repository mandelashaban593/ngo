<?php
	include("./includes/connection.php");
	$f = 0;
	$id = "";
	mysqli_query($con,"SET FOREIGN_KEY_CHECKS = 0");

	echo $new_state = $_POST["new_state"]; echo "<br/>";
	echo $new_city = $_POST["new_city"];	echo "<br/>";


   $sql = "SELECT city_id FROM city  ORDER BY city_id DESC LIMIT 1 ";
	$result = mysqli_query($con,$sql) or die(mysqli_error($con));
	$rs = mysqli_fetch_array($result);
	$city_id = $rs['city_id'];
	$city_id=$city_id+1;

	$sql = "SELECT * FROM city  WHERE city_name='".$new_city."' ";
	$result = mysqli_query($con,$sql) or die(mysqli_error($con));
	mysqli_data_seek($result, 0);
	$row = mysqli_fetch_array($result);
	$rowcount=mysqli_num_rows($result);
	if($rowcount==0){
		echo "Worked: " . "<br/>";
		$sql = "INSERT INTO city(city_id,state_id,city_name) VALUES('".$city_id."','".$new_state."','".$new_city ."')";

		$result = mysqli_query($con,$sql) or die(mysqli_error($con));
		if($result){
			echo "QUery worked". "<br/>";
		}
	}


/* 

	$sql = "SELECT * FROM  state  WHERE state_id='".$new_state."' ";
	$result = mysqli_query($con,$sql);
	if(!$result){
		$sql = "SELECT state_id FROM state  ORDER BY state_id DESC LIMIT 1 ";
		$result = mysqli_query($con,$sql) or die(mysqli_error($con));
		$rs = mysqli_fetch_array($result);
		$state_id = $rs['state_id'];
		$state_id=$state_id+1;

		$sql = "INSERT INTO state(state_id,state_name) VALUES('".$state_id."','".$new_state."')";

		$result = mysqli_query($con,$sql) or die(mysqli_error($con));
	}
	header("location:manage_location.php");
	*/
?>