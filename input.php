<?php
//include 'function.php';
include 'header.php';

if (isset($_POST['nyPizzeria'])) {
	echo "hej";
	$pizzeria = [];
	$pizzeria['namn'] = test_input($_POST['pizzeria']);
	$pizzeria['lng'] = test_input($_POST['lng']);
	$pizzeria['lat'] = test_input($_POST['lat']);
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
	$gluten = 0;
	if (isset($_POST['gluten'])) {
		$gluten = 1;
	}
	
	var_dump($pizzeria);
}
?>
<main class="left">
	<h1>Ny pizzeria</h1>
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
</main>
<main class="right"></main>
<script type="text/javascript" src="js/input.js"></script>
<?php
	include 'footer.php';
?>