<?php

/*
	Porm's Config File
*/

$porm_config = [
	//Connection Info
	'pdo_string' => 'mysql:host=localhost;',
	"user" => 'root',
	'pass' => '',
	
	//Database Mappings
	'dbs' => [
		//Database Name
		'_cfa' => [
			//Class => Table Name
			'CfaEmployee' => 'teammemberinfo',
			'CfaQuestion' => 'p_question',
			'CfaComment' => 'p_comment',
			'CfaReview' => 'p_review',
			'CfaAnswer' => 'p_answer'
		],
	],
	
	//Default Database
	'default_db' => '_cfa',
];

?>
