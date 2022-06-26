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
        $data = $_POST;
        
        $employee->updateEmployee($_POST);

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

                    if($data['contract_nr'] == ''){
                        
                        $contract->insertContract($data);
                    } else{
                        $contract->updateContract($data);
                    }
    
                }
			}
		}
        common::redirect("index.php?module={$module}&action=list");
        die();
    } else{

        $formErrors = $validator->getErrorHTML();

        $data = $_POST;

        if(isset($_POST['isdavimo_data'])) {
			$i = 0;
			foreach($_POST['isdavimo_data'] as $key => $val) {
				
				$data['sutartys'][$i]['contract_nr'] = $_POST['contract_nr'][$key];
				$data['sutartys'][$i]['isdavimo_data'] = $_POST['isdavimo_data'][$key];
				$data['sutartys'][$i]['grazinimo_data'] = $_POST['grazinimo_data'][$key];
				$data['sutartys'][$i]['fk_SKAITYTOJASnr'] = $_POST['fk_SKAITYTOJASnr'][$key];
                $data['sutartys'][$i]['fk_DARBUOTOJASnr'] = $_POST['fk_DARBUOTOJASnr'][$key];
                $data['sutartys'][$i]['fk_KNYGAnr'] = $_POST['fk_KNYGAnr'][$key];

				$i++;
			}
		}
        $data['sutartys'] = array();
    }
} else{

    $data = $employee->getEmployee($id);

    $data['sutartys'] = $contract->getEmployee($id);

    array_unshift($data['sutartys'], array());
}

$data['editing'] = 1;

include 'templates/employee_form.tpl.php'

?>