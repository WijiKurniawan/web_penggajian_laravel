<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'      => 'Admin',
            'email'     => 'admin@mail.com',
            'password'  => '$2y$10$hMraTgScwOzr3MFyOSlfRO20WRAiu5I8cXZweU2l3EfruSMyQLbVy', //adminlogin123 (Encrypt)
        ]);

        User::create([
            'name'      => 'Admin Pembantu',
            'email'     => 'admin_pembantu@mail.com',
            'password'  => '$2y$10$hMraTgScwOzr3MFyOSlfRO20WRAiu5I8cXZweU2l3EfruSMyQLbVy', //adminlogin123 (Encrypt)
        ]);
    }
}
