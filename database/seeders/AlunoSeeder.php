<?php

namespace Database\Seeders;

use App\Models\Aluno;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AlunoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $alunos = [
            [
                'nome_aluno'      => 'João Pereira',
                'nivel_academico' => 'Ensino Médio',
                'telefone_aluno'  => '900000010',
                'descricao'       => 'Aluno interessado em ciências exatas.',
                'id_user'         => 1, // Assumindo que já existe um user com esse ID
                
            ],
            [
                'nome_aluno'      => 'Herman Hoque',
                'nivel_academico' => 'Graduação',
                'telefone_aluno'  => '900000011',
                'descricao'       => 'Busca aprimorar conhecimentos em programação.',
                'id_user'         => 2,
                
            ],
            [
                'nome_aluno'      => 'Lucas Fernandes',
                'nivel_academico' => 'Ensino Médio',
                'telefone_aluno'  => '900000012',
                'descricao'       => 'Focado em matemática e física.',
                'id_user'         => 3,
               
            ],
            [
                'nome_aluno'      => 'Mariana Lima',
                'nivel_academico' => 'Mestrado',
                'telefone_aluno'  => '900000013',
                'descricao'       => 'Pesquisadora em biotecnologia.',
                'id_user'         => 4,
                
            ],
            [
                'nome_aluno'      => 'Pedro Santos',
                'nivel_academico' => 'Doutorado',
                'telefone_aluno'  => '900000014',
                'descricao'       => 'Estuda inteligência artificial.',
                'id_user'         => 5,
                
            ],
        ];

        foreach ($alunos as $aluno) {
            Aluno::create($aluno);
        }
    }
}
