<?php
include 'vendor\autoload.php';

\Mikrotik\API::getInstance()->config([
    'login' => 'allan',
    'password' => '13072409',
    'ip' => '10.5.50.1',
    'port' => '8080',
]);
$hotspot = new \Mikrotik\Hotspot();
$teste = 'teste13';
$result = $hotspot->addUser($teste, $teste, $teste);
var_dump($result);
//var_dump($hotspot->actives());
//var_dump($hotspot->all());