<?php

// include Imap_parser class
include_once('lib/Imap_parser.php');

// create Imap_parser Object
$email = new Imap_parser();

// data
$data = array(
	// email account
	'email' => array(
		'hostname' => '{imap.gmail.com:993/imap/ssl/novalidate-cert}INBOX',
		'username' => 'fjmiranda009@gmail.com',
		'password' => 'fjayala009'    
	),
	// inbox pagination
	'pagination' => array(
		'sort' => 'DESC', // or ASC
		'limit' => 10,
		'offset' => 0
	)
);

// get inbox. Array
$result = $email->inbox($data);

echo '<pre>';
print_r($result);
echo '</pre>';
