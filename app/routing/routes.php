<?php

$router = new AltoRouter();
$router->map('GET','/about','','abbout_us');

$match = $router->match();

var_dump($match);
