<!DOCTYPE html>



<html>
<head>
  <meta charset='utf-8' />
  <title>Study Abroad</title>
  <meta name='viewport' content='initial-scale=1,maximum-scale=1,user-scalable=no' />
  <script src='https://api.tiles.mapbox.com/mapbox-gl-js/v0.49.0/mapbox-gl.js'></script>
  <link href='https://api.tiles.mapbox.com/mapbox-gl-js/v0.49.0/mapbox-gl.css' rel='stylesheet' />
  <script src='https://api.tiles.mapbox.com/mapbox-gl-js/v0.53.1/mapbox-gl.js'></script>
  <link href='https://api.tiles.mapbox.com/mapbox-gl-js/v0.53.1/mapbox-gl.css' rel='stylesheet' />
  <!-- rel=relationship type=what youre coding in href=name of the file-->
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet"type="text/css" href="style.css">
</head>

<body>
  <div id='map'></div>

  <div class="container-fluid">

  <!-- use database to populate markers -->
  <script class="map2">
  mapboxgl.accessToken = 'pk.eyJ1IjoiamRlYXJkZW4iLCJhIjoiY2pvMXNsYml6MGV2aTN3bXdibTVtbnBmcyJ9.r905FhmvNaltVPlSdS28qw';
  const map = new mapboxgl.Map({
  container: 'map',
  style: 'mapbox://styles/jdearden/cjo1slx1w3paa2spaq850fg13',
  center: [-55.933, 0.000],
  zoom: 0.34
  });
  
  <?php
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
            // pull institution names by city to create links for program pages
            $cmd_prgm = "SELECT * FROM `SA Institution Info` WHERE `City`= '".$city."'";
            $result_prgm = mysqli_query($db_conn, $cmd_prgm);
            
            // pull images by city to display in popup 
            $cmd_img = "SELECT * FROM `SA Images` WHERE `City`= '".$city."'";
            $result_img = mysqli_query($db_conn, $cmd_img);
            $row_img = $result_img->fetch_assoc();
            $pop_text = '<div class="row">';

            $pop_text.='<div class="col-sm-3">';
            $pop_text.= '<img class="pop-imgs" src="data:image/jpeg;base64,'.base64_encode( $row_img['Image'] ).'"/>';
            $pop_text.='</div>';

            $pop_text.='<div class="col-sm-9">';
            $pop_text.= '<ol>';

            // // append every institution associated with current city
            while ($row_prgm = $result_prgm->fetch_assoc()) {
              //intialize variable to hold program names
              $prgm_link = $row_prgm["Program"];
              $pop_text.= '<li><a href="" data-toggle="modal" data-target=".bd-example-modal-xl">'.$prgm_link.'<a></li>';
            }

            $pop_text.='</ol>';
            $pop_text.='</div>';
            $pop_text.='</div>';


            // add institution names to pop up
            echo "var popup = new mapboxgl.Popup({ offset: 25 }) .setHTML('".$pop_text."');";
            // echo "var popup = new mapboxgl.Popup({ offset: 25 }) .setText('James Lee');";

            // create map pin
            echo "new mapboxgl.Marker({color: '#FF4929'}) .setLngLat([$longitude, $latitude]) .setPopup(popup) .addTo(map);" ;
        }

    ?>

  </script>
  </div>

  <div class="nav-bar">
    <!--
    <img src="images/logo.jpeg" alt="">
    -->
    <button type="button" id="help-btn" data-toggle="modal" data-target=".bd-example-modal-lg"><b>Help</b></button>
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

    <!-- program pages -->
  <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-xl">Extra large modal</button> -->
  <div class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        Hello Julia <3
      </div>
    </div>
  </div>

  <!-- help window -->
  <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Large modal</button> -->
  <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        Zoom into the map and click on a camel pin to learn about different program options!
      </div>
    </div>
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

  <!-- <script>
    $('#myModal').on('shown.bs.modal', function () {
      $('#myInput').trigger('focus')
    })
  </script> -->

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
      crossorigin="anonymous"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="map.js"></script>
</body>

</html>