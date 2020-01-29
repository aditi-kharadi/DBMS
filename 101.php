<?php

session_start();

$var = $_GET['value_key']; //some_value
//echo $var;

$con = mysqli_connect('localhost','root','','student') or die("not connected");


$result = mysqli_query($con,"SELECT * FROM student WHERE room=' ". $var. " '");
$row1 = mysqli_fetch_array($result);
$idd=$row1['id'];

$i1=$row1['id'];
$pic1=$row1['photo'];
$nm1=$row1['f_name'];
$nme1=$row1['l_name'];
$crs1=$row1['course'];
$mb1=$row1['mobile'];
$fn1=$row1['father_name'];
$fc1=$row1['father_mobile'];
$r1=$row1['room'];
$h1=$row1['hostel'];
$a1=$row1['s_address'];
$la1=$row1['lg_address'];
$d1=$row1['datee'];
//echo $row['room'];
$_SESSION["id1"] = $idd;
echo"<img class='image' src='image/" . $row1['photo'] ."'>";
echo "<table align='center' cellpadding='100'>
<tr>
<td>

<table cellpadding='5'>
<tr>
<th>ID : </th>
<td>" . $row1['id'] . "</td>
</tr>
<tr>
<th>Name : </th>
<td>" . $row1['f_name'] . " " . $row1['l_name'] .  "</td>
</tr>
<tr>
<th>Course : </th>
<td>" . $row1['course'] . "</td>
</tr>
<tr>
<th>Mobile : </th>
<td>" . $row1['mobile'] . "</td>
</tr>
<tr>
<th>Fathers name : </th>
<td>" . $row1['father_name'] . "</td>
</tr>
<tr>
<th>Fathers mobile : </th>
<td>" . $row1['father_mobile'] . "</td>
</tr>
<tr>
<th>Room No : </th>
<td>" . $row1['room'] . "</td>
</tr>
<tr>
<th>Hostel : </th>
<td>" . $row1['hostel'] . "</td>
</tr>
<tr>
<th>Address : </th>
<td>" . $row1['s_address'] . "</td>
</tr>
<tr>
<th>Local Guardians<br>Address : </th>
<td>" . $row1['lg_address'] . "</td>
</tr>
<tr>
<th>Date : </th>
<td>" . $row1['datee'] . "</td>
</tr>
<tr>
</table>

</td>";

$result = mysqli_query($con,"SELECT * FROM student WHERE room = ' ". $var. " ' AND id !=' ". $idd. " '");
$row = mysqli_fetch_array($result);
$_SESSION["id2"] = $row['id'];

$i12=$row['id'];
$pic2=$row['photo'];
$nm2=$row['f_name'];
$nme2=$row['l_name'];
$crs2=$row['course'];
$mb2=$row['mobile'];
$fn2=$row['father_name'];
$fc2=$row['father_mobile'];
$r2=$row['room'];
$h2=$row['hostel'];
$a2=$row['s_address'];
$la2=$row['lg_address'];
$d2=$row['datee'];

echo"<img class='image' src='image/" . $row['photo'] ."'>";
echo"
<td>

<table cellpadding='5'>
<tr>
<th>ID : </th>
<td>" . $row['id'] . "</td>
</tr>
<tr>
<th>Name : </th>
<td>" . $row['f_name'] . " " . $row['l_name'] .  "</td>
</tr>
<tr>
<th>Course : </th>
<td>" . $row['course'] . "</td>
</tr>
<tr>
<th>Mobile : </th>
<td>" . $row['mobile'] . "</td>
</tr>
<tr>
<th>Fathers name : </th>
<td>" . $row['father_name'] . "</td>
</tr>
<tr>
<th>Fathers mobile : </th>
<td>" . $row['father_mobile'] . "</td>
</tr>
<tr>
<th>Room No : </th>
<td>" . $row['room'] . "</td>
</tr>
<tr>
<th>Hostel : </th>
<td>" . $row['hostel'] . "</td>
</tr>
<tr>
<th>Address : </th>
<td>" . $row['s_address'] . "</td>
</tr>
<tr>
<th>Local Guardians<br>Address : </th>
<td>" . $row['lg_address'] . "</td>
</tr>
<tr>
<th>Date : </th>
<td>" . $row['datee'] . "</td>
</tr>
<tr>
</table>
</td>
</tr>


</table>";




mysqli_close($con);



?>


<!DOCTYPE html>
<html>

<head>
   <title>Students</title>
</head>
<style>

.b1 
{
    margin-left: 400px;
}

.b2 
{
    margin-left: 450px;
}

.b3 
{
    margin-left: 390px;
}

.b4 
{
    margin-left: 433px;
}
.image{
    height: 120px;
    width: 120px;
    margin-left: 360px;
    margin-top: 20px;
}

</style>


<body>


  <button class="b1" name="button1" onclick="window.location.href = 'change.php';">change</button>
  
  <button class="b2" name="button2" onclick="window.location.href = 'change2.php';">change</button>

  <br>
  <br>
  <form action="" method="post">
    <button class="b3" name="delete1" >Deallocate</button>
    <button class="b4" name="delete2" >Deallocate</button>
  </form>
</body>


<?php


$var = $_SESSION["id1"];
$var2 = $_SESSION["id2"];

$con = mysqli_connect('localhost','root','','student') or die("not connected");

if(isset($_POST['delete1']))
{

    $date1 = date("Y/m/d");

    $connection = mysqli_connect('localhost','root','','student') or die("not connected");

    $result = "INSERT INTO alumni(id,photo,f_name,l_name,course,mobile,father_name,father_mobile,room,hostel,s_address,lg_address,date_joining,date_leaving)
    VALUES ('$i1','$pic1','$nm1','$nme1','$crs1','$mb1','$fn1','$fc1','$r1','$h1','$a1','$la1','$d1','$date1')";
    
    $output = mysqli_query($connection,$result);
    
    mysqli_close($connection);




    $sql = "DELETE FROM student WHERE id=' ". $var. " '";
if ($con->query($sql) === TRUE) {
    //echo "Record deleted successfully";
    header("Location:image_map.php");
} else {
    echo "Error deleting record: " . $conn->error;
}
}

if(isset($_POST['delete2']))
{


    $date2 = date("Y/m/d");

    $connection = mysqli_connect('localhost','root','','student') or die("not connected");

    $result = "INSERT INTO alumni(id,photo,f_name,l_name,course,mobile,father_name,father_mobile,room,hostel,s_address,lg_address,date_joining,date_leaving)
    VALUES ('$i2','$pic2','$nm2','$nme2','$crs2','$mb2','$fn2','$fc2','$r2','$h2','$a2','$la2','$d2','$date2')";
    
    $output = mysqli_query($connection,$result);
    
    mysqli_close($connection);




    $sql = "DELETE FROM student WHERE id=' ". $var2. " '";
if ($con->query($sql) === TRUE) {
  //  echo "Record deleted successfully";
    header("Location:image_map.php");
} else {
    echo "Error deleting record: " . $conn->error;
}
}

mysqli_close($con);

?>

</html>