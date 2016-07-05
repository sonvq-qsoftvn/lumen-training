<?php

use Illuminate\Database\Seeder;

class OAuthTableSeeder extends Seeder {
    public function run()
    {
        $config = app()->make('config');
        
        app('db')->table("oauth_clients")->delete();        
       
        app('db')->table("oauth_clients")->insert([
            'id' => $config->get('api.oauth_client_id'),
            'secret' => $config->get('api.oauth_client_secret'),
            'name' => 'Main website'
        ]);
    }
}