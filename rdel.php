<?php
session_start();

// initializing variables
$movie_id = $_GET['del'];
$username=$_SESSION['username'];

// connect to the database
include('dbconnect.php');
	  $sql0 = "SELECT id FROM users WHERE username='$username'";
	  $result0 = mysqli_query($db, $sql0);
	  $row0 = mysqli_fetch_array($result0);
	  $user_id=$row0['id'];
	  
	  $sql = "DELETE FROM r_r WHERE movie_id='$movie_id' AND id='$user_id'";
	  $result = mysqli_query($db, $sql);
	  $_SESSION['success2'] = "Successfully Deleted!";
	  //$_SESSION['success2'] = $movie_id;
	  header("location: dashboard.php");
?>