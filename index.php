<!DOCTYPE html >
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
    <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
    <title>Peta Titik Api</title>
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 100%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
    </style>
  </head>

<html>
  <body>
    <div id="map"></div>

    <script>
      var customLabel = {
        restaurant: {
          label: 'R'
        },
        bar: {
          label: 'B'
        }
      };

        function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          center: new google.maps.LatLng(-1.826518, 117.307527),
          zoom: 5
        });
        var infoWindow = new google.maps.InfoWindow;

          // Change this depending on the name of your PHP or XML file
        var icon= 'https://img.icons8.com/color/48/000000/fire-element.png';
                <?php
                    include 'connection_db.php';
                    // $hasil = array();
                    $query=mysqli_query($conn,'SELECT * FROM datascrap');
                    while ($data=mysqli_fetch_object($query)) {
                        // $hasil[]=$data;
                ?>
                    var infowincontent<?=$data->id?> = document.createElement('div');
                    var strong<?=$data->id?> = document.createElement('strong');
                    strong<?=$data->id?>.textContent = '<?=ucwords(strtolower($data->kecamatan.', '.$data->waktu.' - '.date('d F Y',strtotime($data->tanggal))))?>';
                    infowincontent<?=$data->id?>.appendChild(strong<?=$data->id?>);
                    infowincontent<?=$data->id?>.appendChild(document.createElement('br'));

                    var text<?=$data->id?> = document.createElement('html');
                    text<?=$data->id?>.textContent = '<?=ucwords(strtolower($data->kabupaten.', '.$data->provinsi.', '.$data->region))?>';
                    infowincontent<?=$data->id?>.appendChild(text<?=$data->id?>);
                    var marker<?=$data->id?> = new google.maps.Marker({
                        map: map,
                        position: new google.maps.LatLng('<?=$data->lintang?>','<?=$data->bujur?>'),
                        icon: icon,
                    });
                    marker<?=$data->id?>.addListener('click', function() {
                        infoWindow.setContent(infowincontent<?=$data->id?>);
                        infoWindow.open(map, marker<?=$data->id?>);
                    });
                <?php
                
                    }
                ?>
        }



      function downloadUrl(url, callback) {
        var request = window.ActiveXObject ?
            new ActiveXObject('Microsoft.XMLHTTP') :
            new XMLHttpRequest;

        request.onreadystatechange = function() {
          if (request.readyState == 4) {
            request.onreadystatechange = doNothing;
            callback(request, request.status);
          }
        };

        request.open('GET', url, true);
        request.send(null);
      }

      function doNothing() {}
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDhEuzRypAQIK2FaN3Kbq8lp_C5nIi6SOE&callback=initMap">
    </script>
  </body>
</html>