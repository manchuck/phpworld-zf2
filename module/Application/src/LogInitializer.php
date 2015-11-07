<?php

namespace Application;

use Zend\Log\LoggerAwareInterface;
use Zend\Log\LoggerInterface;
use Zend\ServiceManager\ServiceLocatorAwareInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class LogInitializer
{
    /**
     * Injects the logger into object that are logger aware
     *
     * @param $object
     * @param ServiceLocatorInterface $service
     */
    public function __invoke($object, ServiceLocatorInterface $service)
    {
        // might not be the main SM
        $service = $service instanceof ServiceLocatorAwareInterface
            ? $service->getServiceLocator()
            : $service;

        // check if the object can take a logger and that we have a logger registered
        if (!$object instanceof LoggerAwareInterface || !$service->has('Log\App')) {
            return;
        }

        // make sure the logger is in fact a logger
        $logger = $service->get('Log\App');
        if (!$logger instanceof LoggerInterface) {
            return;
        }

        $object->setLogger($logger);
    }
}