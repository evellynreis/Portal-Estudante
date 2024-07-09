<?php
namespace Student\Controller;

use PDO;
use PDOException;

class Conexao
{
    private static $conexao;

    private function __construct() {}

    public static function conectar(): PDO
    {
        if (empty(self::$conexao)) {
            $host = getenv('DB_HOST') ?: 'db';
            $user = getenv('DB_USER') ?: 'admin';
            $password = getenv('DB_PASSWORD') ?: 'admin';
            $db = getenv('DB_NAME') ?: 'test_db';

            try {
                $dsn = "mysql:host={$host};dbname={$db};charset=utf8";
                self::$conexao = new PDO($dsn, $user, $password);
                self::$conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die('Falha na conexão: ' . $e->getMessage());
            }
        }
        return self::$conexao;
    }
}
?>
