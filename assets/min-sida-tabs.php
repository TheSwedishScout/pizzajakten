<?php
$tabpages = ['Min-Sida' => 'Instälnigar',
             'Mina-Favoriter' => 'Mina Favoriter',
             'oldOrders' => 'Orderhistorik',
             'index' => 'Gör bestälning',
         ];
$i = 1;
?>
<ul class="tabs">
<?php
foreach ($tabpages as $url => $name) {
    ?>
    <li class="tab<?= $i; ?> <?php echo $page == $url ? 'active' : ''; ?>">
        <a href="<?= $url; ?>.php"><?= $name; ?></a>
    </li>
    <?php
    $i++;
}
    //Print link to admin aria
    if($_SESSION['user']['lvl'] >= 2){
        ?>
        <li class="tab<?= $i; ?>">
            <a href="./admin">admin</a>
        </li>
        <?php           
    }  
    ?>
</ul>