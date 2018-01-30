<?php

namespace KelkooXml\Controller;

use KelkooXml\Form\FeedManagementForm;
use KelkooXml\KelkooXml;
use KelkooXml\Model\KelkooxmlFeedQuery;
use Thelia\Controller\Admin\BaseAdminController;
use Thelia\Core\Security\AccessManager;
use Thelia\Core\Security\Resource\AdminResources;

class FeedConfigController extends BaseAdminController
{
    public function addFeedAction()
    {
        if (null !== $response = $this->checkAuth(array(AdminResources::MODULE), array('KelkooXml'), AccessManager::CREATE)) {
            return $response;
        }

        return $this->addOrUpdateFeed();
    }

    public function updateFeedAction()
    {
        if (null !== $response = $this->checkAuth(array(AdminResources::MODULE), array('KelkooXml'), AccessManager::UPDATE)) {
            return $response;
        }

        return $this->addOrUpdateFeed();
    }

    protected function addOrUpdateFeed()
    {
        $form = new FeedManagementForm($this->getRequest());

        try {
            $formData = $this->validateForm($form)->getData();

            $feed = KelkooxmlFeedQuery::create()
                ->filterById($formData['id'])
                ->findOneOrCreate();

            $feed->setLabel($formData['feed_label'])
                ->setLangId($formData['lang_id'])
                ->setCurrencyId($formData['currency_id'])
                ->setCountryId($formData['country_id'])
                ->save();

        } catch (\Exception $e) {
            $message = null;
            $message = $e->getMessage();
            $this->setupFormErrorContext(
                $this->getTranslator()->trans("KelkooXml configuration", [], KelkooXml::DOMAIN_NAME),
                $message,
                $form,
                $e
            );
        }

        return $this->generateRedirectFromRoute(
            "admin.module.configure",
            array(),
            array(
                'module_code' => 'KelkooXml',
                'current_tab' => 'feeds'
            )
        );
    }

    public function deleteFeedAction()
    {
        if (null !== $response = $this->checkAuth(array(AdminResources::MODULE), array('KelkooXml'), AccessManager::DELETE)) {
            return $response;
        }

        $feedId = $this->getRequest()->request->get('id_feed_to_delete');

        $feed = KelkooxmlFeedQuery::create()->findOneById($feedId);
        if ($feed != null) {
            $feed->delete();
        }

        return $this->generateRedirectFromRoute(
            "admin.module.configure",
            array(),
            array(
                'module_code' => 'KelkooXml',
                'current_tab' => 'feeds'
            )
        );
    }
}
