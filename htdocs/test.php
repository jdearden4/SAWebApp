<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="test.css">
    </head>

    <body>
        <?php
        // $ specifies a variable
        // . is string concatenation
        // echo is print

        $db_conn = mysqli_connect("localhost", "root", ""); //database connection    
        mysqli_select_db($db_conn, "saimapdi_studentinfosa"); //select database

        // Check connection
        if (mysqli_connect_errno()){
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }

        //build queries
        // select all from table name where collumn where select criteria for searching i.e. country is italy
        $cmd = "SELECT * FROM `Institution Coordinates` WHERE `City`='Paris'";

        // when the result comes back what do we do next?
        $result = mysqli_query($db_conn, $cmd);
        
        while($row = $result->fetch_assoc()) {
            echo "City: " .$row["City"]. " Country: " .$row["Country"]. " - Long: " . $row["Longitude"]. " Lat " . $row["Latitude"]. "<br>";
            $city = $row["City"];
            echo "<p>$city</p>" ;
        }
        
        //if($row != null && mysqli_num_rows($result)==1){
        //    $_SESSION['active'] = $email;
        //    header("location: community_board.php");
        //}
        //else
        //    $message = $email."Email or Password is invalid".$pass;
        ?>
    </body>
</html>