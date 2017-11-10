<?php
	include 'header.php';
    //An associative array of variables passed to the current script via the URL parameters. Are there ingredients in the url? checks via isset. 

	if (isset($_GET['pizzeria'])) {
		$pizzeria = test_input($_GET['pizzeria']);
		$conn = connect_to_db();
        $sql = "SELECT pizzerior.* from pizzerior WHERE pizzerior.id = ? LIMIT 1";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $pizzeria);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                	$pizzeria = $row;
                    
            }
        }
        if($pizzeria['lng'] == 0 || $pizzeria['lat'] == 0 ){
        	$adress = urlencode($pizzeria['adress']);
	        $url = "https://maps.googleapis.com/maps/api/geocode/json?&address={$adress}&key=AIzaSyDrny4s0CJHrcSzd7RcH0frZ0FRYHRMEos";
			        # headers and data (this is API dependent, some uses XML)
    			$headers = array(
    			    'Accept: application/json',
    			    'Content-Type: application/json',
    			);
    			        $handle = curl_init();
    			curl_setopt($handle, CURLOPT_URL, $url);
    			curl_setopt($handle, CURLOPT_HTTPHEADER, $headers);
    			curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
    			curl_setopt($handle, CURLOPT_SSL_VERIFYHOST, false);
    			curl_setopt($handle, CURLOPT_SSL_VERIFYPEER, false);
    			$response = curl_exec($handle);
    			$code = curl_getinfo($handle, CURLINFO_HTTP_CODE);
    			$adressData = json_decode($response);
    			//var_dump($adressData);
    			/*var_dump($adressData->results[0]->geometry->location->lng);
    			var_dump($adressData->results[0]->geometry->location->lat);*/
    			$pizzeria['lng'] = $adressData->results[0]->geometry->location->lng;
    			$pizzeria['lat'] = $adressData->results[0]->geometry->location->lat;
        } 

        $sql = "SELECT pizzorinpizzeria.id, pizzorinpizzeria.name, pizzorinpizzeria.pizzanr, pizzorinpizzeria.pris, GROUP_CONCAT(ingredienseronpizza.ingrediens) as ingredienser from pizzorinpizzeria, ingredienseronpizza WHERE pizzeria = ? AND pizzorinpizzeria.id =  ingredienseronpizza.pizza GROUP BY ingredienseronpizza.pizza";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $pizzeria['id']);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        $pizzor = [];
        if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $pizzor[] = $row;
                    
            }
        }
        $conn->close();
           
	}
?>
<main class="left pizzerior">
        <h1><?php echo $pizzeria['namn']; ?></h1>
        <!-- Lista på pizzor hos pizzeria-->
        <ul class="helaPizzerian">
            <?php  
            foreach ($pizzor as $pizza) {
                $ingredienser = explode(",", $pizza['ingredienser']);
                ?>
                <li>
                    <h2><a href="pizza.php?pizza=<?= $pizza['id']; ?>"><?php echo($pizza['name']); ?></a></h2>
                         <form action="varukorg.php" method="POST">
                        <input type="submit" name="Välj denna" value="Välj pizza">
                        
                        <input type="hidden" name="pizza" value="<?php echo $pizza['id'] ?>">
                    </form>
                    <ul class="allaPizzor">
                    <?php 
                        foreach ($ingredienser as $ingrediens) {
                            ?>
                            <li><?= $ingrediens; ?></li>
                            <?php
                        }
                    ?>
                    </ul>
                         <p><?= $pizza['pris']; ?> kr</p><br>
                </li>
                <?php
                //var_dump($pizza);            
            }
            ?>
        </ul>
        
</main>
<main class="right pizzerior">
	<?php //var_dump($pizzeria); ?>
    <div id="map"></div>
    <script>
      function initMap() {
        var uluru = {lat: <?php echo($pizzeria['lat']) ?>, lng: <?php echo($pizzeria['lng']) ?>};
        var icons = {
			pizza: {
				icon: 'images/0.5x/Map marker.png'
			}
      	}
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 15,
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