<?php

include 'libraries/authors.class.php';
$author = new authors();

if(!empty($id)) {

	$author->deleteAuthor($id);

	common::redirect("index.php?module={$module}&action=list");
	die();
}

?>