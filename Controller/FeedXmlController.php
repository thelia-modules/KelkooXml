<?php

namespace KelkooXml\Controller;

use KelkooXml\Event\KelkooGenerateXmlEvent;
use KelkooXml\Model\KelkooxmlFeedQuery;
use Thelia\Controller\Front\BaseFrontController;
use Thelia\Core\HttpFoundation\Response;


class FeedXmlController extends BaseFrontController
{
    public function getFeedXmlAction($feedId)
    {
        $feed = KelkooxmlFeedQuery::create()->findOneById($feedId);

        $request = $this->getRequest();

        $limit = $request->get('limit', null);
        $offset = $request->get('offset', null);

        if ($feed === null) {
            $this->pageNotFound();
        }

        $event = new KelkooGenerateXmlEvent($feed, $limit, $offset);

        $this->getDispatcher()->dispatch(KelkooGenerateXmlEvent::GENERATE_XML_EVENT, $event);

        $response = new Response();
        $response->setContent($event->getXmlContent());
        $response->headers->set('Content-Type', 'application/xml');

        return $response;


    }


}
