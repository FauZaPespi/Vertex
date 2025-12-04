<?php

namespace Fauza\Template\Middleware;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Server\RequestHandlerInterface as RequestHandler;

/**
 * PHP Session middleware pour gerer les sessions utilisateur
 */
class SessionMiddleware
{
    public function __invoke(Request $request, RequestHandler $handler): Response
    {
        self::ensureSessionStarted();
        return $handler->handle($request);
    }

    public static function ensureSessionStarted(): void
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }

    public static function destroySession(): void
    {
        if (session_status() != PHP_SESSION_NONE) {
            session_unset();
            session_destroy();
        }
    }
    public static function addToSession(string $key, $value): void
    {
        self::ensureSessionStarted();
        $_SESSION[$key] = $value;
    }
    public static function getFromSession(string $key)
    {
        self::ensureSessionStarted();
        return $_SESSION[$key] ?? null;
    }
    public static function removeFromSession(string $key): void
    {
        self::ensureSessionStarted();
        if (isset($_SESSION[$key])) {
            unset($_SESSION[$key]);
        }
    }
}
