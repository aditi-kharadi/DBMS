<?php

$connection = mysqli_connect('localhost','root','','student') or die("not connected");

if(isset($_POST['submit']))
{
echo"okkkk";
   $name = $_POST['name'];
   $room = $_POST['room'];
   $whr = $_POST['whr'];
   $date = date("Y/m/d");
   $time = date('Y-d-m H:i:s',time());
   if($name=='')
   {
     echo"name can't be empty";
   }
   elseif ($room=='') {
    echo"<room-no cant be empty";
   }
   elseif ($whr=='') {
    echo"<place can't be empty";
   }
   else
   {
    $result = "INSERT INTO history(namee,room_no,place,datee,time_in) VALUES ('$name','$room','$whr','$date','$time')";
   
    $output = mysqli_query($connection,$result);
    if($output)
    {
      echo"<h3>Room Allocated Successfully !!!</h3>";
    }
   }
}
?>




<!DOCTYPE html>
<html>
<head>
  <title>Hostel Room Management System</title>
  <link rel="stylesheet" href="login_css.css">
</head>

<style>
  table{
   border: 1px solid #000000;
   text-align: center;
  }

tr{
  border: 1px solid #000000;
  margin-left: 20px;
  }
th{
   margin-left: 20px;
  }
</style>

<body class="bg" >

  <img src="C:\Users\HP\Desktop\csjmu.jpg" class="image"/>
  <div>
    
    <h1>HOSTEL ROOM MANAGEMENT SYSTEM</h1>
    
    <button id="lg" style="float:right">login</button>

    <br>
  </div>
  <br>
<div class="container1"> 
  <h5>Going Out:</h5>
  <form class="form-inline" action="login.php" id="form" method="post"> 
  
    <label for="name">Name:</label>
    <input type="name" class="form-control1" id="name" name="name"> 
    
    <label for="room">Room. no.:</label> 
    <input type="number" class="form-control1" id="room" name="room"> 
    
    <label for="whr">Where:</label> 
    <input type="text" class="form-control1" id="whr" name="whr"> 
    
  <center>
    <button id="submit" name="submit" onclick="submit()" align="center">SUBMIT</button>      
  </center>
  </form> 
</div> 


  <table class="tb1" id="table">
  <tr>
    <th>Name</th>
    <th>Room No.</th>
    <th>Time OUT</th>
    <th>Where</th>
    <th>Time IN</th>
  </tr>


<?php


$con=mysqli_connect('localhost','root','','student');
// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$result = mysqli_query($con,"SELECT * FROM history" );

echo "<table border='30'>
<tr>
    <th>Date</th>
    <th>Name</th>
    <th>Room No.</th>
    <th>Time OUT</th>
    <th>Where</th>
    <th>Time IN</th>
</tr>";

while($row = mysqli_fetch_array($result))
{
echo "<tr>";
echo "<td>" . $row['datee'] . "</td>";
echo "<td>" . $row['namee'] . "</td>";
echo "<td>" . $row['room_no'] . "</td>";
echo "<td>" . $row['time_in'] . "</td>";
echo "<td>" . $row['place'] . "</td>";
echo "<td>" . $row['time-out'] . "</td>";
echo "</tr>";
}
echo "</table>";

mysqli_close($con);
?>





  
 <div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
  <div class="modal-header">
      <span class="close">&times;</span>
  </div>
    <div class="modal-body">
    
  <div id="container">


  <h1 class="h1"  align="center">LOGIN</h1>
  
 <form action="" class="form"> 
        <div class="form-group"> 
            <label id="lg" for="id1">User Name:</label> 
            <br>
            <input class="form-control2" type="text" id="id1" placeholder="Enter your User Name"> 
        </div> 
        <div class="form-group"> 
            <label id="lg" for="id2" >Password:</label> 
            <br>
            <input class="form-control2" type="password" id="id2" placeholder="Enter your password"> 
        </div> 
        
            <button type="button" class="btn-login" onclick="window.location.href = 'project.html';">Login</button> 
       
    </form> 
  
  </div>
     </div>
  </div>

</div>

  
</body>
<footer>
    <script type="text/javascript" src = "login_js.css"></script>
 </footer>
</html>
