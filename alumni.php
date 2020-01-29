<!DOCTYPE html>
<html>
    <style>

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
</style>

<body class="bg">

<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names..">

<?php
echo"
<center>
<h2>ALUMNI</h2>
</center>";
$con=mysqli_connect('localhost','root','','student');
// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

//$dt = date("Y/m/d");
$result = mysqli_query($con,"SELECT * FROM alumni " );


echo "<table align='center' id='myTable' overflow='scroll' class='tb'>
<thead>
<tr class='header'>
    
    <th>Image</th>
    <th>Name</th>
    <th>Course</th>
    <th>Contact no.</th>
    <th>Fathers name</th>
    <th>Fathers contact no.</th>
    <th>Room</th>
    <th>Hostel</th>
    <th>Address</th>
    <th>Local Address</th>
    <th>Date joining</th>
    <th>Date leaving</th>

</tr>
<thead>";
while($row = mysqli_fetch_array($result))
{
$name=$row['f_name']." ".$row['l_name'];
echo "<tr>
<td> <img class='image' src='image/" . $row['photo'] . "'></td>
<td>" . $name . "</td>
<td>" . $row['course'] . "</td>
<td>" . $row['mobile'] . "</td>
<td>" . $row['father_name'] . "</td>
<td>" . $row['father_mobile'] . "</td>
<td>" . $row['room'] . "</td>
<td>" . $row['hostel'] . "</td>
<td>" . $row['s_address'] . "</td>
<td>" . $row['lg_address'] . "</td>
<td>" . $row['date_joining'] . "</td>
<td>" . $row['date_leaving'] . "</td>
</tr>";
}
echo "</table>";


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
<html>
