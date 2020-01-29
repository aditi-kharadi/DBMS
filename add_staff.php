<?php
$connection = mysqli_connect('localhost','root','','student') or die("not connected");
if(isset($_POST['add']))
{
//echo"okkkk";
   $name = $_POST['name'];
   $desc = $_POST['desc'];
   $qua = $_POST['qua'];
   $mob = $_POST['mob'];
   $level = $_POST['level'];
   $date = date("Y/m/d");
   

   $target="image/".basename($_FILES['image']['name']);
   $image=$_FILES['image']['name'];

  $result = "INSERT INTO staff(photo,s_name,assigned_as,qualification,mobile,s_level,s_date)
    VALUES ('$image','$name','$desc','$qua','$mob','$level','$date')";
   
    $output = mysqli_query($connection,$result);
   if($output)
   {
      echo"<h3>Successfull !!!</h3>";
      header("Location:staff.php");
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
  background-color: #f2f2f2;
  padding: 20px;
}

</style>
<body>



   <div>
  <form action="add_staff.php" method="post" enctype="multipart/form-data">
    <label for="fname">Staff Name</label><br>
    <input type="text" id="name" name="name" placeholder="Your name.."><br>

    <label for="lname">Designation</label><br>
    <input type="text" id="des" name="desc" placeholder="Your last name.."><br>

    <label for="course">Qualification</label><br>
    <input type="text" name="qua"><br>

    <label for="course">Contact no.</label><br>
    <input type="text" name="mob"><br>

    <label for="course">level</label><br>
    <label>1-Warden , 2-Caretaker , 3-Other</label>
    <input type="text" name="level"><br>

    <input type="hidden" name="size" value="1000000">
    
    <input type="file" name="image">
    <br>

    <button type="add" name="add">Add</button>
  </form>
</div>



</body>

</html>
