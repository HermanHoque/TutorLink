<?php

namespace Database\Seeders;

use App\Models\Especialidade;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EspecialidadeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $especialidades = [
            ['nome' => 'Matemática', 'descricao' => 'Estudo de números, formas e padrões.'],
            ['nome' => 'Física', 'descricao' => 'Estudo das leis do universo e suas interações.'],
            ['nome' => 'Química', 'descricao' => 'Ciência que analisa a composição e transformação das substâncias.'],
            ['nome' => 'Estatística', 'descricao' => 'Análise e interpretação de dados numéricos.'],
            ['nome' => 'Programação', 'descricao' => 'Desenvolvimento de softwares e aplicativos.'],
            ['nome' => 'História', 'descricao' => 'Estudo dos eventos e civilizações do passado.'],
            ['nome' => 'Geografia', 'descricao' => 'Análise dos espaços geográficos e suas relações.'],
            ['nome' => 'Filosofia', 'descricao' => 'Reflexão sobre a existência, conhecimento e ética.'],
            ['nome' => 'Sociologia', 'descricao' => 'Estudo das interações e estruturas sociais.'],
            ['nome' => 'Língua Portuguesa', 'descricao' => 'Estudo da gramática, literatura e escrita em português.'],
            ['nome' => 'Inglês', 'descricao' => 'Língua global utilizada em diversas áreas do conhecimento.'],
            ['nome' => 'Espanhol', 'descricao' => 'Língua amplamente falada na América Latina e Espanha.'],
            ['nome' => 'Francês', 'descricao' => 'Língua oficial em diversos países da Europa e África.'],
            ['nome' => 'Biologia', 'descricao' => 'Estudo dos seres vivos e seus processos vitais.'],
            ['nome' => 'Medicina', 'descricao' => 'Ciência da saúde e tratamento de doenças.'],
            ['nome' => 'Enfermagem', 'descricao' => 'Cuidados com a saúde e bem-estar dos pacientes.'],
            ['nome' => 'Nutrição', 'descricao' => 'Estudo da alimentação e seus efeitos na saúde.'],
            ['nome' => 'Desenvolvimento Web', 'descricao' => 'Criação e manutenção de sites e aplicações web.'],
            ['nome' => 'Banco de Dados', 'descricao' => 'Gestão e armazenamento de informações digitais.'],
            ['nome' => 'Redes de Computadores', 'descricao' => 'Conceitos e práticas sobre conexão entre dispositivos.'],
            ['nome' => 'Administração', 'descricao' => 'Gestão de empresas e processos organizacionais.'],
            ['nome' => 'Contabilidade', 'descricao' => 'Controle financeiro e registros econômicos.'],
            ['nome' => 'Economia', 'descricao' => 'Estudo da produção, distribuição e consumo de bens.'],
            ['nome' => 'Marketing Digital', 'descricao' => 'Estratégias de divulgação e promoção online.'],
        ];

        foreach ($especialidades as $especialidade) {
            Especialidade::create($especialidade);
        }

        /* DB::table('especialidade')->insert($especialidades); */
    }
}
