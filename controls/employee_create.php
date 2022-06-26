<?php

include 'libraries/employees.class.php';
$employee = new employees();

include 'libraries/contracts.class.php';
$contract = new contracts();

$formErrors = null;
$data = array();
$data['sutartys'] = array();

$required = array('vardas', 'pavarde','gimimo_data','elektroninis_pastas','lytis','fk_MIESTASnr');

if(!empty($_POST['submit'])){

    include 'utils/validator.class.php';

    $validations = array(
        'nr' => 'positivenumber',
        'vardas' => 'words',
        'pavarde' => 'words',
        'gimimo_data' => 'date',
        'elektroninis_pastas' => 'email',
        'lytis' => 'positivenumber',
        'fk_MIESTASnr' => 'positivenumber'
    );

    $validator = new validator($validations, $required);

    if($validator->validate($_POST)){

        if($_POST['gimimo_data'] > date("Y-m-d")){
            $_POST['gimimo_data'] = date("Y-m-d");
        }

        $employee->insertEmployee($_POST);

        $id = mysql::getLastInsertedId();



		if(isset($_POST['isdavimo_data']) && sizeof($_POST['isdavimo_data']) > 0) {
			foreach($_POST['isdavimo_data'] as $key => $val) {

                if($key > 0){

                    $data = array();
                    $data['contract_nr'] = $_POST['contract_nr'][$key];
                    $data['isdavimo_data'] = $_POST['isdavimo_data'][$key];
                    $data['grazinimo_data'] = $_POST['grazinimo_data'][$key];
                    $data['fk_SKAITYTOJASnr'] = $_POST['fk_SKAITYTOJASnr'][$key];
                    $data['fk_DARBUOTOJASnr'] = $id;
                    $data['fk_KNYGAnr'] = $_POST['fk_KNYGAnr'][$key];

                    if($data['isdavimo_data'] > date("Y-m-d")){
                        $data['isdavimo_data'] = date("Y-m-d");
                    }

                    $contract->insertContract($data);

                }
			}
		}

        common::redirect("index.php?module={$module}&action=list");
        die();
    } else{

        $formErrors = $validator->getErrorHTML();

        $data = $_POST;


        $data['sutartys'] = array();
}
}
array_unshift($data['sutartys'], array());

include 'templates/employee_form.tpl.php';

?>