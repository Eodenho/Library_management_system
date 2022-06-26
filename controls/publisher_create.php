<?php

include 'libraries/publishers.class.php';
$publisher = new publishers();

include 'libraries/books.class.php';
$book = new books();

$formErrors = null;
$data = array();
$data['knygos'] = array();

$required = array('pavadinimas','salis','fk_MIESTASnr');

if(!empty($_POST['submit'])){

    include 'utils/validator.class.php';

    $validations = array(
        'nr' => 'positivenumber',
        'pavadinimas' => 'words',
        'salis' => 'positivenumber',
        'fk_MIESTASnr' => 'positivenumber'
    );

    $validator = new validator($validations, $required);

    if($validator->validate($_POST)){

        $publisher->insertPublisher($_POST);


        $id = mysql::getLastInsertedId();



		if(isset($_POST['knygos_pavadinimas']) && sizeof($_POST['knygos_pavadinimas']) > 0) {
			foreach($_POST['knygos_pavadinimas'] as $key => $val) {

                if($key > 0){

                    $data = array();
                    $data['book_nr'] = $_POST['book_nr'][$key];
                    $data['knygos_pavadinimas'] = $_POST['knygos_pavadinimas'][$key];
                    $data['isleidimo_data'] = $_POST['isleidimo_data'][$key];
                    $data['fk_KALBAnr'] = $_POST['fk_KALBAnr'][$key];
                    $data['fk_ZANRASnr'] = $_POST['fk_ZANRASnr'][$key];
                    $data['fk_AUTORIUSnr'] = $_POST['fk_AUTORIUSnr'][$key];
					$data['fk_LEIDYKLAnr'] = $id;

                    $book->insertBook($data);
                }
			}
		}

        common::redirect("index.php?module={$module}&action=list");
        die();
    } else{

        $formErrors = $validator->getErrorHTML();

        $data = $_POST;


        $data['knygos'] = array();
}
}
array_unshift($data['knygos'], array());

include 'templates/publisher_form.tpl.php';

?>