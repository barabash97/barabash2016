<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $this->call(BlogCategoriesSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(BlogsSeeder::class);
        $this->call(BlogArticlesSeeder::class);
        $this->call(DialogsSeeder::class);
        $this->call(DialogUsersSeeder::class);
        $this->call(MessagesSeeder::class);
    }

}
