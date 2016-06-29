<?php

use Illuminate\Database\Seeder;

class DialogsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('dialogs')->insert(
                [
                    'created_by' => 1
                ]
        );
    }
}
