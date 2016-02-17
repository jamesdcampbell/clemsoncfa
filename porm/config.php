<?php

/*
	Porm's Config File
*/

$porm = [
	//Connection Info
	'pdo_string' => 'mysql:host=localhost;',
	"user" => 'root',
	'pass' => '',
	
	//Database Mappings
	'dbs' => [
		//Database Name
		'mypoints' => [
			//Class => Table Name
			'Customer' => 'customer',
			'Merchant' => 'merchant',
			'Punchcard' => 'punchcard',
			'Referred' => 'referred',
			'Purchase' => 'purchase'
		],
	],
	
	//Default Database
	'default_db' => 'mypoints',
];

?>
