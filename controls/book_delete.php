<?php

include 'libraries/books.class.php';
$book = new books();

if(!empty($id)) {

	$book->deleteBook($id);

	common::redirect("index.php?module={$module}&action=list");
	die();
}

?>