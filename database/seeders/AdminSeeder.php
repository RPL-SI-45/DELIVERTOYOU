<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin12345678'),
            'role' => 'admin',
            'tanggal_lahir' => '2000-01-01', // Ubah sesuai kebutuhan
            'nomor_telepon' => '1234567890', // Ubah sesuai kebutuhan
            'alamat' => 'Alamat Admin', // Ubah sesuai kebutuhan
        ]);
    }
}
