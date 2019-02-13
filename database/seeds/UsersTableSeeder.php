<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        factory(App\User::class, 50)->create()->each(function ($u) {
//            $u->posts()->save(factory(App\Post::class)->make());
//        });

        DB::table('users')->insert([
            'name' => 'name'.str_random(4),
            'email' => 'email'.str_random(3) . '@gmail.com',
            'password' => '123',
            'user_mobile' => random_int(1,1000),
            'user_type' =>'0',

        ]);
    }
}
