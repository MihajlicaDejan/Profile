<?php

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Setting::create([
            'site_name'         => "Laravel's Blog",
            'address'           => 'Novi Sad, Srbija',
            'contact_number'    => '069 525 58 34',
            'contact_email'     => 'mihajlicad@gmail.com'
        ]);
    }
}
