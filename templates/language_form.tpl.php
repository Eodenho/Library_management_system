<nav aria-label="breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="index.php">Start</a></li>
		<li class="breadcrumb-item" aria-current="page"><a href="index.php?module=<?php echo $module; ?>&action=list">Languages</a></li>
		<li class="breadcrumb-item active" aria-current="page"><?php if(!empty($id)) echo "User edit"; else echo "New language"; ?></li>
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
		<label for="sutrumpinimas">Short name<?php echo in_array('sutrumpinimas', $required) ? '<span> *</span>' : ''; ?></label>
		<input type="text" id="sutrumpinimas" name="sutrumpinimas" class="form-control" value="<?php echo isset($data['sutrumpinimas']) ? $data['sutrumpinimas'] : ''; ?>">
	</div>

	<p class="required-note">* marked fields need to be filled</p>

	<input type="submit" class="btn btn-primary w-25" name="submit" value="Save">
</form>