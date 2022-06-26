<?php

    $breadcrumbItems = array(array('link' => 'index.php', 'title' => 'Start'), array('title' => 'Hosts'));

    include 'templates/common/breadcrumb.tpl.php';

?>

<div class="d-flex flex-row-reverse gap-3">
	<a href='index.php?module=<?php echo $module; ?>&action=create'>New Contract</a>
</div>

<table class="table">
    <tr>
        <th>Isdavimo_data</th>
        <th>Grazinimo data</th>
        <th>Skaitytojas</th>
        <th>Darbuotojas</th>
        <th>Knyga</th>
        <th></th>
    </tr>
    <?php

        foreach($data as $key => $val){
            echo 
                "<tr>"
                    . "<td>{$val['isdavimo_data']}</td>"
                    . "<td>{$val['grazinimo_data']}</td>"
                    . "<td>{$val['skaitvardas']} {$val['skaitpavarde']}</td>"
                    . "<td>{$val['darbvardas']} {$val['darbpavarde']}</td>"
                    . "<td>{$val['pavadinimas']}</td>"
                    . "<td class='d-flex flex-row-reverse gap-2'>"
                        . "<a href='index.php?module={$module}&action=edit&id={$val['nr']}'>Edit</a>"
                        . "<a href='#' onclick='showConfirmDialog(\"{$module}\", \"{$val['nr']}\"); return false;'>Remove</a>"
                    . "</td>";
        }
    ?>
</table>

<?php

include 'templates/common/paging.tpl.php';

?>