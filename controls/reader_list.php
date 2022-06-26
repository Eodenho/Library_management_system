<?php


include 'libraries/readers.class.php';
$reader = new readers();

include 'utils/paging.class.php';
$paging = new paging(config::NUMBER_OF_ROWS_IN_PAGE);

$elementCount = $reader->getReaderListCount();

$paging->process($elementCount, $pageId);

$data = $reader->getReaderList($paging->size, $paging->first);

include 'templates/reader_list.tpl.php';

?>