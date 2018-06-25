<?php
session_start ();
require_once "application/lib/include.php";


//session_destroy ();
$obj = new Router();
$obj->run ();
?>