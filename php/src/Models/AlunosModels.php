<?php
namespace Student\Models;

use PDO;

class AlunosModels
{
    private $conn;

    public function __construct(PDO $conexao)
    {
        $this->conn = $conexao;
    }

    public function adicionarAluno($nome, $email, $telefone, $valorMensalidade, $senha, $situacao, $observacao): bool
    {
        $sql = 'INSERT INTO Alunos (nome, email, telefone, valor_mensalidade, senha, situacao, observacao) 
                VALUES (?, ?, ?, ?, ?, ?, ?)';

        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$nome, $email, $telefone, $valorMensalidade, $senha, $situacao, $observacao]);

        return $stmt->rowCount() > 0;
    }

    public function exibirAlunos(): array
    {
        $sql = "SELECT id, nome, email, telefone, valor_mensalidade, senha, situacao, observacao FROM Alunos";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function buscarAluno($id)
    {
        $sql = "SELECT id, nome, email, telefone, valor_mensalidade, senha, situacao, observacao FROM Alunos WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$id]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function atualizarAluno($id, $nome, $email, $telefone, $valorMensalidade, $senha, $situacao, $observacao): bool
    {
        $sql = 'UPDATE Alunos SET nome=?, email=?, telefone=?, valor_mensalidade=?, senha=?, situacao=?, observacao=? WHERE id=?';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$nome, $email, $telefone, $valorMensalidade, $senha, $situacao, $observacao, $id]);

        return $stmt->rowCount() > 0;
    }

    public function excluirAluno($id): bool
    {
        $sql = 'DELETE FROM Alunos WHERE id = ?';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$id]);

        return $stmt->rowCount() > 0;
    }
}
?>