<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\Hash;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class usuario extends Seeder
{
 
    public function run(): void
    {
        $usuario = new \App\Models\Usuario;
        $usuario -> usuario = 'Andre';
        $usuario -> senha = Hash::make('teste123');
        $usuario -> email = 'teste123@gmail.com';
        $usuario ->save();

    }
}
