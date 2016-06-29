<?php

use Illuminate\Database\Seeder;

class BlogsSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('blogs')->insert(
                [
                    'id_user' => 1,
                    'id_category' => 1,
                    'title' => 'AS ROMA FUN PAGE',
                    'description' => 'Descrizione della pagina'
                ]
        );
    }

}
