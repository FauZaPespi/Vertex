<?php

namespace Fauza\Template\Controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Views\PhpRenderer;
use OpenApi\Attributes as OA;
use Fauza\Template\Services\MistralService;
use Fauza\Template\Services\Database;
use Fauza\Template\Models\User;
use Fauza\Template\Models\Session;
use Fauza\Template\Models\Message;
use Fauza\Template\Models\CalendarEvent;

class MainController
{
    public function __construct() {}

    function apiInfo(Request $req, Response $resp, array $args): Response
    {
        $api = [
            'name' => "Vertex API",
            'version' => "1.0.0",
            'description' => "API for Vertex application",
            'documentation' => "/scalar/ui"
        ];
        $resp = $resp->withHeader('Content-type', 'application/json');
        $resp->getBody()->write(json_encode($api));
        return $resp;
    }

    function health(Request $req, Response $resp, array $args): Response
    {
        $api = [
            'status' => "ONLINE",
            'version' => "1.0.0",
            'ping' => round((microtime(true) - $_SERVER["REQUEST_TIME_FLOAT"]), 2) . " seconds",
            'description' => "API for Vertex application",
        ];
        $resp = $resp->withHeader('Content-type', 'application/json');
        $resp->getBody()->write(json_encode($api));
        return $resp;
    }

    function login(Request $req, Response $resp, array $args): Response
    {
        $requestBody = $req->getParsedBody();
        $username = $requestBody['username'] ?? '';
        $password = $requestBody['password'] ?? '';
        if (empty($username) || empty($password)) {
            $resp->getBody()->write(json_encode(['error' => 'Missing username or password']));
            return $resp->withHeader('Content-type', 'application/json')->withStatus(400);
        }

        // Find the user
        $user = User::findByUsername($username);
        $authentificate = $user->checkPassword($password);
        if (!$authentificate) {
            $resp->getBody()->write(json_encode(['error' => 'Invalid username or password']));
            return $resp->withHeader('Content-type', 'application/json')->withStatus(401);
        }
        // Create session
        $resp->getBody()->write(json_encode(['message' => 'Login successful', 'userId' => $user->getId()]));
        return $resp->withHeader('Content-type', 'application/json')->withStatus(200);
    }

    function register(Request $req, Response $resp, array $args): Response
    {
        $requestBody = $req->getParsedBody();
        $username = $requestBody['username'] ?? '';
        $email = $requestBody['email'] ?? '';
        $password = $requestBody['password'] ?? '';

        if (empty($username) || empty($email) || empty($password)) {
            $resp->getBody()->write(json_encode(['error' => 'Missing required fields']));
            return $resp->withHeader('Content-type', 'application/json')->withStatus(400);
        }
        // Check if user already exists
        if (User::exists($username, $email)) {
            $resp->getBody()->write(json_encode(['error' => 'User already exists']));
            return $resp->withHeader('Content-type', 'application/json')->withStatus(409);
        }
        // Create new user
        User::create($username, $email, $password);
        $resp->getBody()->write(json_encode(['message' => 'User registered successfully']));

        return $resp->withHeader('Content-type', 'application/json')->withStatus(201);
    }

    function profile(Request $req, Response $resp, array $args): Response {}

    function changePassword(Request $req, Response $resp, array $args): Response {}

    function logout(Request $req, Response $resp, array $args): Response {}

    function sendMessage(Request $req, Response $resp, array $args): Response {}

    function retrieveMessage(Request $req, Response $resp, array $args): Response {}

    function uploadMedia(Request $req, Response $resp, array $args): Response {}

    function getMedia(Request $req, Response $resp, array $args): Response {}

    function addEvent(Request $req, Response $resp, array $args): Response
    {
        return $resp;
    }

    function getEvents(Request $req, Response $resp, array $args): Response
    {
        return $resp;
    }

    function removeEvent(Request $req, Response $resp, array $args): Response
    {
        return $resp;
    }

    function updateEvent(Request $req, Response $resp, array $args): Response
    {
        return $resp;
    }

    function getEventById(Request $req, Response $resp, array $args): Response
    {
        return $resp;
    }

    function scalarOpenapi(Request $req, Response $resp, array $args): Response
    {
        // Scan the src directory for OpenAPI annotations
        $openapi = \OpenApi\Generator::scan([__DIR__ . '/../']);

        // Support both YAML and JSON format via query parameter
        $format = $req->getQueryParams()['format'] ?? 'yaml';

        if ($format === 'json') {
            $content = $openapi->toJson();
            $contentType = 'application/json';
        } else {
            $content = $openapi->toYaml();
            $contentType = 'application/x-yaml';
        }

        $resp->getBody()->write($content);
        return $resp->withHeader('Content-Type', $contentType);
    }

    function scalarUI(Request $req, Response $resp, array $args): Response
    {
        $view = new PhpRenderer("../view");
        $view->setLayout("layout.php");
        $data = [
            'title' => "Scalar API Documentation",
        ];
        return $view->render($resp, 'scalar.php', $data);
    }
}
