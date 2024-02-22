<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
      User::create([
        'name' => 'Dodek Mardana',
        'email' => 'dewamardana@gmail.com',//ganti pake emailmu
        'password' => bcrypt('12345678'),//passwordnya 123456789
        'phone' => '085852527575',
        'alamat' => 'Bali, Indonesia',
        'role' => 'admin',//kita akan membuat akun atau users in dengan role admin
        ]);
    }
}
