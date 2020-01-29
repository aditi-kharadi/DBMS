<!DOCTYPE html>
<html>
<style>

.tb{
  display: table;
  border-collapse: collapse;
  background: rgba(179,255,179,0.6);
  border-color: gray;
}

table, th, td {
  border: 1px solid green;
}
tr:nth-child(even) {
    background-color: rgba(179,255,179,0.6);
    }
.image{
  height: 100px;
  width: 100px;
}
.bg{
    
}
th{
    background: rgba(149,212,149,0.6);
    text: #fefefe;
}

#myInput {
  background-image: url('/css/searchicon.png'); /* Add a search icon to input */
  background-position: 10px 12px; /* Position the search icon */
  background-repeat: no-repeat; /* Do not repeat the icon image */
  width: 100%; /* Full-width */
  font-size: 16px; /* Increase font-size */
  padding: 12px 20px 12px 40px; /* Add some padding */
  border: 1px solid #ddd; /* Add a grey border */
  margin-bottom: 12px; /* Add some space below the input */
}

</style>

<body class="bg">

<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names..">

<?php
echo"
<center>
<h2>HISTORY</h2>
</center>";
$con=mysqli_connect('localhost','root','','student');
// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

//$dt = date("Y/m/d");
$result = mysqli_query($con,"SELECT * FROM history  ORDER BY ID DESC"" );

echo "<table class='tb' align='center'  id='myTable' overflow='scroll'>
<thead>
<tr class='header'>
    
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

<td>" . $row['datee'] . "</td>
<td>" . $row['namee'] . "</td>
<td>" . $row['room_no'] . "</td>
<td>" . $row['time_out'] . "</td>
<td>" . $row['place'] . "</td>
<td>" . $row['time_in'] . "</td>
</tr>";
}
echo "</table>";




if(isset($_POST['hello']))
{
  echo"nevwmaeioxfn";
  echo "<script type=\"text/javascript\"> 
  c(); 
  </script>";
  echo"  hdjadjda";
}
// onclick='c()'
//<p  name='hello' type='text' id='submit' onclick='c()' >

mysqli_close($con);


?>

</body>

<script>


function myFunction() {
  // Declare variables
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}


</script>

</html>