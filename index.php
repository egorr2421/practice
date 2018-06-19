<?php
require_once "application/lib/include.php";
$obj = new Router();
$obj->run ();
$db = new Db();

echo "<br>";
var_dump ($db->query("asd")[0]);
?>