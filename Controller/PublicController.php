<?php

$ArticleM = new ArticleManager($pdo);

$UtilM = new AuthorManager($pdo);

$CategM = new CategoryManager($pdo);

if(isset($_GET['login'])) {

    if(empty($_POST)){
        require_once "View/connexion.view.php";
    }else{

        $ident = new Author($_POST);


        $connect = $UtilM->identAuthor($ident);

        if($connect){
            header("Location: ./");
        }else{


            $error = "Login et/ou mot de passe incorrect";
            require_once "View/connexion.view.php";
        }

    }

}elseif (isset($_GET['detail'])&&ctype_digit($_GET['detail'])){

    $idArticle = (int) $_GET['detail'];


    $recup = $ArticleM->detail($idArticle);

    if(!$recup){
        $oneView = "Article supprimé ou non existant";
    }else{
        $oneView = new Article($recup);
    }

    require_once "View/detail.view.php";


# aaa031 create routing homepage
} elseif(isset($_GET['categ'])&&ctype_digit($_GET['categ'])){
        $recup = $CategM->Categlist($_GET['categ']);
        if($recup){

            # aaa052 list and create table with object Article
            foreach ($recup as $item){
                $listcateg[] = new Article($item);
            }
        }else{ // if false
            $listcateg = "Il n'y a pas de categorie à ce nom !";
        }
    }else {
        $recup = $ArticleM->listArticle();

        // if 1 or more article(s)
        if($recup){

            # aaa052 list and create table with object Article
            foreach ($recup as $item){
                $list[] = new Article($item);
            }
        }else{ // if false
            $list = "Il n'y a pas encore d'article.";
        }
        //require_once "View/Accueil.view.php";
    }
    require_once "View/Accueil.view.php";

