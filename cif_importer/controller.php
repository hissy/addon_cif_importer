<?php
namespace Concrete\Package\CifImporter;

use Concrete\Core\Backup\ContentImporter;

class Controller extends \Concrete\Core\Package\Package
{
    protected $pkgHandle = 'cif_importer';
    protected $appVersionRequired = '5.7.3';
    protected $pkgVersion = '0.2.1';
    
    public function getPackageName()
    {
        return t('XML (CIF) Importer');
    }
    
    public function getPackageDescription()
    {
        return t('Import XML (CIF) file to your concrete5 site.');
    }

    public function install()
    {
        $pkg = parent::install();
        $ci = new ContentImporter();
        $ci->importContentFile($pkg->getPackagePath() . '/config/install.xml');
    }
}
