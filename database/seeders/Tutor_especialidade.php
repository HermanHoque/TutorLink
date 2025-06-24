<?php

namespace Database\Seeders;

use App\Models\Tutor_especialidade as ModelsTutor_especialidade;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Tutor_especialidade extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $dados = [
            ['id_tutor' => 1,'id_especialidade' => 1],
            ['id_tutor' => 1,'id_especialidade' => 2],
            ['id_tutor' => 1,'id_especialidade' => 11],
            ['id_tutor' => 1,'id_especialidade' => 4],

            ['id_tutor' => 2,'id_especialidade' => 2],

            ['id_tutor' => 3,'id_especialidade' => 19],
            ['id_tutor' => 3,'id_especialidade' => 5],

            ['id_tutor' => 4,'id_especialidade' => 3],

            ['id_tutor' => 5,'id_especialidade' => 6],
        ];

        foreach ($dados as $dado) {
            ModelsTutor_especialidade::create($dado);
        }
    }
}
