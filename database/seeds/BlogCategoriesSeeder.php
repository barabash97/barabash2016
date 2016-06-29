<?php

use Illuminate\Database\Seeder;

class BlogCategoriesSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('blog_categories')->insert([
            [
                'title' => 'Cronaca',
                'description' => ''
            ],
            [
                'title' => 'Politica',
                'description' => ''
            ],
            [
                'title' => 'Economia',
                'description' => ''
            ],
            [
                'title' => 'Mondo',
                'description' => ''
            ],
            [
                'title' => 'Cultura',
                'description' => ''
            ],
            [
                'title' => 'Tecnologia',
                'description' => ''
            ],
            [
                'title' => 'Sport',
                'description' => ''
            ],
            [
                'title' => 'Viaggio',
                'description' => ''
            ],
            [
                'title' => 'Scienza',
                'description' => ''
            ],
            [
                'title' => 'Istruzione',
                'description' => ''
            ]
        ]);
    }

}
