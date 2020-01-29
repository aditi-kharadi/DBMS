<?php
session_start();
$var = $_SESSION["id2"];
//echo $var;



$conn = mysqli_connect('localhost','root','','student') or die("not connected");


$result = mysqli_query($conn,"SELECT * FROM student WHERE id=' ". $var. " '");
$row = mysqli_fetch_array($result);

$one=$row['f_name'];
$two=$row['l_name'];
$three=$row['course'];
$four=$row['mobile'];
$five=$row['father_name'];
$six=$row['father_mobile'];
$seven=$row['room'];
$eight=$row['hostel'];
$nine=$row['s_address'];
$ten=$row['lg_address'];




if(isset($_POST['change']))
{

    //echo"Entered";

    echo $fname = $_POST['fname'];
    echo $lname = $_POST['lname'];
    echo $crs = $_POST['crs'];
    $mob = $_POST['mob'];
    $father_nm = $_POST['father_nm'];
    $father_mob = $_POST['father_mob'];
    $room = $_POST['room'];
    $hostel = $_POST['hostel'];
    $address = $_POST['address'];
    $lg_address = $_POST['lg_address'];

    $result = mysqli_query($conn,"SELECT * FROM student WHERE room=' ". $room. " '");
    $num_rows = mysqli_num_rows($result);
if($room==$row['room'] || $num_rows<2)
{    

   $sql = "UPDATE student SET f_name=' ". $fname. " ', l_name=' ". $lname. " ', course=' ". $crs. " ', mobile=' ". $mob. " ', father_name=' ". $father_nm. " ',
   father_mobile=' ". $father_mob. " ', room=' ". $room. " ', hostel=' ". $hostel. " ', s_address=' ". $address. " ',lg_address=' ". $lg_address. " '
   WHERE id=' ". $var. " '";

   if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
    header("Location:image_map.php");
   } else {
    echo "  Error updating record: " . $conn->error;
    }
}
else{
  echo"This room is full";
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
  <form action="change2.php" method="post" enctype="multipart/form-data">
<center>
  <?php
echo"<img class='image' src='image/" . $row['photo'] ."'>";
?>
</center>
<br>

    <label for="fname">First Name</label><br>
    <input type="text" id="fname" name="fname" value="<?php echo $one ?>""><br>

    <label for="lname">Last Name</label><br>
    <input type="text" id="lname" name="lname" value="<?php echo $two ?>"><br>

    <label for="course">Course</label><br>
    <input type="text" name="crs" value="<?php echo $three ?>"><br>

    <label for="course">Contact no.</label><br>
    <input type="text" name="mob" value="<?php echo $four ?>"><br>

    <label for="course">Fathers name</label><br>
    <input type="text" name="father_nm" value="<?php echo $five ?>"><br>

    <label for="course">Fathers contact no.</label><br>
    <input type="text" name="father_mob" value="<?php echo $six ?>"><br>

    <label for="course">Room no.</label><br>
    <input type="text" name="room" value="<?php echo $seven ?>"><br>

    <label for="course">Hostel</label><br>
    <input type="text" name="hostel" value="<?php echo $eight ?>"><br>

    <label for="course">Permanent Address</label><br>
    <input type="text" name="address" value="<?php echo $nine ?>"><br>
    

   <label for="course">Local Guardians<br>Address(if there)</label><br>
    <input type="text" name="lg_address" value="<?php echo $ten ?>"><br>
<center>
    <button type="allocate" name="change">change</button>
</center>
  </form>
</div>





</body>

</html>