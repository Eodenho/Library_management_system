<?php


include 'libraries/books.class.php';
$book = new books();

include 'utils/paging.class.php';
$paging = new paging(config::NUMBER_OF_ROWS_IN_PAGE);

$elementCount = $book->getBooksListCount();

$paging->process($elementCount, $pageId);

$data = $book->getBooksList($paging->size, $paging->first);

include 'templates/book_list.tpl.php';

?>