<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [];

        // Criar 5 usuários com perfil aluno
        for ($i = 1; $i <= 5; $i++) {
            $users[] = [
                'email' => "aluno{$i}@gmail.com",
                'password' => bcrypt("senha123"),
                'perfil' => 'aluno'
            ];
        }

        // Criar 5 usuários com perfil tutor
        for ($i = 1; $i <= 5; $i++) {
            $users[] = [
                'email' => "tutor{$i}@gmail.com",
                'password' => bcrypt("senha123"),
                'perfil' => 'tutor'
            ];
        }

        // Inserir os dados no banco
        foreach ($users as $user) {
            User::create($user);
        }
    }
}
