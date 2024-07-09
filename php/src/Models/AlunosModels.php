<?php
namespace Student\Models;

use Student\Controller\Conexao;

class AlunosModels
{
    private $conn;

    public function __construct(Conexao $conexao)
    {
        $this->conn = $conexao->getConexao();
    }

    public function adicionarAluno($nome, $email, $telefone, $valorMensalidade, $senha, $situacao, $observacao): bool
    {
        $sql = 'INSERT INTO Alunos (nome, email, telefone, valor_mensalidade, senha, situacao, observacao) 
                VALUES (?, ?, ?, ?, ?, ?, ?)';

        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('sssssis', $nome, $email, $telefone, $valorMensalidade, $senha, $situacao, $observacao);

        return $stmt->execute();
    }

    public function exibirAlunos(): array
    {
        $sql = "SELECT id, nome, email, telefone, valor_mensalidade, senha, situacao, observacao FROM Alunos";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }
}
