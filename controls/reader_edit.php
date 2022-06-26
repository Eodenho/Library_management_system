<?php

include 'libraries/readers.class.php';
$reader = new readers();

$formErrors = null;
$data = array();

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
        
        $reader->updateReader($_POST);

        common::redirect("index.php?module={$module}&action=list");
        die();
    } else{
        $formErrors = $validator->getErrorHTML();

        $data = $_POST;
    }
} else{

    $data = $reader->getReader($id);
}

$data['editing'] = 1;

include 'templates/reader_form.tpl.php'

?>