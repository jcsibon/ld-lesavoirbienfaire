<?php

require('../vendor/autoload.php');

$app = new Silex\Application();
$app['debug'] = true;

// Register the monolog logging service
$app->register(new Silex\Provider\MonologServiceProvider(), array(
  'monolog.logfile' => 'php://stderr',
));

// Register view rendering
$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__.'/public',
));

// Our web handlers

$app->get('/', function() use($app) {
  return $app['twig']->render('dispatch.html');
});

$app->get('/manifesto', function() use($app) {
  return $app['twig']->render('manifesto.html');
});

$app->get('/usines', function() use($app) {
  return $app['twig']->render('usines.html');
});

$app->get('/histoire', function() use($app) {
  return $app['twig']->render('histoire.html');
});

$app->run();
