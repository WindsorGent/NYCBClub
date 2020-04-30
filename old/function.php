<?php


	require_once('MySQL.php');
	
	$db = new MySQL('localhost', 'bingo', 'bingobingo');

    $db->db_connect('bingo');
    
    session_start();
