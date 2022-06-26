<?php


include 'libraries/authors.class.php';
$author = new authors();

include 'utils/paging.class.php';
$paging = new paging(config::NUMBER_OF_ROWS_IN_PAGE);

$elementCount = $author->getAuthorsListCount();

$paging->process($elementCount, $pageId);

$data = $author->getAuthorList($paging->size, $paging->first);

include 'templates/author_list.tpl.php';

?>