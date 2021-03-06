<?php

session_start();


require_once "config.php";

spl_autoload_register(function ($nameClass) {
    require_once "Model/$nameClass.class.php";
});

try {

    $pdo = new PDO(DB_TYPE . ":host=" . DB_HOST . ";dbname=" . DB_NAME . ";port=" . DB_PORT . ";charset=" . DB_CHARSET, DB_LOGIN, DB_PWD);

        $pdo ->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {

    echo "Erreur: " . $e->getMessage();
    echo "<br>";
    echo "N° " . $e->getCode();
    die();
}

$articleM = new ArticleManager($pdo);
$authorM = new AuthorManager($pdo);
$categoryM = new CategoryManager($pdo);

if (isset($_SESSION['monid']) && $_SESSION['monid'] == session_id()) {

    require_once "Controller/AdminController.php";


} else {

    require_once "Controller/PublicController.php";

}