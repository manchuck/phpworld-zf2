<?php

namespace Album\Factory;

use Album\Model\Album;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;
use Zend\ServiceManager\ServiceLocatorInterface;

class AlbumTableGatewayFactory
{
    public function __invoke(ServiceLocatorInterface $serviceLocator)
    {
        $dbAdapter = $serviceLocator->get('Zend\Db\Adapter\Adapter');
        $resultSetPrototype = new ResultSet();
        $resultSetPrototype->setArrayObjectPrototype(new Album());
        return new TableGateway('album', $dbAdapter, null, $resultSetPrototype);
    }
}
