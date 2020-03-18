<!DOCTYPE html>
<html>
    <head>
        <title>List Of Students</title>
        <link rel="stylesheet" type="text/css" href="css/dashboard.css">
    </head>
    <tr>
        <th>username</th>

    </tr>
    <body>

        <div class = "box">
    	<div class = "heading">Dashboard</div>
    	<hr>
		<div class = "first">
			<a href="List_of_students_to_each_TA.php">View List of Students</a>
		</div>
        <hr>
        
        <div class = "main-space">
        <table>

            <?php
            $conn = mysqli_connect("localhost", "root", "");
            mysqli_select_db($conn,"cs253");
            // Check connection
            if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
            }
            $sql = "SELECT usern, link1 FROM regta";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
            //echo '<li>'.$row['Username']; '</li>';
            //echo '<li><a href="'. $row['link1'] .'">'. $row['usern']; '</a></li>';///////ye code abhi kaam nahi karega, pehle link column banana padega

            echo '<li><a href="page.php?id=' . $row['usern'] . '">'. $row['usern']; "</a></li>";///////ye code abhi kaam nahi karega, pehle link column banana padega

            //echo "<h1><a href='page.php?id=$row['usern']'><button name='button1' id = 'buttons'> '. $row['usern']; '</button></a></h1>"; //this is correct;
            //echo "<tr><td>" . $row["role"]. "</td><td>" . $row["username"] . "</td><td>"
            //. $row["password"]. "</td></tr>";


            //echo "<h1><a href='page.php?id=$productid'><button name='button1' id = 'buttons'>IN</button></a></h1>"; //this is correct;


            }
            echo "</table>";
            } else { echo "0 results"; }
            $conn->close();


            ?>
        </table>
        </div>
    </body>
</html>