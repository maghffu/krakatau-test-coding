<?php
namespace App\Models;
class Todo {
  private $data = [
    [ "name" => "Eat"],
    [ "name" => "Sleep"],
    [ "name" => "Dota"],
    [ "name" => "Coding"],
  ];
  public function All()
  {
    return $this->data;
  }
}