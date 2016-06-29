<?php

use Illuminate\Database\Seeder;

class MessagesSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('messages')->insert(
                [ [
                        'sender_id' => 1,
                        'dialog_id' => 1,
                        'text' => 'Ciao'
                    ],
                    [
                        'sender_id' => 2,
                        'dialog_id' => 1,
                        'text' => 'Eii'
                    ],
                    [
                        'sender_id' => 1,
                        'dialog_id' => 1,
                        'text' => 'Che stai facendo'
                    ]]
        );
    }

}
