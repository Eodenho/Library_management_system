<?php

include 'libraries/contracts.class.php';
$contract = new contracts();

if(!empty($id)) {

	$contract->deleteContract($id);

	common::redirect("index.php?module={$module}&action=list");
	die();
}

?>