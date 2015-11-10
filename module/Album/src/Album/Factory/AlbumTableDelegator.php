<?php

namespace Album\Factory;

use Album\Model\Album;
use Album\Model\AlbumTable;
use Album\Model\AlbumTableInterface;
use Zend\Log\Logger;
use Zend\Log\LoggerAwareInterface;
use Zend\Log\LoggerAwareTrait;

class AlbumTableDelegator implements AlbumTableInterface, LoggerAwareInterface
{
    use LoggerAwareTrait;

    /**
     * @var AlbumTable
     */
    protected $realTable;

    public function __construct(AlbumTable $realTable, Logger $logger)
    {
        $this->realTable = $realTable;
        $this->setLogger($logger);
    }

    public function fetchAll()
    {
        $this->getLogger()->info('In AlbumTableDelegator::fetchAll');
        return $this->realTable->fetchAll();
    }

    public function getAlbum($id)
    {
        $this->getLogger()->info('In AlbumTableDelegator::getAlbum');
        return $this->realTable->getAlbum($id);
    }

    public function saveAlbum(Album $album)
    {
        $this->getLogger()->info('In AlbumTableDelegator::saveAlbum');
        return $this->realTable->saveAlbum($album);
    }

    public function deleteAlbum($id)
    {
        $this->getLogger()->info('In AlbumTableDelegator::deleteAlbum');
        return $this->realTable->deleteAlbum($id);
    }
}
