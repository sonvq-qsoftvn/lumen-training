<?php

use App\Model\User;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
	public function run()
	{
		factory(User::class, 10)->create();
	}
}