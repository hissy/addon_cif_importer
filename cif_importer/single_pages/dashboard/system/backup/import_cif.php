<?php defined('C5_EXECUTE') or die("Access Denied.");?>

<form action="<?php echo $this->action('import')?>" method="post" class="form-horizontal">
    
    <?php echo $this->controller->token->output('import')?>
    <fieldset>
        <legend><?php echo t('Select XML (cif) file to import contents'); ?></legend>
        <div class="alert alert-danger" role="alert">
            <h4><?php echo t('Warning:'); ?></h4>
            <p><?php echo t('This action <strong>cannot be undone</strong>. Are you sure?'); ?></p>
        </div>
        <div class="control-group">
            <?php echo $form->label('fID', t('Select XML File')); ?>
            <div class="controls">
                <?php $al = Core::make('helper/concrete/asset_library'); ?>
                <?php echo $al->text('fID', 'fID', 'Select File', $f); ?>
            </div>
        </div>
    </fieldset>
    <div class="ccm-dashboard-form-actions-wrapper">
    <div class="ccm-dashboard-form-actions">
        <button class="pull-right btn btn-success" type="submit" ><?php echo t('Import')?></button>
    </div>
    </div>
    
</form>
