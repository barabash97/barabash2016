<?php

use Illuminate\Database\Seeder;

class DialogUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('dialog_users')->insert(
                [[
                    'user_id' => 1,
                    'dialog_id' => 1
                ], [
                    'user_id' => 2,
                    'dialog_id' => 1
                ]]
        );
    }
}
