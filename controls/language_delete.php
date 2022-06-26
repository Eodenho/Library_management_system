<?php

include 'libraries/languages.class.php';
$language = new languages();

if(!empty($id)) {

	$language->deleteLanguage($id);

	common::redirect("index.php?module={$module}&action=list");
	die();
}

?>