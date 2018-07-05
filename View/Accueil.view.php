<?php
# aaa028 create homepage view
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Accueil</title>

</head>
<body>
    <div class="container mt-3">
<?php
include "View/menu.view.php";
?>

    <?php

if (!is_array($list)) {
    echo "<h2>$list</h2>";
} else {
    echo "<div class='row'>";
    foreach ($list as $item) {
        ?>


        <h3><a href="?detail=<?= $item->getIdarticle(); ?>"><?= $item->getThetitle(); ?></a></h3>
        <p><?= substr($item->getThetext(),0,150); ?></p>
        <p><?= $item->getThedate(); ?>
          <br> Par <?= $item->getThename();?>
          <p><a href="?categ=<?=$item->getIdcategory();?>"><?=$item->getThecategtitle(); ?></a> </p>
        </div>
    </div>
        <?php
        }
    echo "</div>";
    }
?>
<footer>Copyright CF2M 2018</footer>
</div>
</body>
</html>
