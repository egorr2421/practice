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

    public function query($quety,$par = []){
        $st=$this->db->prepare ($quety);
        if(!empty($par)){
            foreach ($par as $key => $value)
            $st->bindValue (":".$key,$value);
            }
        if($st->execute()) {
            return $st->fetchAll (PDO::FETCH_ASSOC);
        }
        return false;
    }
}