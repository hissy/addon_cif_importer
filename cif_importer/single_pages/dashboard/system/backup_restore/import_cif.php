<?php	defined('C5_EXECUTE') or die("Access Denied.");?>

<?php	echo Loader::helper('concrete/dashboard')->getDashboardPaneHeaderWrapper(t('Import XML'), false, 'span10 offset1', false)?>

<form action="<?php echo $this->action('import')?>" method="post" class="form-horizontal">
	
	<?php echo Loader::helper('validation/token')->output('import')?>
	<div class="ccm-pane-body">
		<fieldset>
			<legend><?php	echo t('Select XML (cif) file to import contents'); ?></legend>
			<div class="alert alert-block">
				<h4><?php echo t('Warning:'); ?></h4>
				<p><?php echo t('This action <strong>cannot be undone</strong>. Are you sure?'); ?></p>
			</div>
			<div class="control-group">
				<?php echo $form->label('fID', t('Select XML File')); ?>
				<div class="controls">
					<?php $al = Loader::helper('concrete/asset_library'); ?>
					<?php echo $al->file('fID', 'fID', 'Select File', $f); ?>
				</div>
			</div>
		</fieldset>
	</div>
	<div class="ccm-pane-footer">
		<input type="submit" name="submit" value="<?php	echo t('Import')?>" class="ccm-button-right primary btn" />
	</div>
	
</form>

<?php	echo Loader::helper('concrete/dashboard')->getDashboardPaneFooterWrapper(false)?>
