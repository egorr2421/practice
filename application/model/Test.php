<?php
/**
 * Created by PhpStorm.
 * User: Egor
 * Date: 21.06.2018
 * Time: 21:53
 */

namespace application\model;


class Test extends \Model
{
    public function getUser(){
        return $this->db->query ("SELECT * FROM accounts");
    }
}