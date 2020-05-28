<?php

use Illuminate\Database\Seeder;
use App\Product;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $faker = \Faker\Factory::create();

      for($i=0; $i<=25; $i++):
        Product::create([
          'name' => $faker->sentence,
          'resume' => $faker->text(200),
          'description' => $faker->text(400),
          'reference' => $faker->word,
          'quantity' => $faker->randomNumber(2),
          'price' => $faker->randomFloat(2, 0, 100),
          'category_id' => $faker->randomDigitNot(0),
          'active' => $faker->boolean
        ])->setRequestImage($faker->image);
      endfor;
    }
}
