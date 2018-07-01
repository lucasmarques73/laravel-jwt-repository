<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Entities\User\User::class,5)->create();
        factory(\App\Entities\User\User::class)->create([
        	'name' => 'Lucas Marques',
	        'email' => 'lucasmarques73@hotmail.com',
	        'password' => bcrypt('secret'),
	        'remember_token' => str_random(10),
			'rg' => '15801216',
			'cpf' => '10815386605',
			'gender' => 'M',
			'birth' => '1993-07-25',
			'avatar' => 'https://lorempixel.com/640/480/cats/?40330',
        ]);
    }
}
