<!DOCTYPE html>
<html>

<style>

.form{
   width: 200px;
   height: 30px;
   margin-bottom: 10px;
}

input[type=text], select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

div {
   margin-left: 400px;
   margin-right: 400px;
   margin-top: 50px;
  border-radius: 5px;
  background-color: rgba(0,0,0,0.2);
  padding: 20px;
}


label{
   color: black;
   float: left;
}
.h11{
  margin-top: 60px;
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

<?php

session_start();

$conn = mysqli_connect('localhost','root','','student') or die("not connected");


$id1=$_SESSION["one"];
//$id2=$_SESSION["two"];
//$id3=$_SESSION["three"];


$result = mysqli_query($conn,"SELECT * FROM complaint WHERE c_id='". $id1. "'" );
    $row = mysqli_fetch_array($result);
    $id4=$row['user_name'];
    $id2=$row['heading'];
    $id3=$row['content'];



if(isset($_POST['send']))
{
  $rp=$_POST['reply'];
  $date = date("Y/m/d");
echo $rp;
    $sql = "UPDATE complaint SET result='". $rp. "', date2='". $date. "' WHERE c_id='". $id1. "'";
 
    if ($conn->query($sql) === TRUE) {
     echo "Record updated successfully";
     header("Location:complaint2.php");
    } else {
     echo "  Error updating record: " . $conn->error;
     }
}

mysqli_close($conn);

?>

<body class="bg">

<center>
<h1 class="h11"> SEND REPLY </h1>
</center>
  <div>
<center>
<form class="form2" action="reply.php" method="post" >

    <label class="required">Submitted by:</label><br>
    <input class="form" type="text" value="<?php echo $id4 ?>" readonly><br>

    <label class="required">Subject</label><br>
    <input class="form" type="text" value="<?php echo $id2 ?>" readonly><br>
    
    <label class="required">Issue</label><br>
    <input class="form" type="text" value="<?php echo $id3 ?>" readonly><br>

    <label class="required">Reply</label><br>
    <input class="form" type="text" name="reply" placeholder="Add reply..." autofocus><br>

    <br>
    <center>
      <button type="submit" name="send">SEND REPLY</button>
    </center>
  </form>
</center>
</div>

  </body>
  </html>