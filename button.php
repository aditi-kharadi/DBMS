<!DOCTYPE html>
<style>
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
</style>

<?php

if(isset($_POST['logout']))
{
   // echo "jhdf";
    session_unset();
    
    header("Location:demo.php");
}

if(isset($_POST['complaint']))
{
   // echo "jhdf";
    //session_unset();
    
    header("Location:see_complaint2.php");
}

if(isset($_POST['complaint2']))
{
   // echo "jhdf";
    //session_unset();
    
    header("Location:complaint.php");
}

?>

<html>

<body class="bg">
  <form action="button.php" method="post">
    <button name="complaint" style="float:right" onclick="window.location.href = 'see_complaint2.php';">Look for your complain Complaint</button>
    <button name="complaint2" style="float:right" onclick="window.location.href = 'complaint.php';">Register Complaint</button>
    <button name="logout" style="float:right" ">Logout</button>
  </form>
</body>

</html>
