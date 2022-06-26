<?php


include 'libraries/employees.class.php';
$employee = new employees();

include 'utils/paging.class.php';
$paging = new paging(config::NUMBER_OF_ROWS_IN_PAGE);

$elementCount = $employee->getEmployeeListCount();

$paging->process($elementCount, $pageId);

$data = $employee->getEmployeeList($paging->size, $paging->first);

include 'templates/employee_list.tpl.php';

?>