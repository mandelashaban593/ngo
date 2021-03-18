<?php
	include("includes/connection.php");
	
	//for creating unique id with database checked
	$f = 0;
	$id = "";
	while($f != 1){
		$temp_id = uniqid("DN");
		//query for checking the uniqueid is exist in table or not
		$sql = "SELECT * FROM donation WHERE donate_id='".$temp_id."'";	
		$q = mysqli_query($con,$sql);
		if(mysqli_num_rows($q)==0){
			$id = $temp_id;
			$f = 1;
		}
	}
	
echo 	$user_id = $id ; echo "<br/>";
echo	$name = $_POST["donor_name"]; echo "<br/>";
echo	$email = $_POST["donor_email"]; echo "<br/>";
echo	$address = $_POST["donor_address"]; echo "<br/>";
echo	$city = $_POST["donor_city"]; echo "<br/>";
echo	$category = $_POST["cat"]; echo "<br/>";
echo	$item = $_POST['items'];  echo "<br/>";
echo	$discription = $_POST["donor_discription"];  echo "<br/>";
echo	$pickup = $_POST["pickup"];  echo "<br/>";
echo $category."<br>";
	$sql = "INSERT INTO donation(donate_id,donar_name,donar_email,city_id,address,category_id,date,items,discription,pickup) VALUES('".$user_id."','".$name."','".$email."','".$city."','".$address."','".$category."','".$date."','".$item."','".$discription."','".$pickup."')";

/*
donate_id,user_id, donar_name, donar_email, city_id	,address, category_id,date, discription	,pickup	,receive_date, items	*/

	$q=mysqli_query($con,$sql) or die(mysqli_error($con));
	if($q == 1){
		header("location:./donate.php");
	}
	else{
		echo "Error".mysqli_error($con);
	}
	mysqli_close($con);
?>

