<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class)->create(
            ['name' => '自分', 'email' => 'aa@bb.net']
        );

        factory(App\User::class, 9)->create();

        factory(App\Admin::class)->create(
            ['username' => 'taro', 'password' => bcrypt('jiro')]
        );

        factory(App\Message::class, 20)->create();
    }
}
