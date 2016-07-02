<?php

use App\Model\Article;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class ArticleTableSeeder extends Seeder
{
	public function run()
	{
		factory(Article::class, 10)->create();
	}
}