<!DOCTYPE html>
<html lang="sr">
<head>
  <meta charset="UTF-8">
  <title>E-knjižara</title>

  <link rel="stylesheet" type="text/css" href="style/style.css" />
  <link rel="icon" type="image/png" href="favicon.png">
  <style type="text/css">
    #map-canvas{position: absolute;
                top: 10px;
                left: 25px;
                height: 250px;
                width: 800px;}
  </style>
<script type="text/javascript"
 src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDpnUMdh-6nvFFM9vz8I9_8dbAUjauYD9o&sensor=false">
    </script>
    <script type="text/javascript">
      function initialize() {
        var mapOptions = {
          center: new google.maps.LatLng(44.844002, 20.411752),
          zoom: 16
        };
     var map = new google.maps.Map(document.getElementById("map-canvas"),
        mapOptions);
    
    marker = new google.maps.Marker({
      position: new google.maps.LatLng(44.844622, 20.411192),
      map: map
    }); 
    
    marker2 = new google.maps.Marker({
      position: new google.maps.LatLng(44.844562, 20.411419),
      map: map,
      icon: 'favicon.png',
      title: 'E-knjizara'
    }); 
      }

      google.maps.event.addDomListener(window, 'load', initialize);
    </script>
<body>
  <div id="wrap">
    <div id="header">
      <img class="hederi" src="img/header1.jpg">
    </div>
    <div id="meni"> 
      <ul> 
        <li><a href="home.php">Početna</a></li> 
        <li><a href="knjige.php">Knjige</a></li>
        <li><a href="autori.php">Autori</a></li> 
        <li><a href="kontakt.php">Kontakt</a></li> 
        <li><a href="komentari.php">Komentari</a></li>
        <li><a href="lokacija.php">Lokacija</a></li>
        <li><a href="glasanje.php">Glas za knjigu dana</a></li>
        <li><a href="prodavnica2/index.php">E-prodavnica</a></li>
        <li><a href="login.php">LogIn</a></li> 
 
      </ul>
    </div>
    <div id="content">
       <div id="map-canvas"/>
    </div>
    <div id="podaci">
        <p id="adresa"align="justify"><b>Ulica:Zemun,Glavna</b>
        <p id="telefon"><b>Telefon:011/333-222</b>
        
       
    </div>
    <div id="footer">
      <p id="tim">
      Uros Totovic</p>
      <p id="datum">
        <script>
          var datum = new Date();
          document.write(datum.getDate()+".02."+datum.getFullYear()+".");
        </script>
      </p>
    </div>

  </div>

  <div id="audio" style="display:none">
  <audio controls autoplay loop="">
  <source src="audio/muzika.mp3" type="audio/mpeg">
</audio></div>
</body>
</html>