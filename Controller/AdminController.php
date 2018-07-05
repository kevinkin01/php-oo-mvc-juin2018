<?php

$ArticleManager = new ArticleManager($pdo);
$UtilManager = new AuthorManager($pdo);
$CategManager =new CategoryManager($pdo);

# aaa087 deconnect
if (isset($_GET['deconnect'])) {
    $UtilManager->deconnect();


} elseif (isset($_GET['post'])) {


    if (empty($_POST)) {

        require "View/create.view.php";
    } else {
        var_dump($_POST);
        $newArticle = new Article($_POST);

        $succes = $ArticleManager->create($newArticle);
        if ($succes) {
            header("Location: ./");
        } else {

            $error = "Article non inséré, veuillez recommencer";
            require "View/create.view.php";
        }
    }

} elseif (isset($_GET['update']) && ctype_digit($_GET['update'])) {

    $idarticle = (int) $_GET['update'];


    if (empty($_POST)) {

        $recup = $ArticleManager->detailadmin($idarticle);
        if ($recup) {
            $recup2 = new Article($recup);
        }

        require_once "View/modif.view.php";

    }else{

        $update = new Article($_POST);

        $change = $ArticleManager->update($update, $idarticle);

        if($change){
            header("Location: ./");
        }else{
            $UtilM->deconnect();
        }
    }


}elseif(isset($_GET['delete'])&& ctype_digit($_GET['delete'])){
    $deleteId = (int) $_GET['delete'];

    $article = new Article(["idarticle"=>$deleteId]);

    $del = $ArticleManager->delete($article);
    if($del){
        header("Location: ./");
    }else{
        $UtilM->deconnect();
    }
    
    

} else {

    $idauthor = (int) $_SESSION['idauthor'];
    $recup = $ArticleManager->listauthor($idauthor);
    if (!$recup) {
        $affiche = "Vous n'avez pas encore écris d'articles";
    } else {
        foreach ($recup AS $item) {
            $affiche[] = new Article($item);
        }
    }

    require_once "View/Accueiladmin.view.php";
}