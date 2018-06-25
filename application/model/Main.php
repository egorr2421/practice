<?php

namespace application\model;

class Main extends \Model
{
    public function getUser(){
       return $this->db->query ("SELECT * FROM accounts");
    }
    public function addView($id){
        return $this->db->query ("UPDATE `news` SET `veiw`=`veiw`+1 WHERE id=$id");
    }
    public function getLastNews(){
        return $this->db->query ("SELECT * FROM `news` ORDER BY Date_cr DESC LIMIT 10 ");
    }
    public function getTopNews(){
        return $this->db->query ("SELECT * FROM `news` ORDER BY veiw DESC LIMIT 10 ");
    }
    public function getCategory(){
        return $this->db->query ("SELECT * FROM `category` ORDER BY name  ");
    }
    public function getNewsForCat($id){
        return $this->db->query ("SELECT * FROM `news` WHERE id_cat = (SELECT id FROM category WHERE id=$id)");
    }
    public function getNews($id){
        return $this->db->query ("SELECT * FROM `news` WHERE id=$id");
    }
}