<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: *, Authorization');
header('Access-Control-Allow-Methods: *');
header('Access-Control-Allow-Credentials: true');

header('Content-type: json/application');

require 'functions.php';

$method = $_SERVER['REQUEST_METHOD'];

$q = $_GET['q'];
$params = explode('/', $q);

$type = $params[0];
$id = $params[1];

$connect = mysqli_connect("db", "user", "password", "appDB");

switch ($method) {
    case 'GET':
        if($type === 'posts'){
            if(isset($id)){
                getPost($connect,$id);
               
            } else{
                getPosts($connect);
            }
        }
        break;
    case 'POST':
        if(isset($_POST['id'])){
            updatePost($connect,$_POST);
        }
        else {
            addPost($connect,$_POST);
        }
        break;
    case 'DELETE':
        if($type === 'posts'){
            if(isset($id))
            {
                deletePost($connect,$id);      
            }  
        }  
        break;    
}