<?php

defined('C5_EXECUTE') or die(_("Access Denied."));

class CifImporterPackage extends Package {

	protected $pkgHandle = 'cif_importer';
	protected $appVersionRequired = '5.6.2';
	protected $pkgVersion = '0.1';
	
	public function getPackageName() {
		return t('XML (CIF) Importer');
	}
	
	public function getPackageDescription() {
		return t('Import XML (CIF) file to your concrete5 site.');
	}

	public function install() {
		$pkg = parent::install();
		$ci = new ContentImporter();
		$ci->importContentFile($pkg->getPackagePath() . '/config/install.xml');
	}

}
