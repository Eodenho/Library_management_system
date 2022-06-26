<?php

    $breadcrumbItems = array(array('link' => 'index.php', 'title' => 'Start'), array('title' => 'Hosts'));

    include 'templates/common/breadcrumb.tpl.php';

?>

<div class="d-flex flex-row-reverse gap-3">
	<a href='index.php?module=<?php echo $module; ?>&action=create'>New book</a>
</div>

<table class="table">
    <tr>
        <th>Pavadinimas</th>
        <th>Isleidimo data</th>
        <th>Kalba</th>
        <th>Zanras</th>
        <th>Autorius</th>
        <th>Leidykla</th>
        <th></th>
    </tr>
    <?php

        foreach($data as $key => $val){
            echo 
                "<tr>"
                    . "<td>{$val['pavadinimas']}</td>"
                    . "<td>{$val['isleidimo_data']}</td>"
                    . "<td>{$val['kalba']}</td>"
                    . "<td>{$val['zanras']}</td>"
                    . "<td>{$val['vardas']} {$val['pavarde']}</td>"
                    . "<td>{$val['leidykla']}</td>"
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