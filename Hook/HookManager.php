<?php

namespace KelkooXml\Hook;

use Thelia\Core\Event\Hook\HookRenderEvent;
use Thelia\Core\Hook\BaseHook;

class HookManager extends BaseHook
{
    public function onMainHeadCss(HookRenderEvent $event)
    {
        $content = $this->addCSS('kelkooxml/css/style.css');
        $event->add($content);
    }
}
