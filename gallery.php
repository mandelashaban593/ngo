<?php	session_start();	?>
<?php
	include("./includes/session_check.php");
	include("includes/connection.php");
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<link rel="shortcut icon" type="image/x-icon" href="images/logo_icon.png" />
	<title>Gallery - Helping Hands</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<div id="header">
		<div>
			<a href="index.php" id="logo"><img src="images/logo.png" alt="logo"></a>
			<ul>
				<li><a href="index.php">Home</a></li>
				<li><a href="about.php">About</a></li>
				<li class="current"><a>gallery</a></li>
				<li><a href="news.php">News</a></li>
				<li><a href="event.php">Events</a></li>
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
				<div>
					<h2></h2>
					<p>
					</p>
				</div>
				
						<?php
					$sql = "SELECT * FROM media_gallery ORDER BY view DESC limit 1";
					$result = mysqli_query($con,$sql);
					$count=1;
					while($rs = mysqli_fetch_array($result)){
						if($count==1){
						?>
						<a> 

							

							<div style="height:300px">
								<span><?php echo $rs['caption']; ?></span>
								<img style="width:800px;height:300px;" src="<?php echo  substr($rs['image'], 2);?>">
							</div>
						</a>
						<?php
						}
						$count++;
					}
				?>
			
			</div>
			<div class="body">
				 
					
						<?php
					$sql = "SELECT * FROM media_gallery ORDER BY view DESC";
					$result = mysqli_query($con,$sql);
					$count=1;
					while($rs = mysqli_fetch_array($result)){
						if($count<=4){
						?>
						<a> 

							

							<div>
								<span><?php echo $rs['caption']; ?></span>
								<img src="<?php echo  substr($rs['image'], 2);?>">
							</div>
						</a>
						<?php
						}
						$count++;
					}
				?>

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