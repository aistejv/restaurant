<?php
use App\Main;
use Illuminate\Database\Seeder;

class MainsSeeder extends Seeder
{
    protected $main;
    
    public function __construct(Main $main){
      $this->main = $main;
    }
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $this->main->create([
        'title' => 'Appetizers'
      ]);
      $this->main->create([
        'title' => 'Soups'
      ]);
      $this->main->create([
        'title' => 'Salads'
      ]);
      $this->main->create([
        'title' => 'Fish'
      ]);
      $this->main->create([
        'title' => 'Desserts'
      ]);
      $this->main->create([
        'title' => 'Drinks'
      ]);
    }
}
