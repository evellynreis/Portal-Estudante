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

    private function getStudent()
    {
        $studentData = array(
            'nome' => $_POST['nome'] ?? '',
            'email' => $_POST['email'] ?? '',
            'telefone' => $_POST['telefone'] ?? '',
            'valorMensalidade' => $_POST['valor_mensalidade'] ?? '',
            'senha' => $_POST['senha'] ?? '',
            'situacao' => $_POST['situacao'] ?? '',
            'observacao' => $_POST['observacao'] ?? ''
        );

        return $studentData;
    }

    public function create()
    {
        $conexao = Conexao::conectar();
        if (!$conexao) {
            return false;
        }

        $studentData = $this->getStudent();
        if (empty($studentData['nome']) || empty($studentData['senha'])) {
            return false;
        }

        $aluno = new AlunosModels($conexao);
        $addAlunos = $aluno->adicionarAluno(
            $studentData['nome'],
            $studentData['email'],
            $studentData['telefone'],
            $studentData['valorMensalidade'],
            $studentData['senha'],
            $studentData['situacao'],
            $studentData['observacao']
        );

        return $addAlunos;
    }

}
?>