<?php

use Illuminate\Database\Seeder;

class SpacesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('spaces')->insert([
            'owner_user_id' => 'email'.str_random(3) . '@gmail.com',
            'space_name' => '123',
            'space_city' => random_int(1,1000),
            'space_address' =>'0',
            'space_number_of_rooms' =>'0',
            'imageSpace_path' =>'0',

        ]);
    }
}
