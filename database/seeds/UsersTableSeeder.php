<?php

use Illuminate\Database\Seeder;



class UsersTableSeeder extends Seeder
{

    public function run()
    {
        $user = App\User::create([
            'name'      => 'Dejo',
            'email'     => 'dejo@gmail.com',
            'password'  => '123456',
            'admin'     => 1
        ]);

        App\Profile::create([
            'user_id'   => $user->id,
            'avatar'    => 'uploads/avatars/a.jpg',
            'about'     => 'lalalalalala',
            'facebook'  => 'https://www.facebook.com/',
            'instagram' => 'https://www.instagram.com/'
        ]);
    }
}
