<?php

namespace Album\Factory;

use Album\Model\AlbumTable;
use Zend\Db\TableGateway\TableGateway;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class AlbumTableFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        /** @var TableGateway $tableGateway */
        $tableGateway = $serviceLocator->get('AlbumTableGateway');
        $table = new AlbumTable($tableGateway);
        return $table;
    }
}
