<?php

$sql = "SELECT * FROM `manufactures` WHERE rules <= 1";
$result_m = mysqli_query($connect, $sql);

$sql = "SELECT * FROM `manufactures` WHERE rules = 2";
$result_ml = mysqli_query($connect, $sql);

?>
<nav class="menu" style="width:100% !important;">
    <ul class="menu-list" style="display:flex !important; width:100% !important; justify-content:space-between !important;">
        <?php foreach ($result_m as $each_m) : ?>
            <li class="menu-item" style="flex:1 !important; text-align:center !important;">
                <a href="view_brand.php?mb=<?php echo $each_m['name'] ?>" style="width:100% !important; display:block !important; text-align:center !important;"><?php echo $each_m['name'] ?></a>
            </li>
        <?php endforeach ?>

        <?php foreach ($result_ml as $each_ml) : ?>
            <li class="menu-item" style="flex:1 !important; text-align:center !important;">
                <a href="view_brand.php?lp=<?php echo $each_ml['name'] ?>" style="width:100% !important; display:block !important; text-align:center !important;"><?php echo $each_ml['name'] ?></a>
            </li>
        <?php endforeach ?>
    </ul>
</nav>