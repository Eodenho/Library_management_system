<?php

include 'libraries/contracts.class.php';
$contract = new contracts();

$formErrors = null;
$fields = array();

$required = array();

$data = array();
if(empty($_POST['submit'])) {
	// rodome ataskaitos parametrų įvedimo formą
	include 'templates/contract_report_form.tpl.php';
} else {
	// nustatome laukų validatorių tipus
	$validations = array (
        
		'dateFrom' => 'date',
		'dateTill' => 'date'
	);

	// sukuriame validatoriaus objektą
	include 'utils/validator.class.php';
	$validator = new validator($validations, $required);

	if($validator->validate($_POST)) {
		// išrenkame ataskaitos duomenis
		$contractData = $contract->getContractsByEmployee($_POST['dateFrom'], $_POST['dateTill'], $_POST['nr'],$_POST['book_nr']);
		$countOfContracts = $contract->getCountOfContractsByEmployees($_POST['dateFrom'], $_POST['dateTill'], $_POST['nr'],$_POST['book_nr']);
		$maxCount = $contract->getMaxCountOfDays($_POST['dateFrom'], $_POST['dateTill'], $_POST['nr'],$_POST['book_nr']);
		
		// perduodame datos filtro reikšmes į šabloną
        $data['nr'] = $_POST['nr'];
		$data['book_nr'] = $_POST['book_nr'];
		$data['dateFrom'] = $_POST['dateFrom'];
		$data['dateTill'] = $_POST['dateTill'];
		
		// rodome ataskaitą
	
		include 'templates/contract_report_show.tpl.php';
	} else {
		// gauname klaidų pranešimą
		$formErrors = $validator->getErrorHTML();
		// gauname įvestus laukus
		$fields = $_POST;

		// rodome ataskaitos parametrų įvedimo formą su klaidomis
		include 'templates/contract_report_form.tpl.php';
	}
}