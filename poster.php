<?php


  session_start(); 

/* Attempt MySQL server connection.*/
include('dbconnect.php');


// initializing variables
$movie_id = $_SESSION['movie_id'];	
//$movie_id = "";
$img_src= "";
$title0= "";
 
// Attempt select query execution
$sql = "SELECT movie_name, img_path FROM movie WHERE movie_id='$movie_id'";
if($result = mysqli_query($db, $sql)){
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_array($result)){
			$title0=$row['movie_name'];
			$img_src=$row['img_path'];
		}
  
  // Free result set
        mysqli_free_result($result);
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($db);
}
 
// Close connection
mysqli_close($db);					
?>
<!DOCTYPE html>
<html>
<title>POSTER</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/poster.css">
<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet" type="text/css">
<style>
body {font-family: "Raleway", Arial, sans-serif; background }
.img-row img {margin-bottom: -8px}
</style>
<body style="background-image: url(images/background.png)">

<!-- !PAGE CONTENT! -->
<div class="img-content" style="max-width:1500px">

  <!-- Header -->
<?php
  echo"<header class='img-container img-xlarge img-padding-24'>";
	echo"<a href=# class='img-left img-button img-white'>".$title0."</a>";
    echo"<a href=moviedetail.php?varname=$movie_id class='img-left img-button img-white'>Back</a>";
  echo"</header>";
?>
  <!-- Photo Grid -->
  <div class="img-row">
    <div class="img-half">
      <?php echo"<img src=$img_src style=width:57%>"?>
    </div>
  </div>
  
<!-- End Page Content -->
</div>



</body>
</html>

  <?php
  /* Attempt MySQL server connection.*/



  /* Attempt MySQL server connection.*/
  include('dbconnect.php');


  // initializing variables
  $movie_id = $_SESSION['movie_id'];

  // initializing variables
  $x = 0;
  $y = 0;


  
  // Attempt select query execution
  $sql = "SELECT m.movie_name,r.r_data,r.num_rating from review r, movie m where r.movie_id='$movie_id' and  r.movie_id=m.movie_id ";

  if($result = mysqli_query($db, $sql)){
      if(mysqli_num_rows($result) > 0){
          echo "<table class=rwd-table>";
              echo "<tr>";
                  echo "<th><b>Title</b></th>";    
                  echo "<th><b>Reviews</b></th>";
                  echo "<th><b>Rating (out of 10)</b></th>";
                  
                
              echo "</tr>";
          while($row = mysqli_fetch_array($result)){
              echo "<tr>";
            
          $x++;
                  echo "<td >" . $row['movie_name'] . "</a></td>";

                  echo "<td >" . $row['r_data'] . "</a></td>";
                  echo "<td >" . $row['num_rating'] . "</a></td>";
          
                  echo "</tr>";
        
          }
          
          echo "</table>";
          // Free result set
          mysqli_free_result($result);
      } else{
          echo "No records matching your query were found.";
      }
  } else{
      echo "ERROR: Could not able to execute $sql. " . mysqli_error($db);
  }

  // Close connection
  mysqli_close($db);
  ?>
        

              </div>

        <style>
  @import "https://fonts.googleapis.com/css?family=Montserrat:300,400,700";
  .rwd-table {
    margin: 1em 0;
    min-width: 300px;
  }
  .rwd-table tr {
    border-top: 1px solid #ddd;
    border-bottom: 1px solid #ddd;
  }
  .rwd-table th {
    display: none;
  }
  .rwd-table td {
    display: block;
  }
  .rwd-table td:first-child {
    padding-top: .5em;
  }
  .rwd-table td:last-child {
    padding-bottom: .5em;
  }
  .rwd-table td:before {
    content: attr(data-th) ": ";
    font-weight: bold;
    width: 6.5em;
    display: inline-block;
  }
  @media (min-width: 480px) {
    .rwd-table td:before {
      display: none;
    }
  }
  .rwd-table th, .rwd-table td {
    text-align: left;
  }
  @media (min-width: 480px) {
    .rwd-table th, .rwd-table td {
      display: table-cell;
      padding: .25em .5em;
    }
    .rwd-table th:first-child, .rwd-table td:first-child {
      padding-left: 0;
    }
    .rwd-table th:last-child, .rwd-table td:last-child {
      padding-right: 0;
    }
  }
  .rwd-table {
    background: #34495E;
    color: #fff;
    border-radius: .4em;
    overflow: hidden;
  }
  .rwd-table tr {
    border-color: #46637f;
  }
  .rwd-table th, .rwd-table td {
    margin: .5em 1em;
  }
  @media (min-width: 480px) {
    .rwd-table th, .rwd-table td {
      padding: 1em !important;
    }
  }
  .rwd-table th, .rwd-table td:before {
    color: #dd5;
  }

  </style>
