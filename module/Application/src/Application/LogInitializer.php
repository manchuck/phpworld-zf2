<?php

namespace Application;

use Zend\Log\Logger;
use Zend\Log\LoggerAwareInterface;
use Zend\Log\Writer\Noop;
use Zend\ServiceManager\InitializerInterface;
use Zend\ServiceManager\ServiceLocatorAwareInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class LogInitializer implements InitializerInterface
{
    /**
     * Injects the logger into object that are logger aware
     *
     * @param $object
     * @param ServiceLocatorInterface $service
     * @return mixed
     */
    public function initialize($object, ServiceLocatorInterface $service)
    {
        // might not be the main SM
        $service = $service instanceof ServiceLocatorAwareInterface
            ? $service->getServiceLocator()
            : $service;

        // check if the object can take a logger and that we have a logger registered
        if (!$object instanceof LoggerAwareInterface) {
            return;
        }

        // Add a noop logger if no logger is configured
        $logger = $service->has('Log\App') ? $service->get('Log\App') : new Logger(['writers' => [['name' => 'noop']]]);
        $object->setLogger($logger);
    }
}