

<!DOCTYPE html>
<html>

<body>

<?php

$connection = mysqli_connect('localhost','root','','student') or die("not connected");
    
    
    $result = mysqli_query($connection,"SELECT * FROM available " );

echo "<table align='center' id='thetable' overflow='scroll'>
<thead>
<tr>
    <th>Rooms</th>
</tr>
<thead>";
while($row = mysqli_fetch_array($result))
{
echo "<tr>
<td>" . $row['room_no'] . "</td>
</tr>";
}
echo "</table>";


mysqli_close($connection);

?>

</body>
</html>