<?php

include 'libraries/books.class.php';
$book = new books();

$formErrors = null;
$data = array();

$required = array('pavadinimas','isleidimo_data','fk_KALBAnr','fk_ZANRASnr','fk_AUTORIUSnr','fk_LEIDYKLAnr');

if(!empty($_POST['submit'])){

    include 'utils/validator.class.php';

    $validations = array(
        'nr' => 'positivenumber',
        'pavadinimas' => 'words',
        'isleidimo_data' => 'date',
        'fk_KALBAnr' => 'positivenumber',
        'fk_ZANRASnr' => 'positivenumber',
        'fk_AUTORIUSnr' => 'positivenumber',
        'fk_LEIDYKLAnr' => 'positivenumber'
    );

    $validator = new validator($validations, $required);

    if($validator->validate($_POST)){
        

        $book->insertBook($_POST);

        common::redirect("index.php?module={$module}&action=list");
        die();
    } else{

        $formErrors = $validator->getErrorHTML();

        $data = $_POST;
}
}

include 'templates/book_form.tpl.php';

?>