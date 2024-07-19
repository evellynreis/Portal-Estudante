<?php
require_once 'vendor/autoload.php';
require_once __DIR__ . "/../robots/CreateRobots.php";

class CreateCest
{
    public function _before(AcceptanceTester $tester)
    {
        $tester->amOnPage('src/Views/home/index.php');
        $tester->see('Lista de Alunos');
        sleep(2);
    }

    public function addStudent(AcceptanceTester $teste)
    {
        $nome = 'Aluno teste';
        $email = 'testando@gmail.com';
        $telefone = '79991693420';
        $valorMensalidade = '2000';
        $senha = '123456';
        $situacao = '0'; //inativo
        $observacao = 'Observando';

        $robots = new CreateRobots($teste);
        $robots->pageCreate();
        sleep(4);
        $robots->nome($nome);
        $robots->email($email);
        $robots->telefone($telefone);
        $robots->valorMensalidade($valorMensalidade);
        $robots->senha($senha);
        $robots->situacao($situacao);
        $robots->observacao($observacao);
        
        $robots->btnSave();
        sleep(2);

        $teste->see('Aluno adicionado com sucesso!');

    }
}