<?php

function getPosts($connect)
{
	$posts = mysqli_query($connect,"SELECT * FROM `posts`");
	$postList = [];
	while($post = mysqli_fetch_assoc($posts)){
		$postList[] = $post;
	}
	echo json_encode($postList);
}

function getPost($connect,$id)
{
	$post = mysqli_query($connect,"SELECT * FROM `posts` WHERE post_id = '$id'");
	if(mysqli_num_rows($post) === 0){
		http_response_code(404);
		$res = [
			"status" => false,
			"message" => "Post not found"
		];
		echo json_encode($res);
	} else {
		$post = mysqli_fetch_assoc($post);
		echo json_encode($post);
	}
}
function addPost($connect,$data){
	$user = $data['user'];
	$info =  $data['info'];
	mysqli_query($connect, "INSERT INTO `posts` (post_user,post_info ) VALUES ('$user','$info')");
	
	http_response_code(201);

	$res = [
		"status" => true,
		"post_id" => mysqli_insert_id($connect)
	];
	echo json_encode($res);
}


function updatePost($connect,$data){
	$id = $data['id'];
	$user = $data['user'];
	$info =  $data['info'];
	mysqli_query($connect, "UPDATE `posts` SET `post_user` = '$user', `post_info` = '$info' WHERE `posts`.`post_id` = $id");
	
	http_response_code(200);
	$res = [
		"status" => true,
		"message" => "post is edited",
		"post_user" => $user,
		"post_info" => $info
	];
	echo json_encode($res);
}

function deletePost($connect,$id){
	mysqli_query($connect, "DELETE FROM `posts` WHERE `posts`.`post_id` = $id");

	http_response_code(200);
	$res = [
		"status" => true,
		"post_id" => $id,
		"message" => "post is deleted",
	];
	echo json_encode($res);
}


