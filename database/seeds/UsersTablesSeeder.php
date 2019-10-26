<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\User;

class UsersTablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
        	'name' => 'Tanszéki Ügyintéző',
        	'email' => 'tsz.ui@sze.hu',
        	'password' => Hash::make('Asd12345'),
            'inactive' => false,
            'superuser' => true,
            'biralhat' => true,
            'szabit_kiirhat' => true,
            'adatot_modosithat' => true,
            'orarend_felelos' => true
        ]);
    }
}
