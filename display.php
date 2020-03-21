<!DOCTYPE html>
<html>
<body>
	<?php
            $conn = mysqli_connect("localhost", "root", "");
            mysqli_select_db($conn,"testlog2");
            // Check connection
            if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
            }
            $sql = "SELECT * FROM m_tech_25 WHERE SNo = 2";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
			//$fields  = $result->fetch_fields();
            while($row = $result->fetch_row()) {
			for($i = 0; $i < $result-> field_count; $i++){
			$field_info = $result -> fetch_field();
			if($row[$i])echo '<li>'.$field_info->name.'<a align = right>-------------</a>'.$row[$i] .'</li>';///////ye code abhi kaam nahi karega, pehle link column banana padega
			//echo '';
			}
			}
            echo "</table>";
            } else { echo "0 results"; }
            $conn->close();
            ?>
    
</body>
</html>