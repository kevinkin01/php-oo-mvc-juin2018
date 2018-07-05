<?php


if(is_string($oneView)){

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Article: <?= $oneView ?></title>
</head>
<body>
<h1>Article: <?= $oneView ?></h1>

<?php
    include "View/menu.view.php";
}else{

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Article: <?= $oneView->getThetitle() ?></title>
</head>
<body>
<h1>Article: <?= $oneView->getThetitle() ?></h1>

<?php

include "View/menu.view.php";


?>
        <h3><?= $oneView->getThetitle(); ?></h3>
        <p><?= $oneView->getThetext() ?></p>
        <p><?= $oneView->getThedate(); ?>
            Par <?php
            echo "<a href='?user={$oneView->getIdutil()}'>{$oneView->getTheName()}</a>";
            ?></p>
        <hr>
        <?php
        }
?>
</body>
</html>
