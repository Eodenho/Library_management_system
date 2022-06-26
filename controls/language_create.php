<?php

include 'libraries/languages.class.php';
$language = new languages();

$formErrors = null;
$data = array();

$required = array('pavadinimas', 'sutrumpinimas');

if(!empty($_POST['submit'])){

    include 'utils/validator.class.php';

    $validations = array(
        'nr' => 'positivenumber',
        'pavadinimas' => 'words',
        'sutrumpinimas' => 'words'
    );

    $validator = new validator($validations, $required);

    if($validator->validate($_POST)){

        $language->insertLanguage($_POST);

        common::redirect("index.php?module={$module}&action=list");
        die();
    } else{

        $formErrors = $validator->getErrorHTML();

        $data = $_POST;
}
}

include 'templates/language_form.tpl.php';

?>