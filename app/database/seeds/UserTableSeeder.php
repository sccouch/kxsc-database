<?php

class UserTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('users')->delete();
        User::create(array(
            'name'     => 'David Tang',
            'username' => 'david',
            'email'    => 'itpwebdev@gmail.com',
            'password' => Hash::make('laravel'),
        ));
    }

}