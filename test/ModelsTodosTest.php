<?php
use PHPUnit\Framework\TestCase;
use \App\Models\Todo;

class ModelsTodoTest extends TestCase {
  public function testGetAll()
  {
    $todo = new Todo();
    $data = $todo->all();
    $this->assertArrayHasKey("name", $data); 
  }
}