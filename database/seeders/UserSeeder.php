<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    use WithoutModelEvents;
    
    public function run()
    {
        $users = User::factory()->count(5)->hasVehicles(2)->create();
        
        //Com o conhecimento que tenho agora eu não consegui preencher a tabela de manutenção usando seeder/factory
    }
}
