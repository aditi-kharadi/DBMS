<?php

session_start();
$var = $_SESSION["user"];
//$var2 = $_SESSION["password"];
$var3 = "not worked upon";
$connection = mysqli_connect('localhost','root','','student') or die("not connected");

if(isset($_POST['register']) && !empty($_POST["subject"]) && !empty($_POST["content"]))
{
  //echo "Enteeeered";
  
  $subject = $_POST['subject'];
  $content = $_POST['content'];  
  $dt = date("Y/m/d");
  $dt2 = "Not replied yet";
   $result = "INSERT INTO complaint(date1,heading,content,user_name,result,date2) VALUES ('$dt','$subject','$content','$var','$var3','$dt2')" ;
  
   $output = mysqli_query($connection,$result);
  if($output)
  {
     echo"<h3>Complaint sent!</h3>";
  }
mysqli_close($connection);

}

?>

<!DOCTYPE html>
<html>
<style>


input[type=text], select ,textarea{
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
  box-shadow: 0 4px 8px 0 rgba(255,255,255,0.8);
  transition: 0.2s;
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
</style>

<body class="bg">

 <img src="complain3.png" class="image"/> 
<div class="card">
  <form action="complaint.php" method="post" >
    <label class="required">Subject</label><br>
    <input type="text" name="subject" placeholder="Subject..."><br>

    <label class="required">Complaint</label><br>

    <input type="text" name="content" placeholder="Your Complaint..." rows="4"><br>
    <br>
    <center>
      <button type="register" name="register">Send Complaint</button>
    </center>
  </form>
</div>

</body>

</html>