<?php

    $breadcrumbItems = array(array('link' => 'index.php', 'title' => 'Start'), array('title' => 'Hosts'));

    include 'templates/common/breadcrumb.tpl.php';

?>

<div class="d-flex flex-row-reverse gap-3">
	<a href='index.php?module=<?php echo $module; ?>&action=create'>New employee</a>
</div>

<table class="table">
    <tr>
        <th>Vardas</th>
        <th>Pavarde</th>
        <th>Gimimo data</th>
        <th>Elektroninis pastas</th>
        <th>Lytis</th>
        <th>Miestas</th>
        <th></th>
    </tr>
    <?php

        foreach($data as $key => $val){
            echo 
                "<tr>"
                    . "<td>{$val['vardas']}</td>"
                    . "<td>{$val['pavarde']}</td>"
                    . "<td>{$val['gimimo_data']}</td>"
                    . "<td>{$val['elektroninis_pastas']}</td>"
                    . "<td>{$val['name']}</td>"
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