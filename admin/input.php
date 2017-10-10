<?php
//include 'function.php';
include 'header.php';

if (isset($_POST['nyPizzeria'])) {
	$pizzeria = [];
	$pizzeria['namn'] = test_input($_POST['pizzeria']);
	$pizzeria['lng'] = (float)test_input($_POST['lng']);
	$pizzeria['lat'] = (float)test_input($_POST['lat']);
	if(isset($_POST['oppetalladagar'])){
		/*{'mon':"hh-mm"}*/
		$open = test_input($_POST['mondag-open']);
		$close = test_input($_POST['mondag-close']);
		$pizzeria['open'] = "{'mon':'{$open} - {$close}', 'tis':'{$open} - {$close}', 'ons':'{$open} - {$close}', 'tor':'{$open} - {$close}', 'fre':'{$open} - {$close}', 'lor':'{$open} - {$close}', 'son':'{$open} - {$close}'}";
	}elseif (isset($_POST['vardahhelg'])) {
		$open = test_input($_POST['mondag-open']);
		$close = test_input($_POST['mondag-close']);
		$openFre = test_input($_POST['fredag-open']);
		$closeFre = test_input($_POST['fredag-close']);
		$openLor = test_input($_POST['lordag-open']);
		$closeLor = test_input($_POST['lordag-close']);
		$openSon = test_input($_POST['sondag-open']);
		$closeSon = test_input($_POST['sondag-close']);
		$pizzeria['open'] = "{'mon':'{$open} - {$close}', 'tis':'{$open} - {$close}', 'ons':'{$open} - {$close}', 'tor':'{$open} - {$close}', 'fre':'{$openFre} - {$closeFre}', 'lor':'{$openLor} - {$closeLor}', 'son':'{$openSon} - {$closeSon}'}";
	}else{
		$open = test_input($_POST['mondag-open']);
		$close = test_input($_POST['mondag-close']);
		$openTis = test_input($_POST['tisdag-open']);
		$closeTis = test_input($_POST['tisdag-close']);
		$openOns = test_input($_POST['onsdag-open']);
		$closeOns = test_input($_POST['onsdag-close']);
		$openTor = test_input($_POST['torsdag-open']);
		$closeTor = test_input($_POST['torsdag-close']);
		$openFre = test_input($_POST['fredag-open']);
		$closeFre = test_input($_POST['fredag-close']);
		$openLor = test_input($_POST['lordag-open']);
		$closeLor = test_input($_POST['lordag-close']);
		$openSon = test_input($_POST['sondag-open']);
		$closeSon = test_input($_POST['sondag-close']);
		$pizzeria['open'] = "{'mon':'{$open} - {$close}', 'tis':'{$openTis} - {$closeTis}', 'ons':'{$openOns} - {$closeOns}', 'tor':'{$openTor} - {$closeTor}', 'fre':'{$openFre} - {$closeFre}', 'lor':'{$openLor} - {$closeLor}', 'son':'{$openSon} - {$closeSon}'}";
	}
	$pizzeria['gluten'] = 0;
	if (isset($_POST['gluten'])) {
		$pizzeria['gluten'] = 1;
	}
	$conn = connect_to_db();
	$stmt = $conn->prepare("INSERT INTO `pizzerior`(`id`, `namn`, `hasGlutenFree`, `lng`, `lat`, `openinghouers`) VALUES (NULL,?,?,?,?,?)");
	$stmt->bind_param('sidds', $pizzeria['namn'], $pizzeria['gluten'], $pizzeria['lng'], $pizzeria['lat'], $pizzeria['open']);
	$stmt->execute();
	$conn->close();
	//var_dump($pizzeria);
}
if (isset($_POST['nyPizza'])) {
	$pizza = [];
	$pizza['pizzeria'] = (int)test_input($_POST['pizzeria']);
	$pizza['namn'] = test_input($_POST['namn']);
	$pizza['pizzanr'] = (int)test_input($_POST['listnr']);
	$pizza['ingredienser'] = array_map('ucwords',array_map('strtolower',array_map('test_input',array_map('trim',explode(",", test_input($_POST['ingredienser']))))));
	
	$pizza['pris'] = (int)test_input($_POST['pris']);
	
	#kolla att pizzerian finns
	$conn = connect_to_db();
	$stmt = $conn->prepare("SELECT id FROM pizzerior where id = ? ");
	$stmt->bind_param('i', $pizza['pizzeria']);
	$stmt->execute();
	$result = $stmt->get_result();
	$errors = [];
	//var_dump($result->num_rows);
	if ($result->num_rows != 1) {
		$errors[] = "pizzeria dose not exists!";
	}
	# kolla om ingredienserna finns 
	$ingredienser = "'".implode("', '", $pizza['ingredienser'])."'";
	//$sql = "SELECT count(*) from ingredienser where ingredienser.namn in (?)";
	$sql = "SELECT GROUP_CONCAT(namn) as ingredienser, count(*) as count from ingredienser where ingredienser.namn in ($ingredienser)";
	$stmt = $conn->prepare($sql);
	//$stmt->bind_param('s',$ingredienser);
	$stmt->execute();
	$result = $stmt->get_result();
	//var_dump($result);
	$result = $result->fetch_array(MYSQLI_ASSOC);
	//var_dump($result);
	//echo(count($pizza['ingredienser']));
	if($result['count'] != count($pizza['ingredienser'])){
		$ingredienserInDB = array_map('ucwords',array_map('strtolower',explode(",", $result['ingredienser'])));
		/*var_dump($ingredienserInDB);
		var_dump($pizza['ingredienser']);*/
		//ucwords(strtolower($bar))
		$skilnad = array_diff($pizza['ingredienser'], $ingredienserInDB);
		var_dump($skilnad);
		//$errors[] = "tyvär men $result['ingredienser'] saknas i vår databas, var god och lägg till dem.";
		# lägg till ingredienser som saknas till db
	}

	#OM INGA FEL SÅ 

	#lägg in pizzan till pizzerian
	/*
	$sql = "INSERT INTO `pizzorinpizzeria`(`id`, `name`, `pizzeria`, `pizzanr`, `pris`, `favorits`, `orders`) VALUES (NULL,?,?,?,?,0,0)";
	$stmt = $conn->prepare("SELECT id FROM pizzerior where id = ? ");
	$stmt->bind_param('siii',$pizza['namn'], $pizza['pizzeria'], $pizza['pizzanr'], $pizza['pris']);
	$stmt->execute();
	*/


	#koppla ingredienser till pizza

	
	
}
?>
<main class="left">
	<h2>Ny pizzeria</h2>
