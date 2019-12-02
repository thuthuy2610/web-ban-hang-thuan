<?php require_once __DIR__. "/autoload/autoload.php";
	$key = intval(getInput("key"));
	$qty = intval(getInput("qty"));

	$_SESSION['card'][$key]['qty'] = $qty;

	echo 1;
?>