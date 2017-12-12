<?php
	include 'header.php';
    //An associative array of variables passed to the current script via the URL parameters. Are there ingredients in the url? checks via isset. 

	if (isset($_GET['pizzeria'])) {
		$pizzeria = test_input($_GET['pizzeria']);
        $conn = connect_to_db();
        if(isset($_SESSION['user']['nr'])){
            // Hämta favorit markerade pizzor
            $sql = "SELECT favorites.pizza FROM favorites WHERE user = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $_SESSION['user']['nr']);
            $stmt->execute();
            $result = $stmt->get_result();
            $stmt->close();
            $favorites = [];
            if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        $favorites[] = $row['pizza'];
                }
            }
            //var_dump($favorites);
        }

        if(is_numeric($pizzeria)){

           $sql = "SELECT pizzerior.* from pizzerior WHERE pizzerior.id = ? LIMIT 1";
        }else{
            $sql = "SELECT pizzerior.* from pizzerior WHERE pizzerior.namn = ? LIMIT 1";
        }

        $stmt = $conn->prepare($sql);
        if(is_numeric($pizzeria)){
            $stmt->bind_param("i", $pizzeria);
        }else{
            $stmt->bind_param("s", $pizzeria);
        }
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
           
	}else{
        die('no pizzeria');
    }
?>
<ul class="tabsR tabs">
    <li id="kartaTab" class="shadow tab1 active">karta</li>
    <li id="öppettiderTab" class="shadow tab2">öppetider</li>
    <!--<li id="ingrediensTab" class="shadow tab3">Ingrediens val</li>
    <li id="#" class="shadow tab4">karta</li>-->
</ul>

<main class="left pizzerior" >
        <h1><?php echo $pizzeria['namn']; ?></h1>
        <!-- Lista på pizzor hos pizzeria-->
        <ul class="helaPizzerian">
            <?php  
            foreach ($pizzor as $pizza) {
                $ingredienser = explode(",", $pizza['ingredienser']);
                ?>
                <li>
                    <h2><a href="pizza.php?pizza=<?= $pizza['id']; ?>"><?php echo($pizza['name']); ?></a> 
                    <?php 
                        if(isset($_SESSION['user'])){ 
                            //$ost = in_array($pizza['id'], $favorites);
                                /*var_dump($pizza['id']);
                                var_dump($favorites);
                                var_dump($ost);*/

                            if(isset($favorites)){
                                if(in_array($pizza['id'], $favorites)){
                                ?>
                                    <a value="<?= $pizza['id']; ?>" href="#" class="star stared"></a>
                                <?php
                                }else{
                                ?> 
                                        <a value="<?= $pizza['id']; ?>" href="#" class="star"></a>
                                <?php 
                                }
                            }else{
                                ?> 
                                    <a value="<?= $pizza['id']; ?>" href="#" class="star"></a>
                                <?php 
                            }
                        }
                        ?>
                        </h2>
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

<main class="right pizzerior tab1 " id="karta">
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
<main class="right pizzeria hidden tab2 " id="öppetider">
    <h2>Öppettider</h2>
    <?php 
        $son = str_replace("'", '"', $pizzeria['openinghouers']);
        $open = json_decode($son, TRUE);
        //var_dump($open);
        ?>
        <ul>
        <li>Måndagar: <?= $open['mon']; ?></li>
        <li>Tisdagar: <?= $open['tis'];?></li>
        <li>Onsdagar: <?= $open['ons'];?></li>
        <li>Torsdagar: <?= $open['tor'];?></li>
        <li>Fredagar: <?= $open['fre'];?></li>
        <li>Lördagar: <?= $open['lor'];?></li>
        <li>Söndagar: <?= $open['son'];?></li>
        </ul>
</main>
<script type="text/javascript" src="js/pizzeria.js"></script>
<?php
	include 'footer.php';
?>