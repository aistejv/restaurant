<?php

use App\Dish;
use App\Main;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class DishSeeder extends Seeder
{
  protected $dish;
  protected $main;
  protected $faker;

  public function __construct(Dish $dish, Main $main, Faker $faker){
    $this->dish = $dish;
    $this->main = $main;
    $this->faker = $faker;
  }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $main_id = $this->main->pluck('id');
      $faker = $this->faker->create();
      foreach(range(1,20) as $index){
        $this->dish->create([
          'title' => $faker->word(),
          'description' => $faker->realText(50,2),
          'image_url' => $faker->imageUrl(400, 400, 'food'),
          'price' => $faker->randomFloat(2, 5, 50),
          'main_id' => $main_id->random(),
        ]);
      }

    }
}
