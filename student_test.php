<!DOCTYPE html>

<html>

	<head>
    <link rel="stylesheet" href="test.css">
	<!--  <link rel="stylesheet" href="se_style.css"> -->
	  <title>Student Experiences</title>
	</head>

	<body>
	<div class="nav-bar">
		<form method="get" action="map.html">
                <button type="submit">Map</button>
            </form>
	</div>


	<div id="studentimages">
		<img src="images\1.png" alt="Eiffel Tower">
		<img src="images\2.png" alt="Louvre">
		<img src="images\3.png" alt="Monmarte">
		<img src="images\4.png" alt="Apartment">
	</div>


	<div class="title">
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
        $cmd = "SELECT * FROM `SA Student Info` WHERE `Last Name`='Slater'";

        // when the result comes back what do we do next?
        $result = mysqli_query($db_conn, $cmd);
        
        while($row = $result->fetch_assoc()) {
            //echo "First Name: " .$row["First Name"]. " Last Name: " .$row["Last Name"]. 
            " Class Year: " . $row["Class Year"]. " Major: " . $row["Major"]. 
            " Program: " . $row["Program"]. "  Location: " . $row["Location"]."<br>";
            " Semester Abroad: " . $row["Semester Abroad"].
            $firstname = $row["First Name"];
            $lastname = $row["Last Name"];
            $classyear = $row["Class Year"];
            $major = $row["Major"];
            $program = $row["Program"];
            $location = $row["Location"];
            $semabroad = $row["Semester Abroad"];
            echo "<h1>Meet $firstname $lastname, Class of 2019</h1>" ;
            echo "<h3>$program in $location</h3>" ;
            echo "<h3>$major Major</h3>" ;
        }
        
        //if($row != null && mysqli_num_rows($result)==1){
        //    $_SESSION['active'] = $email;
        //    header("location: community_board.php");
        //}
        //else
        //    $message = $email."Email or Password is invalid".$pass;
    ?>
	</div>

	<div class="info">
		<div class="column1">
		<h4>Program Specifics and Advice</h4>
		<ul>
			<li>Took classes at Columbia University Global Center</li>
			<li>Language pledge in place but no one really follows, lots of English</li>
			<li id="creditinfo">Get in writing/email an advisor saying they would accept a class so that you have proof for when you come back</li>
			<li>Your sorbonne university could be anywhere around the city</li>
			<li>Ideally would have lived centrally located, but had to take the metro every day to school</li>
		</ul>
		</div>


		<div class="column2"> 
		<h4>Courses at Columbia University Global Center</h4>
		<p>Art history in the Lourve, UK History, 20th Century European History</p>

		<h4>Housing</h4>
		<p>Homestay located in the 16th arrondissement</p>
		</div>


		<div class="column3"> 
		<h4>Favorite Moments</h4>
		<p>Walking around Notre Dame at night, taking my brother up the Eiffel Tower, getting my daily crepe</p>

		<h4>Must-Sees</h4>
		<p>Champ de Mars, Place de la Republique, Chatelet, all museums</p>
		</div>

	</div>

	</body>


</html>