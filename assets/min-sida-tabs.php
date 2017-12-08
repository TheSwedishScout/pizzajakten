<ul class="tabs">
	<li class="tab1 <?php echo $page == 'Min-Sida' ? 'active' : ''; ?>">
        <a href="Min-Sida.php">Min sida</a>
    </li>
    <li class="tab2 <?php echo $page == 'oldOrders' ? 'active' : ''; ?>">
        <a href="oldOrders.php">Orderhistorik</a>
    </li>
    <li class="tab3">
        <a href="index.php">Gör bestälning</a>
	</li>
    <?php
        if($_SESSION['user']['lvl'] >= 2){
            ?>
            <li class="tab4">
                <a href="./admin">admin</a>
            </li>
            <?php           
        }  
    ?>
</ul>