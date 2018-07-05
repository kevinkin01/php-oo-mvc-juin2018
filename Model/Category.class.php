<?php
/**
 * Created by PhpStorm.
 * User: kevin.kinanga
 * Date: 27/06/2018
 * Time: 11:05
 */

class Category
{
    private $idcategory,$thecategtitle;

    private function __construct(array $datas)
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


    public function setIdcategory($idcategory)
    {
        $this->idcategory = (int)$idcategory;
    }


    public function setThecategtitle(string $thecategtitle)
    {
        $data = trim(htmlspecialchars(strip_tags($thecategtitle),ENT_QUOTES));
        if (!empty($data)) {
            $this->thecategtitle = $data;
        }
    }


    public function getIdcategory()
    {
        return $this->idcategory;
    }


    public function getThecategtitle()
    {
        return html_entity_decode($this->thecategtitle);
    }


}