<?php
namespace App\Controllers;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Psr\Http\Message\ResponseInterface;
use Laminas\Diactoros\Response\HtmlResponse;
use Laminas\Diactoros\Response\JsonResponse;
use App\Models\Todo;

class Todos implements RequestHandlerInterface{

  private $todo;

  public function __construct() {
    $this->todo = new Todo();
  }
  
  public function handle (ServerRequestInterface $request) : ResponseInterface {
    $data = $this->todo->all();
    $response = [ 
      "meta" => [ "Author" => "Maghfurin" ],
      "data" => $data
    ];
    return new JsonResponse($response);
  }

}