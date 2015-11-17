<?php

include '../vendor/autoload.php';

$adapterOptions = [
    'driver'         => 'Pdo',
    'dsn'            => 'mysql:dbname=spa;host=localhost',
    'driver_options' => array(
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''
    ),
    'username' => 'spa',
    'password' => 'spa123',
    'adapters' => array(
        'Album' => array(
            'database' => 'spa',
            'driver' => 'Mysqli',
            'username' => 'spa',
            'password' => 'spa123',
            'dsn' => 'mysql:dbname=spa;host=localhost',
        ),
    ),
];

$adapter = new \Zend\Db\Adapter\Adapter($adapterOptions);
$sql     = new \Zend\Db\Sql\Sql($adapter);

$select  = $sql->select();
$select->from('album');

$statment = $sql->prepareStatementForSqlObject($select);
$result   = $statment->execute();

foreach($result as $album) {
    var_dump($album);
}
