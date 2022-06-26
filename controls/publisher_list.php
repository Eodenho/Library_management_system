<?php


include 'libraries/publishers.class.php';
$publisher = new publishers();

include 'utils/paging.class.php';
$paging = new paging(config::NUMBER_OF_ROWS_IN_PAGE);

$elementCount = $publisher->getPublisherListCount();

$paging->process($elementCount, $pageId);

$data = $publisher->getPublisherList($paging->size, $paging->first);

include 'templates/publisher_list.tpl.php';

?>