<?php
namespace Fauza\Template\Config;
use Fauza\Template\Controllers\MainController;

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$app->get('/health', [ MainController::class, 'health' ]);
$app->get('/', [ MainController::class, 'apiInfo' ]);

// Account routes
$app->post('/acc/login', [ MainController::class, 'login' ]);
$app->post('/acc/register', [ MainController::class, 'register' ]);
$app->post('/acc/logout', [ MainController::class, 'logout' ]);

$app->get('/acc/profile', [ MainController::class, 'profile' ]);
$app->post('/acc/change-password', [ MainController::class, 'changePassword' ]);

// Messages routes
$app->post('/messages/send', [ MainController::class, 'sendMessage' ]);
$app->get('/messages/retrieve/{conversation_id}', [ MainController::class, 'retrieveMessage' ]);

// Media routes
$app->post('/media/upload', [ MainController::class, 'uploadMedia' ]);
$app->get('/media/{media_id}', [ MainController::class, 'getMedia' ]);

// Calendar routes
$app->post('/calendar/add-event', [ MainController::class, 'addEvent' ]);
$app->get('/calendar/events', [ MainController::class, 'getEvents' ]);
$app->post('/calendar/remove-event', [ MainController::class, 'removeEvent' ]);
$app->post('/calendar/update-event', [ MainController::class, 'updateEvent' ]);
$app->get('/calendar/event/{event_id}', [ MainController::class, 'getEventById' ]);

// Scalar routes
$app->get('/scalar/ui', [MainController::class, 'scalarUI' ]);
$app->get('/scalar/openapi', [MainController::class, 'scalarOpenapi' ]);