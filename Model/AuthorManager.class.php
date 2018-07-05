<?php
/**
 * Created by PhpStorm.
 * User: kevin.kinanga
 * Date: 27/06/2018
 * Time: 11:57
 */

class AuthorManager
{
    private $db;

    public function __construct(PDO $PDO)
    {
        $this->db = $PDO;
    }

    public function identAuthor (Author $author){
        $sql ="SELECT * FROM author WHERE thelogin=? AND thepwd=?";
        $recup = $this->db->prepare($sql);
        $recup->bindValue(1,$author->getThelogin(),PDO::PARAM_STR);
        $recup->bindValue(2,$author->getThepwd(),PDO::PARAM_STR);

        $recup->execute();
        if (!$recup->rowCount()){
            return false;
        }else {
            $this->createSession($recup->fetch(PDO::FETCH_ASSOC));
            return true;
        }
    }

    private function createSession (array $datas){
        $_SESSION = $datas;
        $_SESSION['monid'] = session_id();
    }
    public function deconnect()
    {
        $_SESSION = array();

        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000,
                $params["path"], $params["domain"],
                $params["secure"], $params["httponly"]
            );
        }
        session_destroy();

        header("Location: ./");
    }

}