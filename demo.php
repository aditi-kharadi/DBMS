

<?php

$connection = mysqli_connect('localhost','root','','student') or die("not connected");

if(isset($_POST['submit']) && !empty($_POST["name"]) && !empty($_POST["room"]) && !empty($_POST["whr"]))
{
  date_default_timezone_set('Asia/Kolkata');
   $name = $_POST['name'];
   $room = $_POST['room'];
   $whr = $_POST['whr'];
   $date = date("Y/m/d");
   //$time = date('Y-d-m H:i:s',time());
   $time = date("h:i:sa");

 
    $result = "INSERT INTO history(namee,room_no,place,datee,time_out) VALUES ('$name','$room','$whr','$date','$time')";
   
    $output = mysqli_query($connection,$result);
  /*  if($output)
    {
      echo"<h3>Room Allocated Successfully !!!</h3>";
    } */
}
else if(isset($_POST['submit']) && (empty($_POST["name"]) || empty($_POST["room"]) || empty($_POST["whr"]))){
  echo '<script language="javascript">';
  echo 'alert("Fill complete details")';
  echo '</script>';
}

?>


<?php
$conn = mysqli_connect('localhost','root','','project') or die("not connected");

if(isset($_POST['login'])&& !empty($_POST["abc"]) && !empty($_POST["def"]))
{
  
  $nme = $_POST['abc'];
  $pss = $_POST['def'];
  $result = mysqli_query($conn,"SELECT * FROM abcde WHERE user_name='".$nme. "'" );
  $row = mysqli_fetch_array($result);
  if($pss==$row['paswrd'])
  {
    header("Location:project.php");
    exit();
  }
  else
  {
    echo '<script language="javascript">';
echo 'alert("Incorrect username or password")';
echo '</script>';
  }
  


  mysqli_close($conn);
}
?>


<!DOCTYPE html>
<html>
<head>
  <title>Hostel Room Management System</title>
  <link rel="stylesheet" href="login_css.css">
</head>
<style>

.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 20px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
  
}

/* Modal Content */
.modal-content {
  position: relative;
  background-color: rgba(255,148,131,1);
  margin: auto;
  padding: 0;
  border: 5px solid #666666;
  width: 40%;
  height: auto;
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
  -webkit-animation-name: animatetop;
  -webkit-animation-duration: 0.4s;
  animation-name: animatetop;
  animation-duration: 0.4s;
  margin-top: 100px;
}


.split {
  height: 70%;
  position: fixed;
  z-index: 20;
  top: 0;
  padding-top: 20px;
}

/* Control the left side */
.left {
  left: 0;
  width: 20%;
  height: 100%;
  margin-top: 158px;
  overflow: scroll;

  background-image: url("canvas2.jpg");

/* Full height */
height: 75%;

/* Center and scale the image nicely */
background-position: center;
background-repeat: no-repeat;
background-size: cover;
}

/* Control the right side */
.right {
  right: 0;
  width: 80%;
  height: 100%;
  margin-top: 165px;
  overflow: auto;
}

/* If you want the content centered horizontally and vertically */
.centered {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  text-align: center;
}
.margin{
  margin: 1px;
}
.card {
  /* Add shadows to create the "card" effect */
  box-shadow: 0 4px 8px 0  rgba(0,0,0,1);
  transition: 0.2s;
  border: 5px;
  padding: 5px;
  margin: 10px;
  margin-bottom: 20px;
  background-color: #D2B48C;
}

/* On mouse-over, add a deeper shadow */
.card:hover {
  box-shadow: 0 8px 16px 0 rgba(0,0,0,1);
}

/* Add some padding inside the card container */
.container {
  padding: 2px 16px;
}


.border{
  border: 5px;
  padding: 5px;
  margin: 10px;
  margin-bottom: 20px;
  background-color: #D2B48C;
}
/* Style the image inside the centered container, if needed */
.centered img {
  width: 150px;
  border-radius: 50%;
}
.time{
  background-color: white;
  border: none;
  color: black;
}

#table-wrapper {
  position:relative;
}
#table-scroll {
  height:200px;
  overflow:auto;  
  margin-top:20px;
}
#table-wrapper table {
  width:65%;

}
#table-wrapper table * {
  color:black;
}
#table-wrapper table thead th .text {
  position:absolute;   
  top:-20px;
  z-index:2;
  height:20px;
  width:15%;
  border:10px solid red;
}
tr:nth-child(even) {
  background-color: rgba(210,180,140,0.6);
}

.container1{
  box-shadow: 0 4px 8px 0  rgba(0,0,0,0.4);
  transition: 0.2s;
  background: rgba(210,180,140,0.8);
  border-style: solid;
  border-color: black;
}
.container1:hover {
  box-shadow: 0 8px 16px 0 rgba(0,0,0,0.6);
}
.form{
  margin-left: 180px;
}

