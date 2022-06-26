<?php

include 'libraries/employees.class.php';
$employee = new employees();

if(!empty($id)) {

	$employee->deleteEmployee($id);

	common::redirect("index.php?module={$module}&action=list");
	die();
}

?>