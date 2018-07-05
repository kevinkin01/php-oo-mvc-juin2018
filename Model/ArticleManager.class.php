<?php

class ArticleManager
{
    private $db;

    public function __construct(PDO $connect)
    {

        $this->db = $connect;
    }

    public function listArticle(){


        $get = $this->db->query("SELECT a.*,
          u.idauthor,u.thelogin,u.thename, c.thecategtitle, c.idcategory
          FROM article a INNER JOIN author u 
            ON a.authoridauthor = u.idauthor INNER JOIN category c ON a.categoryidcategory = c.idcategory
          ORDER BY a.thedate DESC;");


        if($get->rowCount()){


            return $get->fetchAll(PDO::FETCH_ASSOC);

        }else{

            return false;
        }
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

    public function detail(int $idarticle){
        $sql = "SELECT a.thetitle,a.thetext,a.thedate,
          u.idauthor,u.thelogin,u.thename,c.idcategory,c.thecategtitle 
          FROM article a INNER JOIN author u 
            ON a.authoridauthor = u.idauthor INNER JOIN category c ON a.categoryidcategory = c.idcategory
          WHERE a.idarticle=?";
        $request = $this->db->prepare($sql);
        $request->bindValue(1,$idarticle,PDO::PARAM_INT);
        $request->execute();
        if($request->rowCount()){
            return $request->fetch(PDO::FETCH_ASSOC);
        }else{
            return false;
        }
    }


    public function listauthor(int $idauthor){

        $get = $this->db->query("SELECT a.*,
          u.idauthor,u.thelogin,u.thename, c.idcategory,c.thecategtitle
          FROM article a INNER JOIN author u 
            ON a.authoridauthor = u.idauthor INNER JOIN category c ON a.categoryidcategory = c.idcategory
          WHERE u.idauthor = $idauthor
          ORDER BY a.thedate DESC;");


        if($get->rowCount()){


            return $get->fetchAll(PDO::FETCH_ASSOC);

        }else{

            return false;
        }
    }


    public function create(Article $datas){

        if($datas->getAuthoridauthor()==$_SESSION['idauthor']){

            $sql = "INSERT INTO article (thetitle,thetext,thedate,authoridauthor,categoryidcategory) VALUES (?,?,?,?,?)";

            $post = $this->db->prepare($sql);

            $post->bindValue(1,$datas->getThetitle(),PDO::PARAM_STR);
            $post->bindValue(2,$datas->getThetext(),PDO::PARAM_STR);
            $post->bindValue(3,$datas->getThedate(),PDO::PARAM_STR);
            $post->bindValue(4,$datas->getAuthoridauthor(),PDO::PARAM_INT);
            $post->bindValue(5,$datas->getCategoryidcategory(),PDO::PARAM_INT);

            $post->execute();

            if($post->rowCount()){
                return true;
            }
            return false;
        }else{
            return false;
        }
    }
    

    public function update(Article $newDatas, int $getIdArticle){
       

        if($newDatas->getAuthoridauthor()==$_SESSION['idauthor']){

            if($newDatas->getIdarticle()==$getIdArticle){

                $sql = "UPDATE article SET thetitle=?, thetext=?, thedate=?, categoryidcategory=?  WHERE idarticle=?";
                $update = $this->db->prepare($sql);

                $update->execute(
                        [
                            $newDatas->getThetitle(),
                            $newDatas->getThetext(),
                            $newDatas->getThedate(),
                            $newDatas->getCategoryidcategory(),
                            $newDatas->getIdarticle(),
                        ]);

                if($update->rowCount()){
                    return true;
                }else{
                    return false;
                }
                
            }else{
                return false;
            }
        }else{
            return false;
        }
    }
    

    public function delete(Article $id){

        $sql = "DELETE FROM article WHERE idarticle=? AND authoridauthor=?";
        $del = $this->db->prepare($sql);
        $del->bindValue(1, $id->getIdarticle(),PDO::PARAM_INT);
        # aaa130 permission user to delete his article
        $del->bindValue(2, $_SESSION['idauthor'],PDO::PARAM_INT);
        $del->execute();
        if($del->rowCount()){
            return true;
        }else{
            return false;
        }
    }

    public function detailadmin(int $idarticle){
        $sql = "SELECT a.thetitle,a.thetext,a.thedate,a.idarticle,
          u.idauthor,c.idcategory,c.thecategtitle 
          FROM article a INNER JOIN author u 
            ON a.authoridauthor = u.idauthor INNER JOIN category c ON a.categoryidcategory = c.idcategory
          WHERE a.idarticle=?";
        $request = $this->db->prepare($sql);
        $request->bindValue(1,$idarticle,PDO::PARAM_INT);
        $request->execute();
        if($request->rowCount()){
            return $request->fetch(PDO::FETCH_ASSOC);
        }else{
            return false;
        }
    }

}