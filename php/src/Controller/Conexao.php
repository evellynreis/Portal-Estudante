<?php
namespace Student\Controller;

use PDO;
use PDOException;

class Conexao
{
    private $host;
    private $user;
    private $password;
    private $db;
    private $conn;
    private static $oConexao;

    private function __construct()
    {
        $this->host = getenv('DB_HOST') ?: 'db';
        $this->user = getenv('DB_USER') ?: 'root';
        $this->password = getenv('DB_PASSWORD') ?: 'root';
        $this->db = getenv('DB_NAME') ?: 'mysql-network';

        try {
            $dsn = "mysql:host={$this->host};dbname={$this->db};charset=utf8";
            $this->conn = new PDO($dsn, $this->user, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die('Falha na conexão: ' . $e->getMessage());
        }
    }

    public static function conectar(): Conexao
    {
        if (empty(self::$oConexao)) {
            self::$oConexao = new Conexao();
        }
        return self::$oConexao;
    }

    public function getConexao()
    {
        return $this->conn;
    }

    public function prepare(string $sql): \PDOStatement
    {
        return $this->conn->prepare($sql);
    }

    public function query(string $sql): ?\PDOStatement
    {
        $stmt = $this->conn->query($sql);
        if ($stmt === false) {
            throw new PDOException("Erro ao executar query: " . implode(":", $this->conn->errorInfo()));
        }
        return $stmt;
    }

    public function getTotalRegistro(string $sTabela): int
    {
        $sRecebe = "SELECT COUNT(*) as total FROM $sTabela;";
        $stmt = $this->query($sRecebe);
        $aResultado = $stmt->fetch(PDO::FETCH_ASSOC);
        return $aResultado['total'];
    }
}