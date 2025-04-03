<?php

namespace Database\Seeders;

use App\Models\Tutor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TutorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tutors = [
            [
                'nome_tutor'      => 'Carlos Silva',
                'endereco'        => 'Rua A, Nº 10',
                'telefone_tutor'  => '900000001',
                'whatsapp'        => '900000001',
                'nivel_academico' => 'Mestre em Matemática',
                'descricao'       => 'Especialista em cálculo e álgebra.',
                'id_user' => 6
            ],
            [
                'nome_tutor'      => 'Mariana Costa',
                'endereco'        => 'Rua B, Nº 20',
                'telefone_tutor'  => '900000002',
                'whatsapp'        => '900000002',
                'nivel_academico' => 'Doutora em Física',
                'descricao'       => 'Professora com foco em mecânica quântica.',
                'id_user' => 7
                
            ],
            [
                'nome_tutor'      => 'Roberto Lima',
                'endereco'        => 'Avenida Central, Nº 30',
                'telefone_tutor'  => '900000003',
                'whatsapp'        => '900000003',
                'nivel_academico' => 'Licenciado em Informática',
                'descricao'       => 'Desenvolvedor web e professor de programação.',
                'id_user' => 8
                
            ],
            [
                'nome_tutor'      => 'Fernanda Oliveira',
                'endereco'        => 'Travessa das Flores, Nº 40',
                'telefone_tutor'  => '900000004',
                'whatsapp'        => '900000004',
                'nivel_academico' => 'Mestre em Química',
                'descricao'       => 'Experiência em química orgânica e inorgânica.',
                'id_user' => 9
               
            ],
            [
                'nome_tutor'      => 'André Souza',
                'endereco'        => 'Rua do Sol, Nº 50',
                'telefone_tutor'  => '900000005',
                'whatsapp'        => '900000005',
                'nivel_academico' => 'Doutor em História',
                'descricao'       => 'Pesquisador e professor de história antiga.',
                'id_user' => 10
            ],
        ];


        foreach ($tutors as $tutor) {
            Tutor::create($tutor);
        }
    }
}
