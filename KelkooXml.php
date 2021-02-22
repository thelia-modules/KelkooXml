<?php

namespace KelkooXml;

use Propel\Runtime\Connection\ConnectionInterface;
use Thelia\Install\Database;
use Thelia\Module\BaseModule;

class KelkooXml extends BaseModule
{
    /** @var string */
    const DOMAIN_NAME = 'kelkooxml';
    const DOMAIN_BO_DEFAULT = "kelkooxml.bo.default";

    const KELKOO_LOCAL_DIR = THELIA_LOCAL_DIR . "KelkooXmlFiles" . DS;

    /* @var string */
    const UPDATE_PATH = __DIR__ . DS . 'Config' . DS . 'update';

    public function preActivation(ConnectionInterface $con = null)
    {
        if (!$this->getConfigValue('is_initialized', false)) {
            $database = new Database($con);

            $database->insertSql(null, array(__DIR__ . '/Config/thelia.sql'));

            $this->setConfigValue('is_initialized', true);
        }

        return true;
    }
}
