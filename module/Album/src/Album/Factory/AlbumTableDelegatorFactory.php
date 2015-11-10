<?php

namespace Album\Factory;

use Album\Model\AlbumTable;
use Zend\Log\Logger;
use Zend\Log\Writer\Noop;
use Zend\ServiceManager\DelegatorFactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class AlbumTableDelegatorFactory implements DelegatorFactoryInterface
{
    public function createDelegatorWithName(ServiceLocatorInterface $service, $name, $requestedName, $callback)
    {
        /** @var AlbumTable $realTable */
        $realTable = call_user_func($callback);

        // Get the logger
        $logger = $service->has('Log\App') ? $service->get('Log\App') : new Logger(['writers' => [['name' => 'noop']]]);
        $delegator = new AlbumTableDelegator($realTable, $logger);


        return $delegator;
    }


}
