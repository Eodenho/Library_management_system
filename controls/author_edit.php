<?php

include 'libraries/authors.class.php';
$author = new authors();

$formErrors = null;
$data = array();

$required = array('vardas', 'pavarde','gimimo_data','lytis','salis');

if(!empty($_POST['submit'])){

    include 'utils/validator.class.php';

    $validations = array(
        'nr' => 'positivenumber',
        'vardas' => 'words',
        'pavarde' => 'words',
        'gimimo_data' => 'date',
        'elektroninis_pastas' => 'email',
        'lytis' => 'positivenumber',
        'salis' => 'positivenumber'
    );

    $validator = new validator($validations, $required);

    if($validator->validate($_POST)){
        
        $author->updateAuthor($_POST);

        common::redirect("index.php?module={$module}&action=list");
        die();
    } else{
        $formErrors = $validator->getErrorHTML();

        $data = $_POST;
    }
} else{

    $data = $author->getAuthor($id);
}

$data['editing'] = 1;

include 'templates/author_form.tpl.php'

?>