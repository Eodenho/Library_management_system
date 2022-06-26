<nav aria-label="breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="index.php">Start</a></li>
		<li class="breadcrumb-item" aria-current="page"><a href="index.php?module=<?php echo $module; ?>&action=list">Readers</a></li>
		<li class="breadcrumb-item active" aria-current="page"><?php if(!empty($id)) echo "Reader edit"; else echo "New reader"; ?></li>
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
				$gender = $reader->getGenders();
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
				$city = $reader->getCities();
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

	<p class="required-note">* marked fields need to be filled</p>

	<input type="submit" class="btn btn-primary w-25" name="submit" value="Save">
</form>