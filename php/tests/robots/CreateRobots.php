<?php

class CreateRobots
{
    public AcceptanceTester $tester;
    public function __construct(AcceptanceTester $tester)
    {
        $this->tester = $tester;
    }

    public function pageCreate()
    {
        $this->tester->amOnPage('src/Views/create/index.php');
    }

    public function btnSave()
    {
        $this->tester->click('#save');
    }

    public function btnGoBack()
    {
        $this->tester->click('#goBack');
    }

    public function nome($nome)
    {
        $this->tester->fillField('#nome', $nome);
    }

    public function email($email)
    {
        $this->tester->fillField('#email', $email);
    }

    public function telefone($telefone)
    {
        $this->tester->fillField('#telefone', $telefone);
    }

    public function valorMensalidade($valorMensalidade)
    {
        $this->tester->fillField('#valor_mensalidade', $valorMensalidade);
    }

    public function senha($senha)
    {
        $this->tester->fillField('#senha', $senha);
    }

    public function situacao($situacao)
    {
        $this->tester->selectOption('#situacao', $situacao);
    }

    public function observacao($observacao)
    {
        $this->tester->fillField('#observacao', $observacao);
    }
}