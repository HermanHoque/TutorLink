<?php

namespace App\Http\Controllers;

use App\Models\Avaliacao;
use Illuminate\Http\Request;

class AvaliacaoController extends Controller
{
    public function saveAvaliacao(Request $request)
    {
        // Validação dos dados recebidos
        $validatedData = $request->validate([
            'clareza' => 'required|numeric|min:0|max:10',
            'dominio' => 'required|numeric|min:0|max:10',
            'interatividade' => 'required|numeric|min:0|max:10',
            'organizacao' => 'required|numeric|min:0|max:10',
            'comentario' => 'nullable|string|max:1000',
            'id_tutor' => 'required|exists:tutor,id',
            'id_aluno' => 'required|exists:aluno,id',
        ]);

        // Criação de uma nova avaliação
        $avaliacao = new Avaliacao;
        $avaliacao->clareza = $validatedData['clareza'];
        $avaliacao->dominio = $validatedData['dominio'];
        $avaliacao->interatividade = $validatedData['interatividade'];
        $avaliacao->organização = $validatedData['organizacao'];
        $avaliacao->comentario = $validatedData['comentario'] ?? null;
        $avaliacao->id_tutor = $validatedData['id_tutor'];
        $avaliacao->id_aluno = $validatedData['id_aluno'];
        $avaliacao->save();

        return redirect()->back()->with('notif', 'Avaliação enviada com sucesso!');
        
    }
}
