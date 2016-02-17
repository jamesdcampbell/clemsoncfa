<?php

session_start();
$id = isset($_SESSION["id"]) ? $_SESSION["id"] : exit("Not logged in!");

#Database Stuff (Replaced by Porm)
include '../../includes/dbConnections.php';

#PORM
include '../porm/porm.php';
$porm = new Porm();

#PORM Classes
include '../classes/CfaQuestion.php';
include '../classes/CfaEmployee.php';
include '../classes/CfaReview.php';
include '../classes/CfaAnswer.php';

?>