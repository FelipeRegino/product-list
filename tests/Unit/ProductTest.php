<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Product;

class ProductTest extends TestCase
{

    public function test_creation_product()
    {
      $faker = \Faker\Factory::create();

      $data = [
        'name' => $faker->sentence,
        'resume' => $faker->text(200),
        'description' => $faker->text(400),
        'reference' => $faker->word,
        'quantity' => $faker->randomNumber(2),
        'price' => $faker->randomFloat(2, 0, 100),
        'category_id' => $faker->randomDigitNot(0),
        'active' => $faker->boolean
      ];

      $product =  new Product($data);

      $this->assertInstanceOf(Product::class, $product);
      $this->assertEquals($data['name'], $product->name);
      $this->assertEquals($data['resume'], $product->resume);
      $this->assertEquals($data['description'], $product->description);
      $this->assertEquals($data['reference'], $product->reference);
      $this->assertEquals($data['quantity'], $product->quantity);
      $this->assertEquals($data['price'], $product->price);
      $this->assertEquals($data['category_id'], $product->category_id);
      $this->assertEquals($data['active'], $product->active);
    }
}
