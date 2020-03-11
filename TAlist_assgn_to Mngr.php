<!DOCTYPE html>
<html>
<head>
<title>Manager/TA list</title>
</head>
<tr>
<th>username</th>

</tr>
<body>
<table>

<?php
$conn = mysqli_connect("localhost", "root", "");
mysqli_select_db($conn,"testlog2");
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT username, link FROM reg_user";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
echo '<li><a href="'. $row['link'] .'">'. $row['username']; '</a></li>';///////ye code abhi kaam nahi karega, pehle link column banana padega
//echo "<tr><td>" . $row["role"]. "</td><td>" . $row["username"] . "</td><td>"
//. $row["password"]. "</td></tr>";
}
echo "</table>";
} else { echo "0 results"; }
$conn->close();


?>
</table>
</body>
</html>