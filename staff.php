<!DOCTYPE html>
<html>
<style>

table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 60%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
.image{
  height: 100px;
  width: 100px;
}
</style>

<body>

<center>
<h2>WARDEN & STAFF</h2>
</center>

<button id="staff" style="float:right" onclick="window.location.href = 'add_staff.php';">Add Staff</button>
<?php

$con=mysqli_connect('localhost','root','','student');
// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

//$dt = date("Y/m/d");
$result = mysqli_query($con,"SELECT * FROM staff ORDER BY s_level ASC" );

echo "<table align='center' id='thetable' overflow='scroll'>
<thead>
<tr>
    <th>Image</th>
    <th>Name</th>
    <th>Designation</th>
    <th>Qualification</th>
    <th>Mobile</th>
    <th>Date of joining</th>
    <th>Edit</th>
</tr>
<thead>";
while($row = mysqli_fetch_array($result))
{
echo "<tr>
<td> <img class='image' src='image/" . $row['photo'] ."'></td>
<td>" . $row['s_name'] . "</td>
<td>" . $row['assigned_as'] . "</td>
<td>" . $row['qualification'] . "</td>
<td>" . $row['mobile'] . "</td>
<td>" . $row['s_date'] . "</td>";


?>



    <!-- other cells -->
    <td>
      <form method="post" action="">
        <input type="submit" name="action" value="Edit"/>
        <input type="submit" name="action" value="Delete"/>
        <input type="hidden" name="id" value="<?php echo $row['ID']; ?>"/>
      </form>
    </td>

<?php

echo"</tr>";
}

echo "</table>";



if(isset($_POST['action']) && isset($_POST['id'])) {
    $id=$_POST['id'];
    
    if ($_POST['action'] == 'Delete') {
      echo "Update";
      echo $id;

      $sql = "DELETE FROM staff WHERE id=' ". $id. " '";
      
      if ($con->query($sql) === TRUE) {
          echo "Record deleted successfully";
          header("Location:staff.php");
      } else {
          echo "Error deleting record: " . $con->error;
      }
      
    }
    if ($_POST['action'] == 'Edit') {
        // edit the post with $_POST['id']
        
        echo"Edit";
        echo $id;
        session_start();
        $_SESSION['id3']=$id;
        header("Location:change3.php");
      }
  }



mysqli_close($con);


?>

</body>
</html>