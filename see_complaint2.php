<!DOCTYPE html>
<html>
<style>

div {
   margin-left: 400px;
   margin-right: 400px;
   margin-top: 20px;
  border-radius: 5px;
  background-color: rgba(254,255,149,0.4);
  padding: 20px;
}

.card {
  /* Add shadows to create the "card" effect */
  background: rgba(254,255,149,0.4);
  box-shadow: 0 4px 8px 0  rgba(0,0,0,1);
  transition: 0.2s;
}

/* On mouse-over, add a deeper shadow */
.card:hover {
  box-shadow: 0 8px 16px 0 rgba(0,0,0,1);
}

/* Add some padding inside the card container */
.container {
  padding: 2px 16px;
}
h5{
  margin-right: 300px;
}

.bg {
  background-image: url("background2.jpg");

  /* Full height */
  height: 70%;

  /* Center and scale the image nicely */
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  background-attachment: fixed;
}
</style>

<body class="bg">

<center>
<h2>COMPLAINTS</h2>
<center>

<div 
<?php

session_start();

$con=mysqli_connect('localhost','root','','student');
// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}


$nm = $_SESSION["user"];


//$dt = date("Y/m/d");
$result = mysqli_query($con,"SELECT * FROM complaint WHERE user_name='". $nm. "'");


while($row = mysqli_fetch_array($result))
{

  echo "<div class='card'>";
  echo "<h5>" . 'Submitted on: ' . $row['date1'] . "</h5>";
  echo "<h5>" . 'Submitted by: ' . $row['user_name'] . "</h5>";
  echo "<center><h3>" . $row['heading'] . "</h3></center>";
  echo "<center><p>" . $row['content'] . "<p></center>";
  echo "<p>" . 'reply:' . $row['result'] . "<p>";
  echo "<h5>" . 'Replied on: ' . $row['date2'] . "</h5>";
  echo "</div>";
}


mysqli_close($con);
?>
  </div>

</body>
</html>