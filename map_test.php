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

<var marker = <?php
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



//  var marker = new mapboxgl.Marker({color: '#FF4929'})
//   .setLngLat([11.2486, 43.7711]) <!--Florence-->
//   .addTo(map);
// var marker = new mapboxgl.Marker({color: '#FF4929'})
//   .setLngLat([144.9631, -37.8136]) <!--Melbourne-->
//   .addTo(map)
// var marker = new mapboxgl.Marker({color: '#FF4929'})
//   .setLngLat([153.0251, -27.4698]) <!--Brisbane-->
//   .addTo(map)
// var marker = new mapboxgl.Marker({color: '#FF4929'})
//   .setLngLat([151.2093, -33.8688]) 
//   .addTo(map)<!--Sydney-->
// var marker = new mapboxgl.Marker({color: '#FF4929'})
//   .setLngLat([-58.3816, -34.6037]) 
//   .addTo(map) <!--Buenos Aires-->
// var marker = new mapboxgl.Marker({color: '#FF4929'})
//   .setLngLat([146.8169, -19.2590]) 
//   .addTo(map)<!--Townsville aus-->
// <!--Queensland aus-->
// var marker = new mapboxgl.Marker({color: '#FF4929'})
//   .setLngLat([153.6020, -28.6474]) 
//   .addTo(map)<!--Byron bay aus-->
// var marker = new mapboxgl.Marker({color: '#FF4929'})
//   .setLngLat([37.6173, 55.7558]) 
//   .addTo(map)<!--Moscow-->
// var marker = new mapboxgl.Marker({color: '#FF4929'})
//   .setLngLat([-72.1648, 41.3542]) 
//   .addTo(map)<!--Waterford-->
// var marker = new mapboxgl.Marker({color: '#FF4929'})
//   .setLngLat([0.1278, 51.5074]) 
//   .addTo(map)<!--London-->
// var marker = new mapboxgl.Marker({color: '#FF4929'})
//   .setLngLat([11.5021, 3.8480]) 
//   .addTo(map)<!--Yaounde-->
// var marker = new mapboxgl.Marker({color: '#FF4929'})
//   .setLngLat([36.9541, -4.3150]) 
//   .addTo(map)<!--Moyo Hill Camp (manyara)-->
// var marker = new mapboxgl.Marker({color: '#FF4929'})
//   .setLngLat([39.1921, -6.1622]) 
//   .addTo(map)<!--Stone Town tanz-->
// var marker = new mapboxgl.Marker({color: '#FF4929'})
//   .setLngLat([31.0218, -29.8587]) 
//   .addTo(map)<!--Durban South af-->
// var marker = new mapboxgl.Marker({color: '#FF4929'})
//   .setLngLat([-6.8498, 33.9716]) 
//   .addTo(map)<!--Rabat-->
// var marker = new mapboxgl.Marker({color: '#FF4929'})
//   .setLngLat([50.2785, -14.9061]) 
//   .addTo(map)<!--Antalaha-->
// var marker = new mapboxgl.Marker({color: '#FF4929'})
//   .setLngLat([0.1870, 5.6037]) 
//   .addTo(map)<!--Accra ghana-->
// var marker = new mapboxgl.Marker({color: '#FF4929'})
//   .setLngLat([-0.1372, 50.8225]) 
//   .addTo(map)<!--Brighton UK-->
// var marker = new mapboxgl.Marker({color: '#FF4929'})
//   .setLngLat([1.0789, 51.2802]) 
//   .addTo(map)<!--Canterbury UK-->
// var marker = new mapboxgl.Marker({color: '#FF4929'})
//   .setLngLat([2.3522, 48.8566]) 
//   .addTo(map)<!--Paris-->
// var marker = new mapboxgl.Marker({color: '#FF4929'})
//   .setLngLat([-82.3666, 23.1136]) 
//   .addTo(map)<!--Havana-->
// var marker = new mapboxgl.Marker({color: '#FF4929'})
//   .setLngLat([35.9284, 31.9454]) 
//   .addTo(map)<!--Amman-->
// var marker = new mapboxgl.Marker({color: '#FF4929'})
//   .setLngLat([-3.5986, 37.1773]) 
//   .addTo(map)<!--Granada-->
// var marker = new mapboxgl.Marker({color: '#FF4929'})
//   .setLngLat([34.9896, 32.7940]) 
//   .addTo(map)<!--Haifa-->
// var marker = new mapboxgl.Marker({color: '#FF4929'})
//   .setLngLat([23.7275, 37.9838]) 
//   .addTo(map)<!--Athens-->
// var marker = new mapboxgl.Marker({color: '#FF4929'})
//   .setLngLat([12.4964, 41.9028]) 
//   .addTo(map)<!--Rome-->
// var marker = new mapboxgl.Marker({color: '#FF4929'})
//   .setLngLat([30.3351, 59.9343]) 
//   .addTo(map)<!--Saint Petersburg Rus-->
// var marker = new mapboxgl.Marker({color: '#FF4929'})
//   .setLngLat([2.1734, 41.3851]) 
//   .addTo(map)<!--Barcelona-->
// var marker = new mapboxgl.Marker({color: '#FF4929'})
//   .setLngLat([-3.1883, 55.9533]) 
//   .addTo(map)<!--Edinburgh-->
// var marker = new mapboxgl.Marker({color: '#FF4929'})
//   .setLngLat([174.7633, -36.8485]) 
//   .addTo(map)<!--Aukland-->
// var marker = new mapboxgl.Marker({color: '#FF4929'})
//   .setLngLat([-5.9301, 54.5973]) 
//   .addTo(map)<!--Belfast Ire-->
// var marker = new mapboxgl.Marker({color: '#FF4929'})
//   .setLngLat([174.7762, -41.2865]) 
//   .addTo(map)<!--Wellington NZ-->
// var marker = new mapboxgl.Marker({color: '#FF4929'})
//   .setLngLat([121.4737, 31.2304]) 
//   .addTo(map)<!--Shanghai-->
// var marker = new mapboxgl.Marker({color: '#FF4929'})
//   .setLngLat([-2.7967, 56.3398]) 
//   .addTo(map)<!--St Andrews Scotland-->
// var marker = new mapboxgl.Marker({color: '#FF4929'})
//   .setLngLat([170.5028, -45.8788]) 
//   .addTo(map)<!--Dunedin NZ-->
// var marker = new mapboxgl.Marker({color: '#FF4929'})
//   .setLngLat([-71.6127, -33.0472]) 
//   .addTo(map)<!--Valparaiso-->
// var marker = new mapboxgl.Marker({color: '#FF4929'})
//   .setLngLat([-5.9845, 37.3891]) 
//   .addTo(map)<!--Seville-->
// var marker = new mapboxgl.Marker({color: '#FF4929'})
//   .setLngLat([18.0686, 59.3293]) 
//   .addTo(map)<!--Stockholm-->
// var marker = new mapboxgl.Marker({color: '#FF4929'})
//   .setLngLat([12.3908, 43.1107]) 
//   .addTo(map)<!--Perugia-->
// var marker = new mapboxgl.Marker({color: '#FF4929'})
//   .setLngLat([139.6917, 35.6895]) 
//   .addTo(map)<!--Tokyo-->
// var marker = new mapboxgl.Marker({color: '#FF4929'})
//   .setLngLat([16.3738, 48.2082]) 
//   .addTo(map)<!--Vienna-->
// var marker = new mapboxgl.Marker({color: '#FF4929'})
//   .setLngLat([135.7680, 35.0116]) 
//   .addTo(map)<!--Kyoto-->
// var marker = new mapboxgl.Marker({color: '#FF4929'})
//   .setLngLat([83.9739, 25.3176]) 
//   .addTo(map)<!--Varanasi-->
// var marker = new mapboxgl.Marker({color: '#FF4929'})
//   .setLngLat([103.8552, 13.3550]) 
//   .addTo(map)<!--Siem reap-->
// var marker = new mapboxgl.Marker({color: '#FF4929'})
//   .setLngLat([89.4164, 27.4287]) 
//   .addTo(map)<!--Paro Bhutan-->
// var marker = new mapboxgl.Marker({color: '#FF4929'})
//   .setLngLat([102.8329, 24.8801]) 
//   .addTo(map)<!--Kunming-->
// var marker = new mapboxgl.Marker({color: '#FF4929'})
//   .setLngLat([-82.5208, 9.4166]) 
//   .addTo(map)<!--Bocas del toro-->
// var marker = new mapboxgl.Marker({color: '#FF4929'})
//   .setLngLat([-84.3738, 9.9785]) 
//   .addTo(map)<!--Atenas-->
// var marker = new mapboxgl.Marker({color: '#FF4929'})
//   .setLngLat([-79.5199, 8.9824]) 
//   .addTo(map)<!--Panama city-->
// var marker = new mapboxgl.Marker({color: '#FF4929'})
//   .setLngLat([-71.5190, 21.5112]) 
//   .addTo(map)<!--South caicos-->
// var marker = new mapboxgl.Marker({color: '#FF4929'})
//   .setLngLat([71.6127, 33.0472]) 
//   .addTo(map)<!--Valparaiso-->
// var marker = new mapboxgl.Marker({color: '#FF4929'})
//   .setLngLat([70.6693, 33.4489]) 
//   .addTo(map)<!--Santiago (not working)-->
// var marker = new mapboxgl.Marker({color: '#FF4929'})
//   .setLngLat([-92.6376, 16.7370]) 
//   .addTo(map)<!--San crisobal-->
// var marker = new mapboxgl.Marker({color: '#FF4929'})
//   .setLngLat([-23.1251, 66.0749]) 
//   .addTo(map)<!--Isaforour-->
// var marker = new mapboxgl.Marker({color: '#FF4929'})
//   .setLngLat([-4.2518, 55.8642]) 
//   .addTo(map)<!--Glasgow-->
// var marker = new mapboxgl.Marker({color: '#FF4929'})
//   .setLngLat([12.5683, 55.6761]) 
//   .addTo(map)<!--Cope-->
// var marker = new mapboxgl.Marker({color: '#FF4929'})
//   .setLngLat([-8.4756, 51.8985]) 
//   .addTo(map)<!--Cork-->
// var marker = new mapboxgl.Marker({color: '#FF4929'})
//   .setLngLat([-6.2603, 53.3498]) 
//   .addTo(map)<!--Dublin-->
// var marker = new mapboxgl.Marker({color: '#FF4929'})
//   .setLngLat([7.8421, 47.990]) 
//   .addTo(map)<!--Freiburg germ-->
// var marker = new mapboxgl.Marker({color: '#FF4929'})
//   .setLngLat([-3.7038, 40.4168]) 
//   .addTo(map)<!--Madrid-->
// var marker = new mapboxgl.Marker({color: '#FF4929'})
//   .setLngLat([13.4050, 52.5200]) 
//   .addTo(map)<!--Berlin-->
// var marker = new mapboxgl.Marker({color: '#FF4929'})
//   .setLngLat([-1.5536, 47.2184]) 
//   .addTo(map)<!--Nantes-->
// var marker = new mapboxgl.Marker({color: '#FF4929'})
//   .setLngLat([11.3426, 44.4949]) 
//   .addTo(map)<!--Bologna-->
// var marker = new mapboxgl.Marker({color: '#FF4929'})
//   .setLngLat([9.1900, 45.4642]) 
//   .addTo(map)<!--Milan-->
// var marker = new mapboxgl.Marker({color: '#FF4929'})
//   .setLngLat([16.3738, 48.2082]) 
//   .addTo(map)<!--Vienna-->
// var marker = new mapboxgl.Marker({color: '#FF4929'})
//   .setLngLat([136.9064, 35.1814]) 
//   .addTo(map)<!--Nagoya-->
// var marker = new mapboxgl.Marker({color: '#FF4929'})
//   .setLngLat([77.2090, 28.6139]) 
//   .addTo(map)<!--New delhi-->
// var marker = new mapboxgl.Marker({color: '#FF4929'})
//   .setLngLat([74.7864, 13.3605]) 
//   .addTo(map)<!--Manipal-->
// var marker = new mapboxgl.Marker({color: '#FF4929'})
//   .setLngLat([116.4074, 39.9042]) 
//   .addTo(map)<!--Beijing-->
// var marker = new mapboxgl.Marker({color: '#FF4929'})
//   .setLngLat([-9.0568, 53.2707]) 
//   .addTo(map)<!--Galway-->
// var marker = new mapboxgl.Marker({color: '#FF4929'})
//   .setLngLat([-90.9656, 0.9538]) 
//   .addTo(map)<!--Galapagos is-->
// var marker = new mapboxgl.Marker({color: '#FF4929'})
//   .setLngLat([-70.6731, 41.5265]) 
//   .addTo(map)<!--Woods hole-->
// var marker = new mapboxgl.Marker({color: '#FF4929'})
//   .setLngLat([-71.1097, 42.3736]) 
//   .addTo(map)<!--Cambridge-->
// var marker = new mapboxgl.Marker({color: '#FF4929'})
//   .setLngLat([126.5350, 45.8038]) 
//   .addTo(map)<!--Harbin-->
// var marker = new mapboxgl.Marker({color: '#FF4929'})
//   .setLngLat([4.9036, 52.3680]) 
//   .addTo(map)<!--Amsterdam-->
// var marker = new mapboxgl.Marker({color: '#FF4929'})
//   .setLngLat([19.0402, 47.4979]) 
//   .addTo(map)<!--Budapest-->
// var marker = new mapboxgl.Marker({color: '#FF4929'})
//   .setLngLat([14.4378, 50.0755]) 
//   .addTo(map)<!--Prague-->
// var marker = new mapboxgl.Marker({color: '#FF4929'})
//   .setLngLat([9.3501, 48.6616]) 
//   .addTo(map)<!--Baden-Wurttemberg-->
// var marker = new mapboxgl.Marker({color: '#FF4929'})
//   .setLngLat([9.3501, 48.6616]) 
//   .addTo(map)<!--Hanoi-->
// var marker = new mapboxgl.Marker({color: '#FF4929'})
//   .setLngLat([105.8342, 21.0278]) 
//   .addTo(map)<!--New Lo-->


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