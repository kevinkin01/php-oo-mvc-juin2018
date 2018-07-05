<!DOCTYPE html>
<html lang="FR">
<head>
    <meta charset="UTF-8">
    <title>Categorie</title>
</head>
<body>
<?php
if (!is_array($listcateg)) {
    echo "<h2>$listcateg</h2>";
}

else {
    foreach ($listcateg as $item) {

        ?>
        <h1>catégorie :<?= $item->getThecategtitle(); ?></h1>
        <?php
    }
}

include "View/menu.View.php";

# aaa054 if $listView is not a array
if (!is_array($listcateg)) {
    echo "<h2>$listcateg</h2>";
}
else {

    foreach ($listcateg as $item) {


        ?>
        <h3><?= $item->getThetitle(); ?></h3>
        <p><?= substr($item->getThetext(),0,150); ?> </p>
        <p> écrit par <?= $item->getTheName();?></p>
        <p><?= $item->getThedate(); ?></p>

        <hr>
        <?php
    }
}
?>

</body>
</html>
