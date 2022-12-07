
<?php 
// Include the database configuration file  
$con = mysqli_connect("db", "user", "password", "appDB");

 
// Get image data from database 
$result = $con->query("SELECT * FROM images "); 
?>

<?php if($result->num_rows > 0){ ?> 
    <div class="gallery"> 
        <?php while($row = $result->fetch_assoc()){ 
            $test = ($row['imageData']);
            $sub = substr($test,2);
            echo '<img src="data:image/jpeg;base64,'.base64_encode( $test).'"/>';
            }
            ?> 
    </div> 
<?php }else{ ?> 
    <p class="status error">Image(s) not found...</p> 
<?php } ?>