<?php

namespace application\model;

class Main extends \Model
{
    public function getUser(){
       return $this->db->query ("SELECT * FROM accounts");
    }
    public function getLastNews(){
        return $this->db->query ("SELECT * FROM `news` ORDER BY Date_cr DESC LIMIT 10 ");
    }
}