<?php
require_once "application/lib/include.php";
$obj = new Router();
$obj->run ();
$db = new Db();
echo "<br>";


foreach ($db->query("SELECT * FROM accounts WHERE id = :id or id = :id2",["id"=>3,"id2"=>1]) as $value){
    echo "<br>";
    var_dump ($value);
}

?>