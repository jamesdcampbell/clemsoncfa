<?php

//Set Current Working Directory
chdir($_SERVER["DOCUMENT_ROOT"] . "/performance/includes");

error_reporting(E_ALL);
ini_set("display_errors", "1");

#Session
session_start();

if(isset($_SESSION["id"]))
{
	$id = $_SESSION["id"];
}

else
{
	header("location: /index.php");
	exit;
}

#Email
include "../../includes/email.php";

#PORM
include '../porm/porm.php';
$porm = new Porm();

#Include Classes
foreach(glob("../classes/*.php") as $class)
{
	include $class;
}

#Include Functions
foreach(glob("../includes/functions/*.php") as $func)
{
	include $func;
}

#Security

$user = $porm->get((int) $id, "CfaEmployee");

//Admin Level
if(strpos($_SERVER["REQUEST_URI"], "/admin/"))
{
	if($user->email != "vickijordancfa@gmail.com" and $user->email != "sheldonjuncker@gmail.com")
	{
		header("location: /index.php");
		exit;
	}
}

//Manager Level
if(strpos($_SERVER["REQUEST_URI"], "/manager/"))
{
	if($user->login != "true"  and $user->email != "sheldonjuncker@gmail.com")
	{
		header("location: /index.php");
		exit;
	}
}

//Employee Level
if(strpos($_SERVER["REQUEST_URI"], "/employee/"))
{
	if($user->login != "false" and $user->email != "sheldonjuncker@gmail.com")
	{
		header("location: /index.php");
		exit;
	}
}

?>