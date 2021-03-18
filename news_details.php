<?php
	session_start();
	include("./includes/connection.php");
?>
<!DOCTYPE html>
<head>
	<meta charset="UTF-8">
	<link rel="shortcut icon" type="image/x-icon" href="images/logo_icon.png" />
	<title>News - Helping Hands</title>
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
				<li class="current" ><a>News</a></li>
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
		<div id="newsblog">
			<div class="aside" >
			
			<?php
				$count = 1;
				$sql = "SELECT * FROM news where news_id = '".$_GET['news_id']."'  ";
				$result = mysqli_query($con,$sql);

				while($rs = mysqli_fetch_array($result)){
					
			?>
				<ul style="display:inline;">
					<li style="overflow:scroll;width:560px">
						<h2><a href="news.php"><?php echo $rs['heading']; ?></a></h2>
						<span class="date"><?php echo $rs['date']; ?></span>
						<p>
							<?php echo $rs['description']; ?>
						</p>
					</li>
				</ul>
			<?php

				}
			?>
			</div>
			<div class="sidebar">
				<div>
					<h2>Recent Post</h2>
					<ul>
						<?php
						$sql = "SELECT * FROM news ORDER BY date DESC Limit 6";
						$result = mysqli_query($con,$sql);
						
						while($rs = mysqli_fetch_array($result)){
						?>
							
						<li>
					
							<a href="news_details.php?news_id=<?php echo $rs['news_id'] ?>" ><?php echo $rs['heading']; ?></a>

						</li>
						<?php
								
							}
						?>
						
					</ul>
				</div>
			</div>
			
		</div>
	</div>
	<?php	include("./includes/footer.html");	?>
</body>
</php>