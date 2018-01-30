<?php

namespace KelkooXml\Controller;

use KelkooXml\KelkooXml;
use KelkooXml\Model\KelkooxmlXmlFieldAssociationQuery;
use Propel\Runtime\Propel;
use Thelia\Controller\Admin\BaseAdminController;
use Thelia\Core\Security\AccessManager;
use Thelia\Core\Security\Resource\AdminResources;

class ModuleConfigController extends BaseAdminController
{
    public function viewConfigAction($params = array())
    {
        if (null !== $response = $this->checkAuth(array(AdminResources::MODULE), 'KelkooXml', AccessManager::VIEW)) {
            return $response;
        }

        $fieldAssociationArray = KelkooxmlXmlFieldAssociationQuery::create()->find()->toArray();

        $ean_rule = KelkooXml::getConfigValue("ean_rule", FeedXmlController::DEFAULT_EAN_RULE);

        return $this->render(
            "kelkooxml/module-configuration",
            [
                'field_association_array' => $fieldAssociationArray,
                'pse_count' => $this->getNumberOfPse(),
                'ean_rule' => $ean_rule
            ]
        );
    }

    protected function getNumberOfPse()
    {
        $sql = 'SELECT COUNT(*) AS nb FROM product_sale_elements';
        $stmt = Propel::getConnection()->prepare($sql);
        $stmt->execute();
        $rows = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $rows[0]['nb'];
    }
}
