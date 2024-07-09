<?php

namespace Student\Controller;

use Student\Models\AlunosModels;

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
            'nome' => $_POST['nome'],
            'email' => $_POST['email'],
            'telefone' => $_POST['telefone'],
            'valorMensalidade' => $_POST['valor_mensalidade'],
            'senha' => $_POST['senha'],
            'situacao' => $_POST['situacao'],
            'observacao' => $_POST['observacao']
        );

        return $studentData;
    }


    public function create()
    {
        $conexao = Conexao::conectar();
        if (!$conexao) {
            return false;
        }

        $aluno = new AlunosModels($conexao);
        $addAlunos = $aluno->adicionarAluno($this->getStudent());

        return $addAlunos;
    }

}
