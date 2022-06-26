<?php


include 'libraries/languages.class.php';
$language = new languages();

include 'utils/paging.class.php';
$paging = new paging(config::NUMBER_OF_ROWS_IN_PAGE);

$elementCount = $language->getLanguageListCount();

$paging->process($elementCount, $pageId);

$data = $language->getLanguageList($paging->size, $paging->first);

include 'templates/language_list.tpl.php';

?>