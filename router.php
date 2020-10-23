<?php
use Highway\{Route, Router};

// PSR-7 and PSR-15 interfaces
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Psr\Http\Message\ResponseInterface;

// Implementations of PSR-7 and PSR-15
use Laminas\Diactoros\Response\HtmlResponse;
use Laminas\Diactoros\Response\JsonResponse;
use Laminas\Diactoros\{ServerRequestFactory, Response};
use Laminas\HttpHandlerRunner\Emitter\SapiEmitter;

use App\Controllers\Todos;
use App\Controllers\TodoCreate;
use App\Controllers\TodoDelete;

// Create an instance of PSR-7 ServerRequestInterface object
// using Zend\Diactoros
$request = ServerRequestFactory::fromGlobals(
  $_SERVER,
  $_GET,
  $_POST,
  $_COOKIE,
  $_FILES
);

// Create a new instance of Highway\Router
$router = new Router;

$router->get("/", function (ServerRequestInterface $request) {
  ob_start();
  include "src/Views/todo.php";
  $template = ob_get_contents(); // get contents of buffer
  ob_end_clean();
  return new HtmlResponse($template);
});

$router->get("/todos", new Todos() );

$router->post("/todos/store", new TodoCreate());

$router->delete("/todos/{id}", new TodoDelete());

// Get the response to the request that matches a defined route
$response = $router->match($request)->handle($request);

// Emit the response to the HTTP client
$emitter = new SapiEmitter;
$emitter->emit($response);