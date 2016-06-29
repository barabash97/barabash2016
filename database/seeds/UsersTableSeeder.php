<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('users')->insert(
                [[
                    'username' => 'admin',
                    'email' => 'admin@vladicms.it',
                    'firstname' => 'Volodymyr',
                    'lastname' => 'Barabash',
                    'password' => bcrypt('123456')
                    
                ], [
                    'username' => 'andrey.gusev',
                    'email' => 'andrey.gusev@vladicms.it',
                    'firstname' => 'Andrey',
                    'lastname' => 'Gusev',
                    'password' => bcrypt('123456')
                ]]
        );
    }

}
