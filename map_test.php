<!DOCTYPE html>



<html>
<head>
  <meta charset='utf-8' />
  <title>Study Abroad</title>
  <meta name='viewport' content='initial-scale=1,maximum-scale=1,user-scalable=no' />
  <script src='https://api.tiles.mapbox.com/mapbox-gl-js/v0.49.0/mapbox-gl.js'></script>
  <link href='https://api.tiles.mapbox.com/mapbox-gl-js/v0.49.0/mapbox-gl.css' rel='stylesheet' />

  <!-- rel=relationship type=what youre coding in href=name of the file-->
  <link rel="stylesheet"type="text/css" href="style.css">
</head>

<body>
  <div id='map'></div>

  <!-- use database to populate markers -->
  <script class="map2">
  mapboxgl.accessToken = 'pk.eyJ1IjoiamRlYXJkZW4iLCJhIjoiY2pvMXNsYml6MGV2aTN3bXdibTVtbnBmcyJ9.r905FhmvNaltVPlSdS28qw';
  const map = new mapboxgl.Map({
  container: 'map',
  style: 'mapbox://styles/jdearden/cjo1slx1w3paa2spaq850fg13',
  center: [-55.933, 0.000],
  zoom: 0.34
  });

  var marker = <?php
        $db_conn = mysqli_connect("localhost", "root", ""); //database connection    
        mysqli_select_db($db_conn, "saimapdi_studentinfosa"); //select database

        // Check connection
        if (mysqli_connect_errno()){
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }

        //build queries
        // select all from table name where collumn where select criteria for searching i.e. country is italy
        $cmd = "SELECT * FROM `Institution Coordinates`";

        // when the result comes back what do we do next?
        $result = mysqli_query($db_conn, $cmd);

        while($row = $result->fetch_assoc()) {
            $city = $row["City"];
            $country = $row["Country"];
            $latitude = $row["Latitude"];
            $longitude = $row["Longitude"];
            echo "new mapboxgl.Marker({color: '#FF4929'}) .setLngLat([$longitude, $latitude]) .addTo(map);" ;
        }

    ?>

  </script>

  <div class="nav-bar">
    <!--
    <img src="images/logo.jpeg" alt="">
    -->
    <button type="button" id="help-btn"><b>Help</b></button>
    <button type="button" id="filter-btn"><b>Search By</b></button>
  </div>

  <div class="search">
    <h1>Search By</h1>

    <!-- filter options -->
    <ul>
      <li><b>Major</b></li>
      <div class="major-dropdown">
        <button onclick="myFunction()" class="dropbtn">All</button>
        <div id="myDropdown" class="dropdown-content">
          <!-- optional search ??? -->
          <!-- would like to make it scrollable -->
          <input type="text" placeholder="Search.." id="myInput" onkeyup="filterFunction()">
          <a href="#home">Computer Science</a>
          <a href="#about">English</a>
          <a href="#contact">Mathematics</a>
          <a href="#email">Latin</a>
          <a href="">Art</a>
          <a href="">Biology</a>
        </div>
      </div>

      <li><b>Language</b></li>
      <li><b>Country</b></li>
      <li><b>City</b></li>
      <li><b>Population Size</b></li>
      <form>
        <input type="checkbox" name="size" value="Small (20)"> Small (20)<br>
        <input type="checkbox" name="Size" value="Medium (40)"> Medium (40)<br>
        <input type="checkbox" name="Size" value="Large (100+)" Checked> Large (100+)
      </form>
    </ul>

    <button id="filter-search" type="button">Search</button>
    <!-- <input type="submit" value="Search"> -->

  </div>

  <!-- js for major button -->

  <script>
      /* When the user clicks on the button, 
      toggle between hiding and showing the dropdown content */
      function myFunction() {
        document.getElementById("myDropdown").classList.toggle("show");
      }
      
      // Close the dropdown if the user clicks outside of it
      window.onclick = function(event) {
        if (!event.target.matches('.dropbtn')) {
          var dropdowns = document.getElementsByClassName("dropdown-content");
          var i;
          for (i = 0; i < dropdowns.length; i++) {
            var openDropdown = dropdowns[i];
            if (openDropdown.classList.contains('show')) {
              openDropdown.classList.remove('show');
            }
          }
        }
      }
  </script>

<!--
<script>
    /* When the user clicks on the button,
    toggle between hiding and showing the dropdown content */
    function myFunction() {
      document.getElementById("myDropdown").classList.toggle("show");
    }
    
    function filterFunction() {
      var input, filter, ul, li, a, i;
      input = document.getElementById("myInput");
      filter = input.value.toUpperCase();
      div = document.getElementById("myDropdown");
      a = div.getElementsByTagName("a");
      for (i = 0; i < a.length; i++) {
        txtValue = a[i].textContent || a[i].innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
          a[i].style.display = "";
        } else {
          a[i].style.display = "none";
        }
      }
    }
</script>
-->





</body>

</html>