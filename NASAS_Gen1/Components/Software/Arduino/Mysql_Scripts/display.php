<?php
$url=$_SERVER['REQUEST_URI'];
header("Refresh: 5; URL=$url"); // Refresh the webpage every 5 seconds
?>

<html>
<head>
<title>National Autonomous Staff Attendance System</title>
<style type="text/css">
.table_titles {
padding-right: 20px;
padding-left: 20px;
color: #000;
}

.table_titles {
color: #FFF;
background-color: #0000FF;
}

table {
border: 2px solid #333;
}
body { font-family: "Trebuchet MS", Courier; }
</style>
</head>
<body>

<h1>National Autonomous Staff Attendance System</h1>
<table border="0" cellspacing="0" cellpadding="4">
<tr>
<td class="table_titles">ID</td>
<td class="table_titles">User</td>
<td class="table_titles">Password</td>
<td class="table_titles">Date</td>
<td class="table_titles">EntryTime</td>
<td class="table_titles">ExitTime</td>
<td class="table_titles">TotalWorkedHour</td>
<td class="table_titles">Overtime</td>
<td class="table_titles">RfidNumber</td>
</tr>

<?php
include('connection.php');
$result = mysqli_query($con,'SELECT * FROM staff_attendance_system ORDER BY id DESC');
// Process every record
$oddrow = true;
while($row = mysqli_fetch_array($result))
{
if ($oddrow)
{
$css_class=' class="table_cells_odd"';
}
else
{
$css_class=' class="table_cells_even"';
}
$oddrow = !$oddrow; 
echo "<tr>";
echo "<td '.$css_class.'>" . $row['ID'] . "</td>";
echo "<td '.$css_class.'>" . $row['User'] . "</td>";
echo "<td '.$css_class.'>" . $row['Password'] . "</td>";
echo "<td '.$css_class.'>" . $row['Date_Day'] . "</td>";
echo "<td '.$css_class.'>" . $row['EntryTime'] . "</td>";
echo "<td '.$css_class.'>" . $row['ExitTime'] . "</td>";
echo "<td '.$css_class.'>" . $row['TotalWorkedHour'] . "</td>";
echo "<td '.$css_class.'>" . $row['Overtime'] . "</td>";
echo "<td '.$css_class.'>" . $row['RfidNumber'] . "</td>";
echo "</tr>"; 
}
 
// Close the connection
mysqli_close($con);
?>
</table>
</body>
</html>