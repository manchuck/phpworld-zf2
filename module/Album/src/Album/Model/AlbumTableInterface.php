<?php

namespace Album\Model;

interface AlbumTableInterface
{
    public function fetchAll();

    public function getAlbum($id);

    public function saveAlbum(Album $album);

    public function deleteAlbum($id);
}