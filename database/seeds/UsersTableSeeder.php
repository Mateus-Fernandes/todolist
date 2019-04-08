<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Vibbraneo',
            'email' => 'vibbraneo@vibbra.com.br',
            'password' => bcrypt('123456'),
        ]); // Seed helper
    }
}
