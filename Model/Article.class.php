<?php
/**
 * Created by PhpStorm.
 * User: kevin.kinanga
 * Date: 27/06/2018
 * Time: 11:04
 */

class Article
{
    private $idarticle,$thetitle,$thetext,$thedate,$authoridauthor,$categoryidcategory;

    private $idauthor,$thelogin,$thename;

    private $idcategory,$thecategtitle;

    public function __construct(array $datas)
    {
        $this->hydrate($datas);
    }
    private function hydrate(Array $theDatas){
        foreach ($theDatas as $thekey => $thevalue){
            $createNameSetter = "set".ucfirst($thekey);
            if(method_exists($this,$createNameSetter)){
                $this->$createNameSetter($thevalue);
            }
        }
    }


    public function setIdarticle($idarticle)
    {
        $this->idarticle = (int)$idarticle;
    }


    public function setThetitle(string $thetitle)
    {
        $data =trim(htmlspecialchars(strip_tags($thetitle),ENT_QUOTES));
        if (!empty($data)) {
            $this->thetitle = $data;
        }
    }

    public function setThetext(string $thetext)
    {
        $data =trim(htmlspecialchars(strip_tags($thetext),ENT_QUOTES));
        if (!empty($data)) {
            $this->thetext = $data;
        }
    }


    public function setThedate($thedate)
    {
        if(!empty($thedate)) {

            preg_match("/^(\d{4})-([0]\d|[1][0-2])\-([0-2]\d|[3][0-1]) ([0-1]\d|[2][0-3]):([0-5][0-9]):([0-5][0-9])/",$thedate,$sort);
            if(!empty($sort)){
                $this->thedate = $thedate;
            }else{
                $this->thedate = date("Y-m-d H:i:s");
            }
        }else{
            $this->thedate = date("Y-m-d H:i:s");
        }
    }



    public function setAuthoridauthor($authoridauthor)
    {
        $this->authoridauthor = (int)$authoridauthor;
    }


    public function setCategoryidcategory($categoryidcategory): void
    {
        $this->categoryidcategory = (int)$categoryidcategory;
    }


    public function setIdauthor($idauthor)
    {
        $this->idauthor = (int)$idauthor;
    }

    public function setThelogin(string $thelogin): void
    {
        $data = trim(htmlspecialchars(strip_tags($thelogin)),ENT_QUOTES);
        if(!empty($data)) {
            $this->thelogin=$data;
        }
    }


    public function setThename(string $thename)

    {
        $data = trim(htmlspecialchars(strip_tags($thename)),ENT_QUOTES);
        if(!empty($data)) {
            $this->thename=$data;
        }
    }


    public function setIdcategory($idcategory)
    {
        $this->idcategory = (int)$idcategory;
    }


    public function setThecategtitle(string $thecategtitle)
    {
        $data =trim(htmlspecialchars(strip_tags($thecategtitle)),ENT_QUOTES);
        if (!empty($data)) {
            $this->thecategtitle = $data;
        }
    }




    public function getIdarticle()
    {
        return $this->idarticle;
    }


    public function getThetitle()
    {
        return html_entity_decode($this->thetitle);
    }


    public function getThetext()
    {
        return html_entity_decode($this->thetext);
    }


    public function getThedate()
    {
        return $this->thedate;
    }


    public function getAuthoridauthor()
    {
        return $this->authoridauthor;
    }


    public function getCategoryidcategory()
    {
        return $this->categoryidcategory;
    }


    public function getIdauthor()
    {
        return $this->idauthor;
    }


    public function getThelogin()
    {
        return html_entity_decode($this->thelogin);
    }


    public function getThename()
    {
        return html_entity_decode($this->thename);
    }


    public function getIdcategory()
    {
        return $this->idcategory;
    }

    /**
     * @return mixed
     */
    public function getThecategtitle()
    {
        return html_entity_decode($this->thecategtitle);
    }



}