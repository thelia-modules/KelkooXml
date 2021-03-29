<?php

namespace KelkooXml\Command;

use KelkooXml\Event\KelkooGenerateXmlEvent;
use KelkooXml\KelkooXml;
use KelkooXml\Model\KelkooxmlFeedQuery;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Filesystem\Filesystem;
use Thelia\Command\ContainerAwareCommand;

class UpdateXmlCommand extends ContainerAwareCommand
{
    public function configure()
    {
        $this
            ->setName('module:KelKooXml:update')
            ->setDescription("Update xml")
            ->addArgument(
            'feedId',
            InputArgument::REQUIRED,
            'FeedId')
            ->addArgument(
            'limit',
            InputArgument::OPTIONAL,
            'limit')
            ->addArgument(
            'offset',
            InputArgument::OPTIONAL,
            'offset');
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     */
    public function execute(InputInterface $input, OutputInterface $output)
    {
        $feedId = $input->getArgument('feedId');
        $limit = $input->getArgument('limit');
        $offset = $input->getArgument('offset');



        $feed = KelkooxmlFeedQuery::create()->filterById((int)$feedId)->findOne();

        if (null !== $feed){
            $event = new KelkooGenerateXmlEvent($feed, $limit, $offset);

            $this->getDispatcher()->dispatch(KelkooGenerateXmlEvent::GENERATE_XML_EVENT, $event);

            $fileName = "kelkoo_feed_$feedId.xml";

            $file = KelkooXml::KELKOO_LOCAL_DIR . $fileName;

            $fs = new Filesystem();

            if (!$fs->exists(KelkooXml::KELKOO_LOCAL_DIR)){
                $fs->mkdir(KelkooXml::KELKOO_LOCAL_DIR);
            }

            if (!$fs->exists($file)){
                $fs->remove($file);
            }

            $fs->touch($file);
            $fs->dumpFile($file, $event->getXmlContent());

            $output->writeln("file : $fileName, updated in $file");

        }
    }
}