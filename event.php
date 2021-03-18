<?php	session_start();	?>
<?php
	include("includes/connection.php");
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<link rel="shortcut icon" type="image/x-icon" href="images/logo_icon.png" />
	<title>Events - Helping Hands</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<div id="header">
		<div>
			<a href="index.php" id="logo"><img src="images/logo.png" alt="logo"></a>
			<ul>
				<li><a href="index.php">Home</a></li>
				<li><a href="about.php">About</a></li>
				<li><a href="gallery.php">gallery</a></li>
				<li><a href="news.php">News</a></li>
				<li class="current"><a>Events</a></li>
				<li><a href="donate.php">Donate</a></li>
				<?php 
					if(isset($_SESSION["user_id"])){
				?>
					<li><a href="profile.php">profile</a></li>
					<li><a href="faq.php">FAQ</a></li>
					<li class="log_btn"><a href="logout.php">Logout</a></li>
				<?php 
					}
					else{
				?>
					<li class="log_btn"><a href="login.php">Login</a></li>
				<?php
					}
				?>
			</ul>
		</div>
	</div>
	<div id="body">
		<div id="gallery">
			<div class="header">
				<div class="container row">

					
				
						<?php

			$total_pages_sql = "SELECT DISTINCT event_id,event_name,	event_description, date, time, address, city_id, duration, image FROM event limit 1";
			$result = mysqli_query($con,$total_pages_sql)   or die(mysqli_error($con));
			$rows = mysqli_fetch_array($result)  or die(mysqli_error($con));
				mysqli_data_seek($result, 0);
				while($item = mysqli_fetch_array($result)) {
				
			    // get the items in the specific chunk
			    echo "<div class='row container' style='width:1400px'>";
			   
			        // you'd find your data elements in $item 

			         echo "
					   <div class='card' style='width: 15rem;'>
					  <div class='card-body'>
					    <h5 class='card-title'>".$item['event_name']."</h5>
					    <h6 class='card-subtitle mb-2 text-muted'>".$item['address']."</h6>
					    <p class='card-text'>".$item['event_description']."</p>
					    <p class='card-text'>".$item['date']."</p>
					    <p class='card-text'>".$item['time']."</p>
					    <p class='card-text'>".$item['duration']."</p>
					       <p class='card-text'>".$item['address']."</p>
					     
                      ";				

			    ?>
			  <p class='card-text'> <img style="width:300px;height: 90px" src="<?php echo  substr($item['image'], 2);?>"></p>
			    <?php

			    echo "<a href='#' class='card-link'>Event</a>
					  </div>
					</div>";

			    // you'd close the row off here
				}




				?>
					<!--  -->



				</div>
				<img src="" height="250px" width="500px">
			</div>
			<div class="body container" style="width:900px">

				<?php

			$total_pages_sql = "SELECT DISTINCT event_id,event_name,	event_description, date, time, address, city_id, duration, image FROM event";
			$result = mysqli_query($con,$total_pages_sql)   or die(mysqli_error($con));
			$rows = mysqli_fetch_array($result)  or die(mysqli_error($con));
				mysqli_data_seek($result, 0);
				while($rows = mysqli_fetch_array($result)) {
				    $data[] = $rows;
				}

				$chunked = array_chunk($data, 3);


							// start the loop of chunks
			foreach($chunked as $chunk) {
			    // you'd open the row here
			    // get the items in the specific chunk
			    echo "<div class='row container' style='width:1100px'>";
			    foreach($chunk as $item) {
			        // you'd find your data elements in $item 

			         echo "
					   <div class='card' style='width: 15rem;'>
					  <div class='card-body'>
					    <h5 class='card-title'>".$item['event_name']."</h5>
					    <h6 class='card-subtitle mb-2 text-muted'>".$item['address']."</h6>
					    <p class='card-text'>".$item['event_description']."</p>
					    <p class='card-text'>".$item['date']."</p>
					    <p class='card-text'>".$item['time']."</p>
					    <p class='card-text'>".$item['duration']."</p>
					      <p class='card-text'>".$item['address']."</p>
					     
                      ";				

			    ?>
			   <p class='card-text'> <img style="width:320px;height: 90px" src="<?php echo  substr($item['image'], 2);?>"></p>
			    <?php

			    echo "<a href='#' class='card-link'>Event</a>
					  </div>
					</div>";

						


			    }

			    echo "</div>";

			    // you'd close the row off here
			}




				?>
					<!--  -->

			</div>
			<div class="footer">
				<p>
					stay connected with us, we know the needs of pepole who are poor, disabled. get invloved with us and start helping pepole with your abilities
				</p>
				<a href="login.php">Get Involved</a>
			</div>
		</div>
	</div>
	<?php	include("./includes/footer.html");	?>
</body>
</html>