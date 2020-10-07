<?php

require '../vendor/autoload.php';

echo 'Isso está funcionando';
echo '<hr>';

$route = new \App\Route;

print_r($route->getUrl());
// testando o retorno do método getUrl()
