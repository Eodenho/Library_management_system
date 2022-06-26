<?php

include 'libraries/publishers.class.php';
$publisher = new publishers();

if(!empty($id)) {

	$publisher->deletePublisher($id);

	common::redirect("index.php?module={$module}&action=list");
	die();
}

?>