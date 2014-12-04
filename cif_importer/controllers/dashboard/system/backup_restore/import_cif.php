<?php
defined('C5_EXECUTE') or die("Access Denied.");

if (!ini_get('safe_mode')) {
	@set_time_limit(0);
	ini_set('max_execution_time', 0);
}

class DashboardSystemBackupRestoreImportCifController extends DashboardBaseController {
	
	public function import() {
		if ($this->token->validate("import")) {
			$valn = Loader::helper('validation/numbers');
			
			$fID = $this->post('fID');
			if (!$valn->integer($fID)) {
				$this->error->add(t('Invalid file.'));
			} else {
				$f = File::getByID($fID);
				if ($f->isError()) {
					$this->error->add(t('Invalid file.'));
				}
			}
			
			if (!$this->error->has()) {
				$path = $f->getPath();
				$ci = new ContentImporter();
				$ci->importContentFile($path);
				$this->set('message', t('Done.'));
			}
		} else {
			$this->error->add($this->token->getErrorMessage());
		}
	}
	
}
