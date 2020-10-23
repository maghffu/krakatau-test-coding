<?php
namespace App\Controllers;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Psr\Http\Message\ResponseInterface;
use Laminas\Diactoros\Response\HtmlResponse;

class TodoCreate implements RequestHandlerInterface{
  
  public function handle (ServerRequestInterface $request) : ResponseInterface {
    return new HtmlResponse("<h1>It works!</h1>");
  }

}