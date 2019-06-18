<?php

$router = new AltoRouter();


#this line means if someone try access / then show method run
$router->map('GET','/','App\controllers\indexController@show','home');

$match = $router->match();




