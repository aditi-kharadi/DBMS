<!DOCTYPE html>
<html>
<style>

.card {
  /* Add shadows to create the "card" effect */
  background: rgba(0,0,0,0.2);
  box-shadow: 0 4px 8px 0  rgba(0,0,0,1);
  transition: 0.2s;
  margin-left: 400px;
   margin-right: 400px;
   margin-top: 20px;
  border-radius: 5px;
  background-color: rgba(254,255,149,0.4);
  padding: 20px;
}

/* On mouse-over, add a deeper shadow */
.card:hover {
  box-shadow: 0 8px 16px 0 rgba(0,0,0,1);
}

/* Add some padding inside the card container */
.container {
  padding: 2px 6px;
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
<h2>COMPLAINS</h2>
<center>

<div>
<?php

session_start();

$con=mysqli_connect('localhost','root','','student');
// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

//$dt = date("Y/m/d");
$result = mysqli_query($con,"SELECT * FROM complaint " );


while($row = mysqli_fetch_array($result))
{
  $id=$row['c_id'];
  echo "<div class='card'>";
  echo "<h5>" . 'Submitted on: ' . $row['date1'] . "</h5>";
  echo "<h5>" . 'Submitted by: ' . $row['user_name'] . "</h5>";
  echo "<center><h3>" . $row['heading'] . "</h3></center>";
  echo "<center><p>" . $row['content'] . "<p></center>";
  echo "<p>" . 'reply:' . $row['result'] . "<p>";
  echo "<h5>" . 'Replied on: ' . $row['date2'] . "</h5>";
  echo "<form action='complaint2.php' method='post'>
       <input type='submit' name='actionn' value='delete'/>
        <input type='submit' name='actionn' value='reply'/>
        <input type='hidden' name='id' value='$id'/>
        </form>";
  echo "</div>";
}

if(isset($_POST['actionn']) && isset($_POST['id'])){
  //echo $head;
  $id=$_POST['id'];
    echo $id;
    $result = mysqli_query($con,"SELECT * FROM complaint WHERE c_id='". $_POST['id']. "'" );
    $row = mysqli_fetch_array($result);
    $id2=$row['heading'];
    $id3=$row['content'];
  //$result=$post['actionn']; 
  if ($_POST['actionn'] == 'delete') {

    $result = mysqli_query($con,"SELECT * FROM complaint " );




  $sql = "DELETE FROM complaint WHERE c_id='". $_POST['id']. "'";

 // $sql = "UPDATE complaint SET result=' ". $v2. " ' WHERE content=' ". $v. " '";

      
  if ($con->query($sql) === TRUE) {
      echo "Record deleted successfully";
  } else {
      echo "Error deleting record: " . $con->error;
  }

  }

  if ($_POST['actionn'] == 'reply') {

    $_SESSION["one"]=$id;
    //$_SESSION["two"]=$id2;
   // $_SESSION["three"]=$id3;
    echo $id3;
    
    header("Location:reply.php"); 

}

}

mysqli_close($con);


?>
  </div>
 



</body>

</html>