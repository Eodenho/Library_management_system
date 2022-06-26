<?php
	// suformuojame puslapių kelio (breadcrumb) elementų masyvą
	$breadcrumbItems = array(array('link' => 'index.php', 'title' => 'Pradžia'), array('link' => "index.php?module=report&action=list", 'title' => "Ataskaitos"), array("title" => "Sutarčių ataskaita"));
	
	// puslapių kelio šabloną
	include 'templates/common/breadcrumb.tpl.php';
?>

<?php if($formErrors != null) { ?>
	<div class="alert alert-danger" role="alert">
		Neįvesti arba neteisingai įvesti šie laukai:
		<?php 
			echo $formErrors;
		?>
	</div>
<?php } ?>

<form action="" method="post" class="d-grid gap-3">
		<label for="nr">Pasirinkite darbuotoją<?php echo in_array('nr', $required) ? '<span> *</span>' : ''; ?></label>
		<select id="nr" name="nr" class="form-select form-control">
			<option value="">---------------</option>
			<?php
				$employee = $contract->getEmployeeList();
				foreach($employee as $key => $val) {

                    $selected = "";
                    if(isset($data['nr']) && $data['nr'] == $val['nr']) {
                        $selected = " selected='selected'";
                    }
                    echo "<option{$selected} value='{$val['nr']}'>{$val['vardas']} {$val['pavarde']}</option>";
				}
			?>
		</select>

		<label for="book_nr">Pasirinkite knygą<?php echo in_array('book_nr', $required) ? '<span> *</span>' : ''; ?></label>
		<select id="book_nr" name="book_nr" class="form-select form-control">
			<option value="">---------------</option>
			<?php
				$book = $contract->getBooks();
				foreach($book as $key => $val) {

                    $selected = "";
                    if(isset($data['book_nr']) && $data['book_nr'] == $val['book_nr']) {
                        $selected = " selected='selected'";
                    }
                    echo "<option{$selected} value='{$val['book_nr']}'>{$val['knygos_pav']}</option>";
				}
			?>
		</select>

	<div class="form-group">
		<label for="dateFrom">Sutartys sudarytos nuo</label>
		<input type="text" id="dateFrom" name="dateFrom" class="form-control datepicker" value="<?php echo isset($data['dateFrom']) ? $data['dateFrom'] : ''; ?>">
	</div>
	
	<div class="form-group">
		<label for="dateTill">Sutartys sudarytos iki</label>
		<input type="text" id="dateTill" name="dateTill" class="form-control datepicker" value="<?php echo isset($data['dateTill']) ? $data['dateTill'] : ''; ?>">
	</div>

	<p class="required-note">* pažymėtus laukus užpildyti privaloma</p>

	<input type="submit" class="btn btn-primary w-25" name="submit" value="Sudaryti ataskaitą">
</form>