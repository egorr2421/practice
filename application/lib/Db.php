<?php
/**
 * Created by PhpStorm.
 * User: Egor
 * Date: 19.06.2018
 * Time: 15:50
 */

class Db
{
    protected $db;

    public function __construct()
    {
        $config = require "application/config/db.php";
        var_dump($config);
        $this->db = new PDO('mysql:dbname='.$config['name'].';host='.$config['host'].'',$config['user'],$config['pass']);
    }

    public function query($quety){
        //$this->db->prepare ("SELECT * FROM accounts")->bindValue (:);
    return $this->db->query ("SELECT * FROM accounts")->fetchAll (PDO::FETCH_ASSOC);

    }
}