<nav aria-label="breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="index.php">Start</a></li>
		<li class="breadcrumb-item" aria-current="page"><a href="index.php?module=<?php echo $module; ?>&action=list">Books</a></li>
		<li class="breadcrumb-item active" aria-current="page"><?php if(!empty($id)) echo "Book edit"; else echo "New book"; ?></li>
	</ol>
</nav>

<?php if($formErrors != null) { ?>
	<div class="alert alert-danger" role="alert">
		Errors on fields:
		<?php 
			echo $formErrors;
		?>
	</div>
<?php } ?>

<form action="" method="post" class="d-grid gap-3">

    <div class="form-group">
		<label for="book_nr">Id<?php echo in_array('book_nr', $required) ? '<span> *</span>' : ''; ?></label>
		<input type="text" id="book_nr" readonly="readonly" name="book_nr" class="form-control" value="<?php echo isset($data['nr']) ? $data['nr'] : ''; ?>">
	</div>

	<div class="form-group">
		<label for="knygos_pavadinimas">Name<?php echo in_array('pavadinimas', $required) ? '<span> *</span>' : ''; ?></label>
		<input type="text" id="knygos_pavadinimas" name="knygos_pavadinimas" class="form-control" value="<?php echo isset($data['pavadinimas']) ? $data['pavadinimas'] : ''; ?>">
	</div>
    <div class="form-group">
		<label for="isleidimo_data">Relase date<?php echo in_array('isleidimo_data', $required) ? '<span> *</span>' : ''; ?></label>
		<input type="date" id="isleidimo_data" name="isleidimo_data" class="form-control" value="<?php echo isset($data['isleidimo_data']) ? $data['isleidimo_data'] : ''; ?>">
	</div>
    <div class="form-group">
		<label for="fk_KALBAnr">Language<?php echo in_array('fk_KALBAnr', $required) ? '<span> *</span>' : ''; ?></label>
		<select id="fk_KALBAnr" name="fk_KALBAnr" class="form-select form-control">
			<option value="-1">---------------</option>
			<?php
				$language = $book->getLanguageList();
				foreach($language as $key => $val) {
					$selected = "";
					if(isset($data['fk_KALBAnr']) && $data['fk_KALBAnr'] == $val['nr']) {
						$selected = " selected='selected'";
					}
					echo "<option{$selected} value='{$val['nr']}'>{$val['pavadinimas']}</option>";
				}
			?>
		</select>
	</div>
    <div class="form-group">
		<label for="fk_ZANRASnr">Genre<?php echo in_array('fk_ZANRASnr', $required) ? '<span> *</span>' : ''; ?></label>
		<select id="fk_ZANRASnr" name="fk_ZANRASnr" class="form-select form-control">
			<option value="-1">---------------</option>
			<?php
				$genre = $book->getGenreList();
				foreach($genre as $key => $val) {
					$selected = "";
					if(isset($data['fk_ZANRASnr']) && $data['fk_ZANRASnr'] == $val['nr']) {
						$selected = " selected='selected'";
					}
					echo "<option{$selected} value='{$val['nr']}'>{$val['pavadinimas']}</option>";
				}
			?>
		</select>
	</div>
    <div class="form-group">
		<label for="fk_AUTORIUSnr">Author<?php echo in_array('fk_AUTORIUSnr', $required) ? '<span> *</span>' : ''; ?></label>
		<select id="fk_AUTORIUSnr" name="fk_AUTORIUSnr" class="form-select form-control">
			<option value="-1">---------------</option>
			<?php
				$authors = $book->getAuthorList();
				foreach($authors as $key => $val) {
					$selected = "";
					if(isset($data['fk_AUTORIUSnr']) && $data['fk_AUTORIUSnr'] == $val['nr']) {
						$selected = " selected='selected'";
					}
					echo "<option{$selected} value='{$val['nr']}'>{$val['vardas']} {$val['pavarde']}</option>";
				}
			?>
		</select>
	</div>
    <div class="form-group">
		<label for="fk_LEIDYKLAnr">Publisher<?php echo in_array('fk_LEIDYKLAnr', $required) ? '<span> *</span>' : ''; ?></label>
		<select id="fk_LEIDYKLAnr" name="fk_LEIDYKLAnr" class="form-select form-control">
			<option value="-1">---------------</option>
			<?php
				$publisher = $book->getPublisherList();
				foreach($publisher as $key => $val) {
					$selected = "";
					if(isset($data['fk_LEIDYKLAnr']) && $data['fk_LEIDYKLAnr'] == $val['nr']) {
						$selected = " selected='selected'";
					}
					echo "<option{$selected} value='{$val['nr']}'>{$val['pavadinimas']}</option>";
				}
			?>
		</select>
	</div>
    


	<p class="required-note">* marked fields need to be filled</p>

	<input type="submit" class="btn btn-primary w-25" name="submit" value="Save">
</form>