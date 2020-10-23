<?php
use PHPUnit\Framework\TestCase;
use \App\Models\Todo;

class ModelsTodosTest extends TestCase {
  public function testGetAll()
  {
    $todo = new Todo();
    $data = $todo->all();
    foreach ($data as $d) {
      $this->assertArrayHasKey("name", $d); 
    }
  }
}