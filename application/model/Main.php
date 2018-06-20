<?php

namespace application\model;

class Main extends \Model
{
    public function getUser(){
       return $this->db->query ("SELECT * FROM accounts");
    }
}