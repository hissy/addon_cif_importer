<?php
namespace Concrete\Package\CifImporter\Controller\SinglePage\Dashboard\System\Backup;

use Core;
use File;
use Concrete\Core\File\Importer as FileImporter;
use Concrete\Core\Backup\ContentImporter;

if (!ini_get('safe_mode')) {
    @set_time_limit(0);
    ini_set('max_execution_time', 0);
}

class ImportCif extends \Concrete\Core\Page\Controller\DashboardPageController {
    
    public function import()
    {
        if ($this->token->validate("import")) {
            $valn = Core::make("helper/validation/numbers");
            $fi = new FileImporter();
            
            $fID = $this->post('fID');
            if (!$valn->integer($fID)) {
                $this->error->add($fi->getErrorMessage(Importer::E_FILE_INVALID));
            } else {
                $f = File::getByID($fID);
                if (!is_object($f)) {
                    $this->error->add($fi->getErrorMessage(Importer::E_FILE_INVALID));
                }
            }
            
            if (!$this->error->has()) {
                $fsr = $f->getFileResource();
                if (!$fsr->isFile()) {
                    $this->error->add($fi->getErrorMessage(Importer::E_FILE_INVALID));
                } else {
                    $ci = new ContentImporter();
                    $ci->importContentString($fsr->read());
                    $this->set('message', t('Done.'));
                }
            }
        } else {
            $this->error->add($this->token->getErrorMessage());
        }
    }
    
}
