<?php


include 'libraries/contracts.class.php';
$contract = new contracts();

include 'utils/paging.class.php';
$paging = new paging(config::NUMBER_OF_ROWS_IN_PAGE);

$elementCount = $contract->getContractListCount();

$paging->process($elementCount, $pageId);

$data = $contract->getContractsList($paging->size, $paging->first);

include 'templates/contract_list.tpl.php';

?>