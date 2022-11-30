<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: index.html;');
	exit;
}


?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Profile Page</title>
		<?php
		if($_SESSION['darkmode'] === false)
		{
			echo '<link href="second.css" rel="stylesheet" type="text/css">';
		}else{
			echo '<link href="dark.css" rel="stylesheet" type="text/css">';
		}
		?>
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
		
	</head>
	<body class="loggedin">
		<nav class="navtop">
			<div>
				<h1>Blog Post site</h1>
                <a href="home.php"><i class="fas fa-home-alt"></i>home</a>
				<a href="profile.php"><i class="fas fa-user-circle"></i>Profile</a>
				<a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
			</div>
		</nav>
		<div class="card">
			<h2>Profile Page</h2>
			<div>
				<p>Your account details are below:</p>
				<table>
					<tr>
						<td>Username:</td>
						<td><?=$_SESSION['name']?></td>
					</tr>
					<tr>
						<td>Password:</td>
						<td><?=$_SESSION['pass']?></td>
					</tr>
					<tr>
						<td>theme:
						<form method="POST">
							<select name="course" size="1">
								<option value="light">light</option>
								<option value="Dark">Dark</option>
							</select>
							<input type="submit" value="Отправить">
						</form>
						</td>
						<?php
						if(isset($_POST["course"]))
						{
							$course = $_POST["course"];
							if($course == 'light'){
								$_SESSION['darkmode'] = false;
							
							}else{
								$_SESSION['darkmode'] = true;
							}
						}
						?>
					</tr>
				</table>
			</div>
		</div>
	</body>
</html>