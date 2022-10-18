<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: index.html');
	exit;
}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Home Page</title>
		<link href="second.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
	</head>
	<body class="loggedin">
		<nav class="navtop">
			<div>
				<h1>Blog Post site</h1>
				<a href="home.php"><i class="fas fa-home-alt"></i>home</a>
				<a href="profile.php"><i class="fas fa-user-circle"></i>Profile</a>
                <a href="index.html"><i class="fa-solid fa-circle-info"></i>information</a>
				<a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
			</div>
		</nav>
	
        <div class="content">
			<h2>Home Page</h2>
            <?php
		   	$con = mysqli_connect("db", "user", "password", "appDB");
		   	$result=$con->query("SELECT * FROM posts"); 
		   	while ($row = mysqli_fetch_assoc($result)) 
		   	{
		   		echo "<p>" ."<a>" ."This post was made by: "."<b>".$row['post_user']."</b>" ."</a>"."<br>". "<br>".$row['post_info'] . "</p>";
		   	}
			?>
        </div>
	</body>
</html>