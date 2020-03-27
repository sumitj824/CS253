<?php

    session_start();

?>



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
            <div class = "heading"><?php echo $_SESSION['usern']; ?></div>
    	    <div class = "heading">Dashboard</div>
    	    <hr>
		    <div class = "first">
			    <a href="List_of_students_to_each_TA.php">View List of Students</a>
		    </div>
            <hr>
        </div>
        
        <div class = "main-space">
        <table>

            <?php
            $conn = mysqli_connect("localhost", "root", "");
            mysqli_select_db($conn,"cs253");
            // Check connection
            if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
            }
            $sql = "SELECT `S.No.`, Application_Ref_No FROM m_tech_25";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
            // output data of each row
            echo "<table>";
            while($row = $result->fetch_assoc()) {
            //echo '<li>'.$row['Username']; '</li>';
            //echo '<li><a href="'. $row['link1'] .'">'. $row['usern']; '</a></li>';///////ye code abhi kaam nahi karega, pehle link column banana padega

            echo '<tr><td><a href="TA_Final_page.php?id=' . $row['S.No.'] . '">'. $row['Application_Ref_No']; "</a></td></tr>";///////ye code abhi kaam nahi karega, pehle link column banana padega
            echo '<br>';
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