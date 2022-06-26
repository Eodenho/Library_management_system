<nav aria-label="breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="index.php">Start</a></li>
		<li class="breadcrumb-item" aria-current="page"><a href="index.php?module=<?php echo $module; ?>&action=list">Employees</a></li>
		<li class="breadcrumb-item active" aria-current="page"><?php if(!empty($id)) echo "Employee edit"; else echo "New employee"; ?></li>
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
		<label for="vardas">Name<?php echo in_array('vardas', $required) ? '<span> *</span>' : ''; ?></label>
		<input type="text" id="vardas" name="vardas" class="form-control" value="<?php echo isset($data['vardas']) ? $data['vardas'] : ''; ?>">
	</div>
	
	<div class="form-group">
		<label for="pavarde">Last name<?php echo in_array('pavarde', $required) ? '<span> *</span>' : ''; ?></label>
		<input type="text" id="pavarde" name="pavarde" class="form-control" value="<?php echo isset($data['pavarde']) ? $data['pavarde'] : ''; ?>">
	</div>

    <div class="form-group">
		<label for="gimimo_data">Birth date<?php echo in_array('gimimo_data', $required) ? '<span> *</span>' : ''; ?></label>
		<input type="date" id="gimimo_data" name="gimimo_data" class="form-control" value="<?php echo isset($data['gimimo_data']) ? $data['gimimo_data'] : ''; ?>">
	</div>

    <div class="form-group">
		<label for="elektroninis_pastas">Email<?php echo in_array('elektroninis_pastas', $required) ? '<span> *</span>' : ''; ?></label>
		<input type="email" id="elektroninis_pastas" name="elektroninis_pastas" class="form-control" value="<?php echo isset($data['elektroninis_pastas']) ? $data['elektroninis_pastas'] : ''; ?>">
	</div>

    <div class="form-group">
		<label for="lytis">Gender<?php echo in_array('lytis', $required) ? '<span> *</span>' : ''; ?></label>
		<select id="lytis" name="lytis" class="form-select form-control">
			<option value="-1">---------------</option>
			<?php
				$gender = $employee->getGenders();
				foreach($gender as $key => $val) {
					$selected = "";
					if(isset($data['lytis']) && $data['lytis'] == $val['id_LYTIS']) {
						$selected = " selected='selected'";
					}
					echo "<option{$selected} value='{$val['id_LYTIS']}'>{$val['name']}</option>";
				}
			?>
		</select>
	</div>

    <div class="form-group">
		<label for="fk_MIESTASnr">City<?php echo in_array('fk_MIESTASnr', $required) ? '<span> *</span>' : ''; ?></label>
		<select id="fk_MIESTASnr" name="fk_MIESTASnr" class="form-select form-control">
			<option value="-1">---------------</option>
			<?php
				$city = $employee->getCities();
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
			
				
			<?php
				if(!empty($data['sutartys']) && sizeof($data['sutartys']) > 0) {
					foreach($data['sutartys'] as $key => $val) {
						$id='';
						if(isset($val['nr']))
							$id = $val['nr'];

						$isdavimo_data='';
						if(isset($val['isdavimo_data']))
							$isdavimo_data = $val['isdavimo_data'];

						$isleidimo_data='';
						if(isset($val['grazinimo_data']))
							$grazinimo_data = $val['grazinimo_data'];
						

					?>
						<div class="formRow row col-12 <?php echo $key > 0 ? '' : 'd-none'; ?>">
							<h4 class="mt-3">Contract</h4>	

							<div class="form-group">
								<label for="contract_nr[]">Book id <?php echo in_array('nr', $required) ? '<span> *</span>' : ''; ?></label>
								<input type="text" id="contract_nr[]" readonly="readonly" name="contract_nr[]" class="form-control" value="<?php echo $id; ?>">
							</div>
									
							<div class="form-group">
								<label for="isdavimo_data[]">Taking date<?php echo in_array('isdavimo_data', $required) ? '<span> *</span>' : ''; ?></label>
								<input type="date" id="isdavimo_data[]" name="isdavimo_data[]" class="form-control" value="<?php echo $isdavimo_data; ?>">
							</div>
                            <div class="form-group">
								<label for="grazinimo_data[]">Return date<?php echo in_array('grazinimo_data', $required) ? '<span> *</span>' : ''; ?></label>
								<input type="date" id="grazinimo_data[]" name="grazinimo_data[]" class="form-control" value="<?php echo $grazinimo_data; ?>">
							</div>
                            <div class="form-group">
								<label for="fk_SKAITYTOJASnr[]">Reader<?php echo in_array('fk_SKAITYTOJASnr', $required) ? '<span> *</span>' : ''; ?></label>
								<select id="fk_SKAITYTOJASnr[]" name="fk_SKAITYTOJASnr[]" class="form-select form-control">
									<option value="-1">---------------</option>
									<?php
										$readers = $contract->getReaders();
										foreach($readers as $key => $v) {
											$selected = "";
											if(isset($val['fk_SKAITYTOJASnr']) ) {
												if($val['fk_SKAITYTOJASnr'] == $v['nr']) {
													$selected = " selected='selected'";
												}
											}
											echo "<option{$selected} value='{$v['nr']}'>{$v['vardas']} {$v['pavarde']}</option>";
										}
									?>
								</select>
							</div>
                            <div class="form-group">
								<label for="fk_KNYGAnr[]">Book<?php echo in_array('fk_KNYGAnr', $required) ? '<span> *</span>' : ''; ?></label>
								<select id="fk_KNYGAnr[]" name="fk_KNYGAnr[]" class="form-select form-control">
									<option value="-1">---------------</option>
									<?php
										$books = $contract->getBooks();
										foreach($books as $key => $v) {
											$selected = "";
											if(isset($val['fk_KNYGAnr']) ) {
												if($val['fk_KNYGAnr'] == $v['nr']) {
													$selected = " selected='selected'";
												}
											}
											echo "<option{$selected} value='{$v['nr']}'>{$v['pavadinimas']}</option>";
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
			<a href="#" class="addChild">Add new contract</a>
		</div>
	</div>

	<?php if(isset($data['id'])) { ?>
			<input type="hidden" name="id" value="<?php echo $data['id']; ?>" />
	<?php } ?>

	<p class="required-note">* marked fields need to be filled</p>

	<input type="submit" class="btn btn-primary w-25" name="submit" value="Save">
</form>