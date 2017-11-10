<?php
    require 'header.php';
    //Lägg till en pizzeria
    if (isset($_POST['nyPizzeria'])) {
        $pizzeria = [];
        $pizzeria['namn'] = test_input($_POST['pizzeria']);
        $pizzeria['adress'] = test_input($_POST['adress']);

        //Fixar öppetider till JSON format beroende på om man har klickat på de olika alternativna alladagar helger eller alla olika
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
        //värderna av det vi sagt i formen sätts i ?. Det fästs sedan via bind_param
        $stmt = $conn->prepare("INSERT INTO `pizzerior`(`id`, `namn`, `hasGlutenFree`, `openinghouers`, `adress`) VALUES (NULL,?,?,?,?)");
        $stmt->bind_param('siss', $pizzeria['namn'], $pizzeria['gluten'], $pizzeria['open'], $pizzeria['adress'] );
        $stmt->execute();
        $conn->close();
        //var_dump($pizzeria);
    }
    ?>
    <main class="left">
        <div class="inputPizzeria">
        <h2>Ny pizzeria</h2>

    <form method="POST" action="">
        <label for="pizzeria"></label><br>
        <input type="text" placeholder="pizzarians namn" required name="pizzeria"><br>
        <!--
            <label for="lng">longditute* (57.787242):</label>
            <input type="number" min="-180" max="180" step=0.000001 required name="lng"><br>
            <label for="lat">latitude* (14.243169):</label>
            <input type="number" min="-87.711799" max="89.450161" step=0.000001 required name="lat"><br>
        -->
        <input type="text" placeholder="adress" required name="adress"><br>
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
    </div>      

    <?php
    if (isset($_POST['nyPizzeria'])) {
     printf("%d Row inserted.\n", $stmt->affected_rows); 
    }
    ?>

    </main>
    <main class="right">
        <?php
        $conn = connect_to_db();
            $sql = "SELECT pizzerior.id, pizzerior.`namn` FROM `pizzerior`";
            //SELECT MAX(pizzanr) FROM pizzorinpizzeria WHERE 1 GROUP BY pizzeria
            $result = $conn->query($sql);
            $rows = $result->fetch_all(MYSQLI_ASSOC);

        ?>
        <div class="inputPizza">
        <h2>Ny pizza</h2><br>
        <form method="POST" id="AddPizza">
            Välj pizzeria <br>
            <select name="pizzeria" id="SelectPizzeria">
                <option value='' disabled selected>--SELECT PIZZERIA--</option>
                <?php
                    foreach ($rows as $row) {
                        echo "<option value='".$row['id']."'>{$row['namn']}</option>";
                    }
                ?>
            </select><br><br>
            namn:<br> <input type="text" name="namn"><br>
            pizza nr <br><input type="number" name="listnr" id="pizzaNR"><br>
            ingredienser
            <ul id="list">
            </ul>
            <input type="text" id="ingredinesIn" name="ingredienser"><br>
            pris nummer<br>
            <input type="nummer" name="pris">
            <input type="submit" name="nyPizza">
        </form>



        <?php
        //Hämta kategorier för ingredienser som finns i db
        $sql = "SELECT namn FROM `kategorier`";
        $result = $conn->query($sql);
        $rows = $result->fetch_all(MYSQLI_ASSOC);
        ?>
        <form name="nyIngrediens" id="nyIngrediens">
            <h2>Ny ingrediens</h2>
            <input type="text" placeholder="namn" name="namn">
            <select name="kategori">
                <?php
                    foreach ($rows as $kategori) {
                        ?>
                            <option><?= $kategori['namn']; ?></option>
                        <?php
                    }
                ?>
            </select>
            <input type="submit" name="">
        </form>
        </div>

    </main>
    <script type="text/javascript" src="js/input.js"></script>

<?php
	include 'footer.php';
?>