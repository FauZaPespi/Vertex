<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;
use Fauza\Template\Middleware\CorsMiddleware;

// 1. On charge l'autoloader de Composer
require __DIR__ . '/../vendor/autoload.php';

// 2. On instancie l'application
$app = AppFactory::create();

// 3. Add CORS Middleware
$app->add(new CorsMiddleware());

// 4. Routing
require_once '../config/web-routes.php';

// 5. On lance l'application
$app->run();