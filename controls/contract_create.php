<?php

include 'libraries/contracts.class.php';
$contract = new contracts();

$formErrors = null;
$data = array();

$required = array('isdavimo_data', 'grazinimo_data','fk_SKAITYTOJASnr','fk_DARBUOTOJASnr','fk_KNYGAnr');

if(!empty($_POST['submit'])){

    include 'utils/validator.class.php';

    $validations = array(
        'nr' => 'positivenumber',
        'isdavimo_data' => 'date',
        'grazinimo_data' => 'date',
        'fk_SKAITYTOJASnr' => 'positivenumber',
        'fk_DARBUOTOJASnr' => 'positivenumber',
        'fk_KNYGAnr' => 'positivenumber',
    );

    $validator = new validator($validations, $required);

    if($validator->validate($_POST)){
        if($_POST['isdavimo_data'] > date("Y-m-d")){
            $_POST['isdavimo_data'] = date("Y-m-d");
        }

        $contract->insertContract($_POST);

        common::redirect("index.php?module={$module}&action=list");
        die();
    } else{

        $formErrors = $validator->getErrorHTML();

        $data = $_POST;
}
}

include 'templates/contract_form.tpl.php';

?>