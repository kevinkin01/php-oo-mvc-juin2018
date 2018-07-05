
<ul>
    <li><a href="./">Web</a></li>
    <?php

    if (isset($_SESSION['monid']) && $_SESSION['monid'] == session_id()) {

        ?>
        <li><a href="?post">Ajouter un article</a></li>
        <li><a href="?deconnect">Déconnexion</a></li>
        <?php
    }else{

        ?>
        <li><a href="?login">Connexion</a></li>
        <?php
    }
    ?>
</ul>