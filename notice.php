<?php

$connection = mysqli_connect('localhost','root','','student') or die("not connected");

if(isset($_POST['register']))
{
    $subject = $_POST['subject'];
   $content = $_POST['content'];

   $result = "INSERT INTO notice(heading,content) VALUES ('$subject','$content')";
  
   $output = mysqli_query($connection,$result);
  if($output)
  {
     echo"<h3>Registered.</h3>";
  }
mysqli_close($connection);

}

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
   margin-top: 20px;
  border-radius: 5px;
  background-color: rgba(0, 0, 0, 0.4);
  padding: 20px;
}

.card {
  /* Add shadows to create the "card" effect */
  box-shadow: 0 4px 8px 0  rgba(255,255,255,1);
  transition: 0.2s;
}

/* On mouse-over, add a deeper shadow */
.card:hover {
  box-shadow: 0 8px 16px 0 rgba(255,255,255,1);
}

/* Add some padding inside the card container */
.container {
  padding: 2px 16px;
}

body, html {
  height: 100%;
}




.bg {
  /* The image used */
  background-image: url("background2.jpg");

/* Full height */
height: 70%;

/* Center and scale the image nicely */
background-position: center;
background-repeat: no-repeat;
background-size: cover;
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
</style>

<body class="bg">

<img src="notice.jpg" class="image"/>

<div class="card">
  <form action="notice.php" method="post" >
    <label class="required">Subject</label><br>
    <input type="text" name="subject" placeholder="Subject..."><br>

    <label class="required">Notice</label><br>
    <input type="text" name="content" placeholder="Information..."><br>
    <br>
    <center>
    <button type="register" name="register">Add Notice</button>
    </center>
  </form>
</div>

</body>

</html>