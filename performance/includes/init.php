<?php

session_start();
$id = isset($_SESSION["id"]) ? $_SESSION["id"] : exit("Not logged in!");

#PORM
include '../porm/porm.php';
$porm = new Porm();

#Include Classes
foreach(glob("../classes/*.php") as $class)
{
	include $class;
}

?>