<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: index.html');
	exit;
}
if(isset($_POST["submit"])) {
	
	$url = 'http://192.168.31.77:1000';

	$data = array('user' => $_SESSION['name'], 'info' => $_POST['info']);
	// use key 'http' even if you send the request to https://...
	$options = array(
	    'http' => array(
	        'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
	        'method'  => 'POST',
	        'content' => http_build_query($data)
	    )
	);
	$context  = stream_context_create($options);
	$result = file_get_contents($url, false, $context);
	if ($result === FALSE) { /* Handle error */ 
	var_dump($result);
	}
}		
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Home Page</title>
		<link href="second.css" rel="stylesheet" type="text/css">
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
	
        <div class="content">
			<h2>Home Page</h2>
			<div class="post">
				<form method = "post">
                    <input type="info" name="info" placeholder="Type your post "/>
                    <input type="submit" value="Post" class="submit" name ="submit"/>
                </form>
			</div> 
            <?php
			$json = file_get_contents("http://192.168.31.77:1000/posts");
			$obj = json_decode($json);
			
			foreach($obj as $post){

				echo '<div class="post">';
				echo "<h3>" ."This post was made by: "  ."$post->post_user". "</h3>" . "<p>". $post->post_info . "</p>";
				echo '</div> ';
			}
			?>
			
        </div>
	</body>
</html>