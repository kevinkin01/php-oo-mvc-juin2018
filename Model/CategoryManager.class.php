<?php

class CategoryManager
{
 private $db;

 public function __construct(PDO $PDO)
 {
     $this->db=$PDO;
 }

    public function Categlist(int $idcategory){

        $get = $this->db->query("SELECT a.*,
          u.idauthor,u.thelogin,u.thename, c.thecategtitle, c.idcategory
          FROM article a INNER JOIN author u 
            ON a.authoridauthor = u.idauthor INNER JOIN category c ON a.categoryidcategory = c.idcategory
          WHERE c.idcategory =$idcategory;");


        if($get->rowCount()){


            return $get->fetchAll(PDO::FETCH_ASSOC);

        }else{

            return false;
        }
    }
}