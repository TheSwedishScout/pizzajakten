<?php
	include 'header.php';
    //An associative array of variables passed to the current script via the URL parameters. Are there ingredients in the url? checks via isset. 

	if (isset($_GET['pizza'])) {
		$pizza = test_input($_GET['pizza']);
		$conn = connect_to_db();
        $sql = "SELECT pizzerior.*, pizzorinpizzeria.*, Group_CONCAT(ingredienseronpizza.ingrediens) as ingredienser FROM ingredienseronpizza, pizzorinpizzeria, pizzerior
        WHERE pizzorinpizzeria.pizzeria = pizzerior.id AND ingredienseronpizza.pizza = pizzorinpizzeria.id AND pizzorinpizzeria.id = ? GROUP BY ingredienseronpizza.pizza LIMIT 1";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $pizza);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        $conn->close();
        if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                	$pizza = $row;
                    
            }
        }
        $ing = explode(",", $pizza['ingredienser']);
        //implode — Join array elements with a string
        $ing = implode(", ", $ing);
        if($pizza['lng'] == 0 || $pizza['lat'] == 0 ){
        	$adress = urlencode($pizza['adress']);
	        $url = "https://maps.googleapis.com/maps/api/geocode/json?&address={$adress}&key=AIzaSyDrny4s0CJHrcSzd7RcH0frZ0FRYHRMEos";
			        # headers and data (this is API dependent, some uses XML)
			$headers = array(
			    'Accept: application/json',
			    'Content-Type: application/json',
			);
            //phps motsvarighet till ajax. förfrågar url'en från högre upp för att få google maps geolocation. hämtar datan därifrån. 
			        $handle = curl_init();
        			curl_setopt($handle, CURLOPT_URL, $url);
        			curl_setopt($handle, CURLOPT_HTTPHEADER, $headers);
        			curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
        			curl_setopt($handle, CURLOPT_SSL_VERIFYHOST, false);
        			curl_setopt($handle, CURLOPT_SSL_VERIFYPEER, false);
        			$response = curl_exec($handle);
        			$code = curl_getinfo($handle, CURLINFO_HTTP_CODE);
        			$adressData = json_decode($response);
        			$pizza['lng'] = $adressData->results[0]->geometry->location->lng;
        			$pizza['lat'] = $adressData->results[0]->geometry->location->lat;
        } 


	}
?>







<main class="left pizzerior">
         <!-- Lista på ingredienser-->
         <h1><?php echo $pizza['name']; ?></h1>
        <img src="images/pizza7.png">
        <h3><?php echo $ing; ?></h3>
        <form action="varukorg.php" method="POST">
            <input type="submit" name="Välj denna" value="Välj pizza">
            <input type="hidden" name="pizza" value="<?php echo $pizza['id'] ?>">
        </form>
</main>







<main class="right pizzerior">
	<?php //var_dump($pizza); ?>
    <div id="map"></div>
    <script>

        //Googlekartan som visar vilken log/lat som ska visas
      function initMap() {
        var uluru = {lat: <?php echo($pizza['lat']) ?>, lng: <?php echo($pizza['lng']) ?>};
        var icons = {
			pizza: {
				icon: 'images/0.5x/Map marker.png' //den som placeras ut på kartan vart pizzerian finns
			}
      	}
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 13,
          center: uluru
        });
        var marker = new google.maps.Marker({
          position: uluru,
          map: map,
          icon: icons['pizza'].icon,
        });
        /*features.forEach(function(feature) {
          var marker = new google.maps.Marker({
            position: feature.position,
            icon: icons[feature.type].icon,
            map: map
          });
        });/*/
      }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDoq4kV_3NqAFlhNrgEjbmsgfSa0TWzzo8&callback=initMap">
    </script>
    </ul>
</main>






<?php
	include 'footer.php';
?>