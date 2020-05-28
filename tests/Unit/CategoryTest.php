<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Category;

class CategoryTest extends TestCase
{
  public function test_creation_category()
  {
    $faker = \Faker\Factory::create();

    $data = [
      'name' => $faker->word,
    ];

    $category =  new Category($data);

    $this->assertInstanceOf(Category::class, $category);
    $this->assertEquals($data['name'], $category->name);
  }
}
