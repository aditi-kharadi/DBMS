<?php
session_start();
$var = $_SESSION["id3"];
echo $var;



$conn = mysqli_connect('localhost','root','','student') or die("not connected");


$result = mysqli_query($conn,"SELECT * FROM staff WHERE id=' ". $var. " '");
$row = mysqli_fetch_array($result);

   
    $name = $row['s_name'];
    $desc = $row['assigned_as'];
    $qua = $row['qualification'];
    $mob = $row['mobile'];
    $level = $row['s_level'];



if(isset($_POST['done']))
{

    //echo"Entered";
    
    $name = $_POST['name'];
    $desc = $_POST['desc'];
    $qua = $_POST['qua'];
    $mob = $_POST['mob'];
    $level = $_POST['level'];
 
 
   $sql = "UPDATE staff SET s_name=' ". $name. " ', assigned_as=' ". $desc. " ', qualification=' ". $qua. " ', mobile=' ". $mob. " ', s_level=' ". $level. " '
   WHERE id=' ". $var. " '";

   if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
    header("Location:staff.php");
   } else {
    echo "  Error updating record: " . $conn->error;
    }


}
mysqli_close($conn);



?>

<!DOCTYPE html>
<html>

<style>

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
  border-radius: 5px;
  background-color: rgba(0,0,0,0.4);
  padding: 20px;
}
.bg {
  background-image: url("background2.jpg");

  /* Full height */
  height: 100%;

  /* Center and scale the image nicely */
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  background-attachment: fixed;
}
.image{
   width: 150px;
   height: 150px;
}
</style>

  <body class="bg">

  <center>
<h2>MAKE CHANGES</h2>
</center>
      
<div>

  <form action="change3.php" method="post" >
<?php
echo"<img class='image' src='image/" . $row['photo'] ."'>";
?>

    <label for="fname">Staff Name</label><br>
    <input type="text" id="name" name="name" value="<?php echo $name ?>"><br>

    <label for="lname">Designation</label><br>
    <input type="text" id="des" name="desc" value="<?php echo $desc ?>"><br>

    <label for="course">Qualification</label><br>
    <input type="text" name="qua" value="<?php echo $qua ?>"><br>

    <label for="course">Contact no.</label><br>
    <input type="text" name="mob" value="<?php echo $mob ?>"><br>

    <label for="course">level</label><br>
    <input type="text" name="level" value="<?php echo $level ?>"><br>

<center>
    <button type="add" name="done" >Done</button>
</center>
  </form>

</div>





</body>

</html>