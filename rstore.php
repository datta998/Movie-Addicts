<?php
session_start();

// initializing variables
$rating = 0.0;
$review = "";
$movie_id = $_SESSION['movie_id'];
$username = $_SESSION['username'];

$user_id = 0;
// connect to the database
include('dbconnect.php');
if (isset($_POST['RStore'])) {
	  $sql0 = "SELECT user_id,username FROM users WHERE username='$username'";
	  $result = mysqli_query($db, $sql0);
	  $row = mysqli_fetch_array($result);
	  $user_id=$row['user_id'];
	  $username=$row['username'];
	  $rating = mysqli_real_escape_string($db, $_POST['rating']);
	  $review = mysqli_real_escape_string($db, $_POST['Review']);
	  $sql = "UPDATE review SET r_data='$review', num_rating='$rating' WHERE movie_id='$movie_id' AND reviewer_id='$user_id'";
	  $result = mysqli_query($db, $sql);
	  if(mysqli_num_rows($result)==0)
	  {
		$sql1 = "INSERT INTO review(reviewer_id,movie_id, r_data, num_rating, username) VALUES('$user_id','$movie_id', '$review', '$rating','$username')";  
		$result1 = mysqli_query($db, $sql1);
	  }
	  $_SESSION['success1'] = "Done!";
	  header("location: moviedetail.php?varname=$movie_id");
}
?>