<form method="POST" action="">
	<label for="pizzeria">namn*:</label>
	<input type="text" required name="pizzeria"><br>
	<label for="lng">longditute* (57.787242):</label>
	<input type="number" min="-180" max="180" step=0.000001 required name="lng"><br>
	<label for="lat">latitude* (14.243169):</label>
	<input type="number" min="-87.711799" max="89.450161" step=0.000001 required name="lat"><br>
	Alla dagar samma öppetider <input type="checkbox" id="alldays" name="oppetalladagar"><br>
	vardag och helg tider <input type="checkbox" id="weekend" name="vardahhelg"><br>
	<label id="firstTimeinputName">Måndag</label>* <br>
	<input type="time" required name="mondag-open"> -
	<input type="time" required name="mondag-close"><br>
	<div id="olikaOppetiderInput">
		<div id="vardahhelginput">
			<label>Tisdag</label><br>
			<input type="time" name="tisdag-open"> -
			<input type="time" name="tisdag-close"><br>
			
			<label>Onsdag</label><br>
			<input type="time" name="onsdag-open"> -
			<input type="time" name="onsdag-close"><br>
			
			<label>Torsdag</label><br>
			<input type="time" name="torsdag-open"> -
			<input type="time" name="torsdag-close"><br>
		</div>
		<label>Fredag</label><br>
		<input type="time" name="fredag-open"> -
		<input type="time" name="fredag-close"><br>
		
		<label>Lördag</label><br>
		<input type="time" name="lordag-open"> -
		<input type="time" name="lordag-close"><br>
		
		<label>Söndag</label><br>
		<input type="time" name="sondag-open"> -
		<input type="time" name="sondag-close"><br>
	</div>
	<input type="checkbox" name="gluten"> gluten fritt
	<input type="submit" name="nyPizzeria">

</form>
<?php
if (isset($_POST['nyPizzeria'])) {
 printf("%d Row inserted.\n", $stmt->affected_rows); 
}
?>
</main>
<main class="right">
	<?php
	$conn = connect_to_db();
		$sql = "SELECT `id`, `namn` FROM `pizzerior` WHERE 1";
		$result = $conn->query($sql);
		$rows = $result->fetch_all(MYSQLI_ASSOC);
		
	?>
	<h2>Ny pizza</h2>
	<form method="POST">
		pizzeria select get from db
		<select name="pizzeria">
			<?php
				foreach ($rows as $row) {
					echo "<option value='".$row['id']."'>{$row['namn']}</option>";
				}
			?>
		</select><br>
		namn: <input type="text" name="namn"><br>
		pizza nr <input type="number" name="listnr"><br>
		ingredienser
		<ul id="list">
			<li>Ost</li>
			<li>Tomatsås</li>
		</ul>
		<input type="text" id="ingredinesIn" name="ingredienser"><br>
		pris nummer
		<input type="nummer" name="pris">
		<input type="submit" name="nyPizza">
	</form>
	<form name="nyIngrediens">
		<h2>Ny ingrediens</h2>
		<input type="text" placeholder="namn" name="namn">
		<select>
			<option>grönsak</option>
			<option>kryda</option>
			<option>krydda</option>
			<option>kött</option>
			<option>ost</option>
			<option>övrigt</option>
		</select>
	</form>
</main>
<script type="text/javascript" src="js/input.js"></script>

<?php
	include 'footer.php';
?>