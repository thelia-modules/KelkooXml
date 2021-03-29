<?php

namespace KelkooXml\Event;

use Thelia\Core\Event\ActionEvent;

class KelkooGenerateXmlEvent extends ActionEvent
{
    const GENERATE_XML_EVENT = "kelkooxml.generate.xml.event";

    protected $feed;
    protected $xmlContent;
    protected $limit;
    protected $offset;

    /**
     * KelkooGenerateXmlEvent constructor.
     * @param $feed
     * @param $limit
     * @param $offset
     */
    public function __construct($feed, $limit, $offset)
    {
        $this->feed = $feed;
        $this->limit = $limit;
        $this->offset = $offset;
    }


    public function getFeed()
    {
        return $this->feed;
    }


    public function setFeed($feed)
    {
        $this->feed = $feed;
    }


    public function getXmlContent()
    {
        return $this->xmlContent;
    }


    public function setXmlContent($xmlContent)
    {
        $this->xmlContent = $xmlContent;
    }


    public function getLimit()
    {
        return $this->limit;
    }


    public function setLimit($limit)
    {
        $this->limit = $limit;
    }


    public function getOffset()
    {
        return $this->offset;
    }


    public function setOffset($offset)
    {
        $this->offset = $offset;
    }

}