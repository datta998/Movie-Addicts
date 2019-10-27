<?php 
// connect to the database
$db = mysqli_connect("localhost", "root", "", "movie_review");

if($db === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>1