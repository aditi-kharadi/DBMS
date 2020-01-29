<?php
$msg="";

$connection = mysqli_connect('localhost','root','','student') or die("not connected");
if(isset($_POST['allocate']) && !empty($_POST["fname"]) && !empty($_POST["lname"])
&& !empty($_POST["crs"]) && !empty($_POST["mob"]) && !empty($_POST["father_nm"])
&& !empty($_POST["father_mob"]) && !empty($_POST["room"]) && !empty($_POST["hostel"]) && !empty($_POST["address"]))
{
   //echo"okkkk";
   $fname = $_POST['fname'];
   $lname = $_POST['lname'];
   $crs = $_POST['crs'];
   $mob = $_POST['mob'];
   $father_nm = $_POST['father_nm'];
   $father_mob = $_POST['father_mob'];
   $room = $_POST['room'];
   $hostel = $_POST['hostel'];
   $address = $_POST['address'];
   $lg_address = $_POST['lg_address'];
   $date = date("Y/m/d");


   $result = mysqli_query($connection,"SELECT * FROM student WHERE room=' ". $room. " '");
$num_rows = mysqli_num_rows($result);
//echo $num_rows;

$target="image/".basename($_FILES['image']['name']);
$image=$_FILES['image']['name'];

if($num_rows<2)
{
    $result = "INSERT INTO student(photo,f_name,l_name,course,mobile,father_name,father_mobile,room,hostel,s_address,lg_address,datee)
    VALUES ('$image','$fname','$lname','$crs','$mob','$father_nm','$father_mob','$room','$hostel','$address','$lg_address','$date')";
   
    $output = mysqli_query($connection,$result);
   if($output)
   {
      echo"<h3>Room Allocated Successfully !!!</h3>";
   }
}
else{
   echo"This room is full";
}
}
else{
   echo"FILL COMPLETE DETAILS";
}

mysqli_close($connection);
?>


<!DOCTYPE html>
<html>

<head>
   <title>Allocate Rooms</title>
</head>
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
  background-color: rgba(0,0,0,0.2);
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

label{
   color: black;
}

</style>
<body class="bg">

<center>
<h2>ALLOCATE ROOM</h2>
</center>


   <div>
  <form action="allocate.php" method="post" enctype="multipart/form-data">

    <label for="fname">First Name</label><br>
    <input type="text" name="fname"><br>

    <label for="lname">Last Name</label><br>
    <input type="text" name="lname"><br>

    <label for="course">Course</label><br>
    <input type="text" name="crs"><br>

    <label for="course">Contact no.</label><br>
    <input type="text" name="mob"><br>

    <label for="course">Fathers name</label><br>
    <input type="text" name="father_nm"><br>

    <label for="course">Fathers contact no.</label><br>
    <input type="text" name="father_mob"><br>

    <label for="course">Room no.</label><br>
    <input type="text" name="room"><br>

    <label for="course">Hostel</label><br>
    <input type="text" name="hostel"><br>

    <label for="course">Permanent Address</label><br>
    <input type="text" name="address"><br>
    

   <label for="course">Local Guardians<br>Address(if there)</label><br>
    <input type="text" name="lg_address"><br>


    <input type="hidden" name="size" value="1000000">
    
    <input type="file" name="image">
    





    <button type="allocate" name="allocate">Allocate</button>
  </form>
</div>



</body>

</html>
