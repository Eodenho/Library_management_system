<nav aria-label="breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="index.php">Start</a></li>
		<li class="breadcrumb-item" aria-current="page"><a href="index.php?module=<?php echo $module; ?>&action=list">Publishers</a></li>
		<li class="breadcrumb-item active" aria-current="page"><?php if(!empty($id)) echo "Publisher edit"; else echo "New publisher"; ?></li>
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
		<label for="nr">Id<?php echo in_array('nr', $required) ? '<span> *</span>' : ''; ?></label>
		<input type="text" id="nr" readonly="readonly" name="nr" class="form-control" value="<?php echo isset($data['nr']) ? $data['nr'] : ''; ?>">
	</div>

	<div class="form-group">
		<label for="pavadinimas">Name<?php echo in_array('pavadinimas', $required) ? '<span> *</span>' : ''; ?></label>
		<input type="text" id="pavadinimas" name="pavadinimas" class="form-control" value="<?php echo isset($data['pavadinimas']) ? $data['pavadinimas'] : ''; ?>">
	</div>
	
    <div class="form-group">
		<label for="salis">Country<?php echo in_array('salis', $required) ? '<span> *</span>' : ''; ?></label>
		<select id="salis" name="salis" class="form-select form-control">
			<option value="-1">---------------</option>
			<?php
				// išrenkame būsenas
				$country = $publisher->getCountries();
				foreach($country as $key => $val) {
					$selected = "";
					if(isset($data['salis']) && $data['salis'] == $val['id_SALIS']) {
						$selected = " selected='selected'";
					}
					echo "<option{$selected} value='{$val['id_SALIS']}'>{$val['name']}</option>";
				}
			?>
		</select>
	</div>

    <div class="form-group">
		<label for="fk_MIESTASnr">City<?php echo in_array('fk_MIESTASnr', $required) ? '<span> *</span>' : ''; ?></label>
		<select id="fk_MIESTASnr" name="fk_MIESTASnr" class="form-select form-control">
			<option value="-1">---------------</option>
			<?php
				// išrenkame būsenas
				$city = $publisher->getCities();
				foreach($city as $key => $val) {
					$selected = "";
					if(isset($data['fk_MIESTASnr']) && $data['fk_MIESTASnr'] == $val['nr']) {
						$selected = " selected='selected'";
					}
					echo "<option{$selected} value='{$val['nr']}'>{$val['pavadinimas']}</option>";
				}
			?>
		</select>
	</div>

    <div class="row w-75">
    <div class="formRowsContainer column">
			<!-- <div class="row headerRow<?php if(empty($data['knygos']) || sizeof($data['knygos']) == 1) echo ' d-none'; ?>">
				<div class="col-4">Kaina</div>
				<div class="col-4">Galioja nuo</div>
				<div class="col-4">Galioja nuo</div>

			</div> -->
			<?php
				if(!empty($data['knygos']) && sizeof($data['knygos']) > 0) {
					foreach($data['knygos'] as $key => $val) {
						$id='';
						if(isset($val['nr']))
							$id = $val['nr'];

						$pavadinimas='';
						if(isset($val['pavadinimas']))
							$pavadinimas = $val['pavadinimas'];

						$isleidimo_data='';
						if(isset($val['isleidimo_data']))
							$isleidimo_data = $val['isleidimo_data'];
						

					?>
						<div class="formRow row col-12 <?php echo $key > 0 ? '' : 'd-none'; ?>">
							<h4 class="mt-3">Book</h4>	

							<div class="form-group">
								<label for="book_nr[]">Book id <?php echo in_array('nr', $required) ? '<span> *</span>' : ''; ?></label>
								<input type="text" id="book_nr[]" readonly="readonly" name="book_nr[]" class="form-control" value="<?php echo $id; ?>">
							</div>
									
							<div class="form-group">
								<label for="knygos_pavadinimas[]">Name<?php echo in_array('pavadinimas', $required) ? '<span> *</span>' : ''; ?></label>
								<input type="text" id="knygos_pavadinimas[]" name="knygos_pavadinimas[]" class="form-control" value="<?php echo $pavadinimas; ?>">
							</div>
                            <div class="form-group">
								<label for="isleidimo_data[]">Release date<?php echo in_array('isleidimo_data', $required) ? '<span> *</span>' : ''; ?></label>
								<input type="date" id="isleidimo_data[]" name="isleidimo_data[]" class="form-control" value="<?php echo $isleidimo_data; ?>">
							</div>
                            <div class="form-group">
								<label for="fk_KALBAnr[]">Language<?php echo in_array('fk_KALBAnr', $required) ? '<span> *</span>' : ''; ?></label>
								<select id="fk_KALBAnr[]" name="fk_KALBAnr[]" class="form-select form-control">
									<option value="-1">---------------</option>
									<?php
										// išrenkame būsenas
										$books = $book->getLanguageList();
										foreach($books as $key => $v) {
											$selected = "";
											// if(isset($data['fk_Userid_User']) && $data['fk_Userid_User'] == $val['id_User']) {
											// 	$selected = " selected='selected'";
											// }
											if(isset($val['fk_KALBAnr']) ) {
												if($val['fk_KALBAnr'] == $v['nr']) {
													$selected = " selected='selected'";
												}
											}
											echo "<option{$selected} value='{$v['nr']}'>{$v['pavadinimas']}</option>";
										}
									?>
								</select>
							</div>

                            <div class="form-group">
								<label for="fk_ZANRASnr[]">Genre<?php echo in_array('fk_ZANRASnr', $required) ? '<span> *</span>' : ''; ?></label>
								<select id="fk_ZANRASnr[]" name="fk_ZANRASnr[]" class="form-select form-control">
									<option value="-1">---------------</option>
									<?php
										// išrenkame būsenas
										$books = $book->getGenreList();
										foreach($books as $key => $v) {
											$selected = "";
											// if(isset($data['fk_Userid_User']) && $data['fk_Userid_User'] == $val['id_User']) {
											// 	$selected = " selected='selected'";
											// }
											if(isset($val['fk_ZANRASnr']) ) {
												if($val['fk_ZANRASnr'] == $v['nr']) {
													$selected = " selected='selected'";
												}
											}
											echo "<option{$selected} value='{$v['nr']}'>{$v['pavadinimas']}</option>";
										}
									?>
								</select>
							</div>
                            <div class="form-group">
								<label for="fk_AUTORIUSnr[]">Author<?php echo in_array('fk_AUTORIUSnr', $required) ? '<span> *</span>' : ''; ?></label>
								<select id="fk_AUTORIUSnr[]" name="fk_AUTORIUSnr[]" class="form-select form-control">
									<option value="-1">---------------</option>
									<?php
										// išrenkame būsenas
										$books = $book->getAuthorList();
										foreach($books as $key => $v) {
											$selected = "";
											// if(isset($data['fk_Userid_User']) && $data['fk_Userid_User'] == $val['id_User']) {
											// 	$selected = " selected='selected'";
											// }
											if(isset($val['fk_AUTORIUSnr']) ) {
												if($val['fk_AUTORIUSnr'] == $v['nr']) {
													$selected = " selected='selected'";
												}
											}
											echo "<option{$selected} value='{$v['nr']}'>{$v['vardas']} {$v['pavarde']}</option>";
										}
									?>
								</select>
							</div>
							
							<div class="col-4"><a href="#" onclick="return false;" class="removeChild">Remove</a></div>
						</div>
					<?php 
					}
				}
					?>
		</div>
		<div class="w-100">
			<a href="#" class="addChild">Add new book</a>
		</div>
	</div>

	<?php if(isset($data['id'])) { ?>
			<input type="hidden" name="id" value="<?php echo $data['id']; ?>" />
	<?php } ?>



	<p class="required-note">* marked fields need to be filled</p>

	<input type="submit" class="btn btn-primary w-25" name="submit" value="Save">
</form>