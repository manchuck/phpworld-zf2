<?php

namespace Album\Controller\Plugin;

use Album\RuntimeException;
use Zend\Mvc\Controller\Plugin\AbstractPlugin;
use Zend\Mvc\InjectApplicationEventInterface;
use Zend\Mvc\MvcEvent;

class AddAppHeader extends AbstractPlugin
{
    public function __invoke()
    {
        $controller = $this->getController();

        if (!$controller instanceof InjectApplicationEventInterface) {
            throw new RuntimeException(
                'Controllers must implement Zend\Mvc\InjectApplicationEventInterface to use this plugin.'
            );
        }

        /** @var MvcEvent $event */
        $event = $controller->getEvent();
        $event->getResponse()->getHeaders()->addHeaderLine('X-Application', 'MANCHUCK');
    }
}
