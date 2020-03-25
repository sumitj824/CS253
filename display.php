<!DOCTYPE html>
<html>
<body>
	<?php
        $conn = mysqli_connect("localhost", "root", "");
        mysqli_select_db($conn,"cs253");
        // Check connection
        if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        }
        $sql = "SELECT * FROM m_tech_25 WHERE Mobile = 2";
        //$sql = "SELECT * FROM m_tech_25";

        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
        //$fields  = $result->fetch_fields();
        echo "<table>";

        while($row = $result->fetch_row()) {
		for($i = 0; $i < $result-> field_count; $i++){
		$field_info = $result -> fetch_field();
        //echo '<li>'.$field_info->name.'<a align = right>-------------</a>'.$row[$i] .'</li>';
        echo "<tr><td>".$field_info->name."</td><td>".$row[$i] ."</td></tr>";
        //if($row[$i])echo '<li>'.$field_info->name.'<a align = right>-------------</a>'.$row[$i] .'</li>';///////ye code abhi kaam nahi karega, pehle link column banana padega
		//echo '';
		}
		}
        echo "</table>";
        } else { echo "0 results"; }
        $conn->close();
    ?>
    
</body>
</html>