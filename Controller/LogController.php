<?php

namespace KelkooXml\Controller;

use KelkooXml\Model\KelkooxmlLog;
use KelkooXml\Model\KelkooxmlLogQuery;
use Thelia\Controller\Admin\BaseAdminController;
use Thelia\Core\Security\AccessManager;
use Thelia\Core\Security\Resource\AdminResources;

class LogController extends BaseAdminController
{
    public function getLogAction()
    {
        if (null !== $response = $this->checkAuth(array(AdminResources::MODULE), array('KelkooXml'), AccessManager::CREATE)) {
            return $response;
        }

        /** @var \Thelia\Core\HttpFoundation\Request $request **/
        $request = $this->getRequest();

        $limit = $request->get('limit', 50);
        $offset = $request->get('offset', null);
        $levels_checked = [];

        if ($request->get('info', null) == 1) $levels_checked[] = KelkooxmlLogQuery::LEVEL_INFORMATION;
        if ($request->get('success', null) == 1) $levels_checked[] = KelkooxmlLogQuery::LEVEL_SUCCESS;
        if ($request->get('warning', null) == 1) $levels_checked[] = KelkooxmlLogQuery::LEVEL_WARNING;
        if ($request->get('error', null) == 1) $levels_checked[] = KelkooxmlLogQuery::LEVEL_ERROR;
        if ($request->get('fatal', null) == 1) $levels_checked[] = KelkooxmlLogQuery::LEVEL_FATAL;

        /** @var KelkooxmlLogQuery $query **/
        $query = KelkooxmlLogQuery::create()
            ->orderByCreatedAt('desc')
            ->orderById('desc')
            ->limit($limit);

        for ($i = 0; $i < count($levels_checked); $i++) {
            if ($i > 0) {
                $query->_or();
            }
            $query->filterByLevel($levels_checked[$i]);
        }

        if (!empty($offset)) {
            $query->offset($offset);
        }

        $logCollection = $query->find();

        $logResults = [];

        /** @var KelkooxmlLog $log **/
        foreach ($logCollection as $log) {
            $logArray = [];
            $logArray['date'] = $log->getCreatedAt()->format('d/m/Y H:i:s');
            $logArray['feed_id'] = $log->getFeedId();
            $logArray['feed_label'] = $log->getKelkooxmlFeed()->getLabel();
            $logArray['level'] = $log->getLevel();
            $logArray['message'] = $log->getMessage();
            $logArray['help'] = $log->getHelp();
            $logArray['product_id'] = !empty($log->getProductSaleElements()) ? $log->getProductSaleElements()->getProductId() : null;
            $logArray['product_ref'] = !empty($log->getProductSaleElements()) ? $log->getProductSaleElements()->getProduct()->getRef() : null;

            $logResults[] = $logArray;
        }

        return $this->jsonResponse(json_encode($logResults));
    }
}
