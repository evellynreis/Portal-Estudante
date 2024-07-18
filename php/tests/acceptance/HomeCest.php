<?php

class HomeCest
{
    public function frontpageWorks(AcceptanceTester $I)
    {
        $I->amOnPage('src/Views/home/index.php');
        $I->see('Lista de Alunos');
    }
}