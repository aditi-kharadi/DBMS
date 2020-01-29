<?php

if(isset($_POST['log']))
{
  session_unset();
  header("Location:demo.php");
}

?>

<!DOCTYPE html>
<html>
  <head>
    <title>Home Page</title>
   <link rel="stylesheet" href="styles.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
   
  </head>
     
  <style>
      a:link {
          margin-top: 50px;
        margin-left: 10px;
       
        background-color: transparent;
  font-size: 30px;
  text-decoration: none;
  font-style: oblique;
  font-weight: bold;
}
a:visited {
    color: black;
  font-size: 30px;
  background-color: transparent;
  text-decoration: none;
}
a:hover {
  color: black;
  background-color: transparent;
  text-decoration: underline;
}

a:active {
  color: blue;
  background-color: transparent;
}
</style>



  <body background="#f6e3fe">
    
  <div class="slideshow-container">



<div class="mySlides fade">
  <div class="numbertext">1 / 3</div>
  <img src="bg4.jpg" style="width:1500px;height:350px">
</div>

<div class="mySlides fade">
  <div class="numbertext">2 / 3</div>
  <img src="bg5.jpg" style="width:1500px;height:350px">
</div>

<div class="mySlides fade">
  <div class="numbertext">3 / 3</div>
  <img src="bg6.jpg" style="width:1500px;height:350px">
</div>

</div>
<br>

<div style="text-align:center">
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span> 
</div>

<form action="project.php" method="post">
  <button name="log">LOGOUT</button>
</form>

<div class="row">
  <div class="column" style="background-color:rgba(254,255,149,0.4)">
    <div class="text">
      <a href="allocate.php" target="_blank" >Allocate Rooms</a> 
      <p class="desc">Allocate rooms to new entries OR <br>deallocate the older ones</p>
    </div>
    <div class="icon">
      <i class="fa fa-bed"></i>
    </div>
  </div>
  <div class="column" style="background-color:rgba(184,255,145,0.4);">
    <div class="text">
    <a href="staff.php" target="_blank" >Warden & Staffs</a>
      <p class="desc">Get details about the warden(s) <br>& Staffs working in the hostel</p>
    </div>
    <div class="icon">
      <i class="fa fa-group"></i>
    </div>
    
  </div>
</div>

<div class="row">
  <div class="column" style="background-color:rgba(255,176,148,0.4);">
     <div class="text">
     <a href="image_map.php" target="_parent" >Room details</a>
      <p class="desc">Get all details about the Room &<br>Students living in any selected rooms</p>
    </div>
    <div class="icon">
      <i class="fa fa-database"></i>
    </div>
    
  </div>

  <div class="column" style="background-color:rgba(151,255,235,0.4);">
    <div class="text">
    <a href="notice.php" target="_parent" >Add notice</a>
      <p class="desc">add any notice for students,<br>which would be shown to the<br>in the student's home page<p>
    </div>
    <div class="icon">
      <i class="fa fa-edit"></i>
    </div>
    
  </div>

  
</div>


<div class="row">
  <div class="column" style="background-color:rgba(151,169,255,0.4);">
     <div class="text">
     <a href="history.php" target="_parent" >History</a>
      <p class="desc">Histoey of students going in and out<br> along with time<p>
    </div>
    <div class="icon">
      <i class="fa fa-history"></i>
    </div>
    
  </div>
  <div class="column" style="background-color:rgba(255,155,212,0.4);">
    <div class="text">
    <a href="complaint2.php" target="_parent" >Issues</a>
      <p class="desc">It shows issues submitted by students<p>
    </div>
    <div class="icon">
      <i class="fa fa-shield"></i>
    </div>
    
  </div>
</div>


 </body>
 <footer>
    <script src = "scripts.js"></script>
 </footer>
</html>