<?php

include 'libraries/readers.class.php';
$reader = new readers();

if(!empty($id)) {

	$reader->deleteReader($id);

	common::redirect("index.php?module={$module}&action=list");
	die();
}

?>