</style>
<body class="bg" >

<img src="csjmu.jpg" class="image"/>

<div class="split left">
  <div class="margin">
<?php

$con=mysqli_connect('localhost','root','','student');
// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

//$dt = date("Y/m/d");
$result = mysqli_query($con,"SELECT * FROM notice " );


while($row = mysqli_fetch_array($result))
{
  echo "<div class='card'>";
  echo "<h3>" . $row['heading'] . "</h3>";
  echo "<p>" . $row['content'] . "<p>";
  echo "</div>";
}

mysqli_close($con);
?>
  </div>
</div>





<div class="split right">
<div>
    
    <h1>HOSTEL ROOM MANAGEMENT SYSTEM</h1>
    
    <button id="lg" style="float:right">Login</button>
    <button id="complaint" style="float:right" onclick="window.location.href = 'see_complaint.php';">Register Complaint</button>
    
    <!-- <button onclick="window.location.href = 'complaint.php';">Register Complaint</button> -->

    <br>
  </div>
  <br>
<div class="container1"> 
  <h3>Going Out:</h3>
  <form class="form-inline" action="demo.php" id="form" method="post"> 
  
    <label for="name">Name:</label>
    <input type="name" class="form-control1" id="name" name="name"> 
    
    <label for="room">Room. no.:</label> 
    <input type="number" class="form-control1" id="room" name="room"> 
    
    <label for="whr">Where:</label> 
    <input type="text" class="form-control1" id="whr" name="whr"> 
    
  
  <center>
    
    <button  name="submit" id="submit" onclick="submit()" align="center" border="2">SUBMIT</button>      
  </center>
  </form> 
</div> 



<div id="table-wrapper">
  <div id="table-scroll">

<?php

function fun(){
  echo"Function Called";
}


$con=mysqli_connect('localhost','root','','student');
// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}


date_default_timezone_set('Asia/Kolkata');
$dt = date("Y/m/d");
$result = mysqli_query($con,"SELECT * FROM history WHERE datee='". $dt. "' ORDER BY ID DESC" );

echo "<table align='center' id='thetable' overflow='scroll'>
<thead>
<tr>
    <th>ID</th>
    <th>Date</th>
    <th>Name</th>
    <th>Room No.</th>
    <th>Time OUT</th>
    <th>Where</th>
    <th>Time IN</th>
</tr>
<thead>";

while($row = mysqli_fetch_array($result))
{
echo "<tr>
<td>" . $row['ID'] . "</td>
<td>" . $row['datee'] . "</td>
<td>" . $row['namee'] . "</td>
<td>" . $row['room_no'] . "</td>
<td>" . $row['time_out'] . "</td>
<td>" . $row['place'] . "</td>";





?>



    <!-- other cells -->
    <td>
      <form method="post" action="">
        
        <input class="time" type="submit" name="action" value="<?php echo $row['time_in']; ?>"/>
        <input type="hidden" name="id" value="<?php echo $row['ID']; ?>"/>
      </form>
    </td>

<?php



echo"</tr>";
}
echo "</table>";




if (isset($_POST['action']) && isset($_POST['id'])) 

{
  $id=$_POST['id'];
  //echo $id;

  date_default_timezone_set('Asia/Kolkata');
  $time = date("h:i:sa");

  
   
    $sql = "UPDATE history SET time_in=' ". $time. " ' WHERE ID=' ". $id. " '";
    
    if ($con->query($sql) === TRUE) {
      echo "";
     
     } else {
      echo "  Error updating record: " . $con->error;
      }

}




mysqli_close($con);


?>



</div>
</div>


 <div id="myModal" class="modal">

  
  <div class="modal-content">
  <div class="modal-header">
      <span class="close">&times;</span>
  </div>
    <div class="modal-body">

  <div id="container">


  
 <form action="demo.php" class="form" method="post"> 
 <center>
 <h1 class="h1"  align="center">LOGIN</h1>
        <div class="form-group"> 
        
            <label id="lg" for="id1">User Name:</label> 
            <br>
            <input class="form-control2" type="text" id="id1" placeholder="Enter your User Name" name="abc"> 
        </div> 
        <div class="form-group"> 
            <label id="lg" for="id2" >Password:</label> 
            <br>
            <input class="form-control2" type="password" id="id2" placeholder="Enter your password" name="def"> 
        </div> 
        
            <button  name="login" id="submit" onclick="submit()" align="center" border="2">LOGIN</button> 
  </center>     
    </form> 
  
  </div>
     </div>
  </div>

</div>



</div>


</body>


<footer>
    <script src = "login_js.js"></script>
    
 </footer>
</html>
