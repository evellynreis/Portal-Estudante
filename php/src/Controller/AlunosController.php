<?php

namespace Student\Controller;

use Student\Models\AlunosModels;
use Student\Controller\Conexao;

class AlunosController
{
    public function index()
    {
        $conexao = Conexao::conectar();
        $aluno = new AlunosModels($conexao);
        $todosAlunos = $aluno->exibirAlunos();

        return $todosAlunos;
    }

    public function create(array $data)
    {
        $conexao = Conexao::conectar();
        if (!$conexao) {
            return false;
        }

        // Valida os dados recebidos
        if (empty($data['nome']) || empty($data['senha'])) {
            return false;
        }

        $aluno = new AlunosModels($conexao);
        $addAluno = $aluno->adicionarAluno(
            $data['nome'],
            $data['email'] ?? '',
            $data['telefone'] ?? '',
            $data['valor_mensalidade'] ?? '',
            $data['senha'],
            $data['situacao'] ?? 1, // Define um valor padrão se não especificado
            $data['observacao'] ?? ''
        );

        return $addAluno;
    }

    public function delete($id)
    {
        $conexao = Conexao::conectar();
        if (!$conexao) {
            return false;
        }

        $aluno = new AlunosModels($conexao);
        return $aluno->excluirAluno($id);
    }

    public function getAluno($id)
    {
        $conexao = Conexao::conectar();
        if (!$conexao) {
            return null;
        }

        $aluno = new AlunosModels($conexao);
        return $aluno->buscarAluno($id);
    }

    public function update(array $studentData)
    {
        $conexao = Conexao::conectar();
        if (!$conexao) {
            return false;
        }

        $aluno = new AlunosModels($conexao);
        return $aluno->atualizarAluno(
            $studentData['id'],
            $studentData['nome'],
            $studentData['email'],
            $studentData['telefone'],
            $studentData['valor_mensalidade'],
            $studentData['senha'],
            $studentData['situacao'],
            $studentData['observacao']
        );
    }
}

?>