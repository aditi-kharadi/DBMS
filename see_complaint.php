<?php

session_start();

$connection = mysqli_connect('localhost','root','','student') or die("not connected");

if(isset($_POST['register']) && !empty($_POST["nm"]) && !empty($_POST["ps"]))
{
  //echo "Enteeeered";
  
  $nme = $_POST['nm'];
  $pss = $_POST['ps'];

  $result = mysqli_query($connection,"SELECT * FROM account WHERE user_name='".$nme. "'" );
  $row = mysqli_fetch_array($result);
  if($pss==$row['paswrd'])
  {
    $_SESSION["user"] = $nme;
    header("Location:button.php");
    exit();
  }
  else
  {
    echo '<script language="javascript">';
echo 'alert("Incorrect username or password")';
echo '</script>';
  }

}

if(isset($_POST['create']) && $_POST["psw1"]==$_POST["psw2"])
{
  $unm = $_POST['unm'];
  $rm = $_POST['rm'];
  $psw1 = $_POST['psw1'];
  $psw2 = $_POST['psw2'];

  $result = "INSERT INTO account(user_name,room_no,paswrd)
  VALUES ('$unm','$rm','$psw1')";
 
  $output = mysqli_query($connection,$result);
 if($output)
 {
    echo"<h3>Account Created Successfully !!!</h3>";
 }


}


mysqli_close($connection);

?>

<!DOCTYPE html>
<html>
<style>
.modal-header {
  padding: 2px 16px;
}
body {font-family: Arial, Helvetica, sans-serif;}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
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
  width: 45%;
  height: auto;
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
  -webkit-animation-name: animatetop;
  -webkit-animation-duration: 0.4s;
  animation-name: animatetop;
  animation-duration: 0.4s;
  margin-top: 20px;
}

/* Add Animation */
@-webkit-keyframes animatetop {
  from {top:-300px; opacity:0} 
  to {top:0; opacity:1}
}

@keyframes animatetop {
  from {top:-300px; opacity:0}
  to {top:0; opacity:1}
}


.close {
  color: white;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}

.modal-body {
   margin-top: 20px;
   margin-bottom: 50px;
   margin-left: 10px;
   margin-right: 10px;
   padding: 2px 16px;
   height: 100%;
}


#container{
  display: flex;
  flex-direction: row;
  width: 100%;
}

.container1{
   border: 1px solid #a5a5a5;
   width: 80%;
   margin-left: auto;
   margin-right: auto;
}

#spacer{
  flex: 1;
}

#login{
  float: right;
  margin: 50px;
}

input[type=text], select ,textarea{
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}


.card {
  /* Add shadows to create the "card" effect */
  box-shadow: 0 4px 8px 0 rgba(255,255,255,0.8);
  transition: 0.2s;

  margin-left: 400px;
   margin-right: 400px;
   margin-top: 20px;
  border-radius: 5px;
  background-color: rgba(0, 0, 0, 0.4);
  padding: 20px;

}

/* On mouse-over, add a deeper shadow */
.card:hover {
  box-shadow: 0 8px 16px 0 rgba(255,255,255,0.8);
}

/* Add some padding inside the card container */
.container {
  padding: 2px 16px;
}

body, html {
  height: 100%;
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

.image{
    height: 30%;
    display: block;
  margin-left: auto;
  margin-right: auto;
  width: 50%;
}
.required{
  color: white;
}

.form{
   width: 120px;
   height: 40px;
   margin-bottom: 10px;
}
input[type=password]{
    width: 535px;
    border-radius: 7px;
}
input[type=text]{
    width: 535px;
    border-radius: 5px;
}
.form2{
    padding: 50px;
}
</style>

<body class="bg">


<button id="myBtn">CREATE ACCOUNT</button>

<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
    <div>
    <center>
    <h2>CREATE ACCOUNT</h2>
    </center>
  <form class="form2" action="see_complaint.php" method="post" >
    <label class="required">User name</label><br>
    <input class="form" type="text" name="unm" placeholder="User ID..."><br>

    <label class="required">Room no.</label><br>
    <input class="form" type="text" name="rm" placeholder="Room no..."><br>

    <label class="required">Password</label><br>
    <input class="form" type="password" name="psw1" placeholder="Your Password..."><br>

    <label class="required">Confirm password</label><br>

    <input class="form" type="password" name="psw2" placeholder="Confirm Password..." ><br>
    <br>
    <center>
      <button type="register" name="create">CREATE ACCOUNT</button>
    </center>
  </form>
</div>
  </div>

</div>

<center>
<h1>LOGIN</h1>
</center>

<div class="card">
  <form action="see_complaint.php" method="post" >
    <label class="required">User Name</label><br>
    <input class="form" type="text" name="nm" placeholder="User ID..."><br>

    <label class="required">Password</label><br>

    <input class="form" type="password" name="ps" placeholder="Your Password..."><br>
    <br>
    <center>
      <button type="register" name="register">CONTINUE</button>
    </center>
  </form>
</div>

</body>
<script>

// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on the button, open the modal
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}

  </script>

</html>