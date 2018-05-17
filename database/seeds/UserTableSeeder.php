<?php

use Illuminate\Database\Seeder;

use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
     protected $user;

     public function __construct(User $user){
       $this->user = $user;
     }

    public function run()
    {
      $this->user->create([
        'name' => 'name',
        'surname' => 'surname',
        'birth' => '1985-04-15',
        'email' => 'email@mail.com',
        'password' => \Hash::make('123456'),
        'address' => 'adress',
        'city' => 'city',
        'zip_code' => 'zipcode',
        'country' => 'country',
      ]);

      $this->user->create([
        'name' => 'admin',
        'surname' => 'adminsurname',
        'birth' => '1985-09-15',
        'email' => 'admin@mail.com',
        'admin' => '1',
        'password' => \Hash::make('adminadmin'),
        'address' => 'Konstitucijos pr. 1',
        'city' => 'Vilnius',
        'zip_code' => 'zip',
        'country' => 'Lithuania',
      ]);
    }
}
