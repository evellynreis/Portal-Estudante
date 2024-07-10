<?php
include_once "../../../vendor/autoload.php";
use Student\Controller\AlunosController;

$controller = new AlunosController();
$todosAlunos = $controller->index();
?>

<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Alunos</title>
</head>

<body>

    <h1>Lista de Alunos:</h1>

    <button type="button" class="btn btn-primary">
        <a href="/src/Views/create/index.php"
            style="color: inherit; text-decoration: none; display: block; width: 100%; height: 100%;">Adicionar</a>
    </button>


    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Título</th>
                <th scope="col">Descrição</th>
                <th scope="col">Status</th>
                <th scope="col">Editar</th>
                <th scope="col">Excluir</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($todosAlunos)): ?>
                <?php foreach ($todosAlunos as $aluno): ?>
                    <tr>
                        <td><?php echo $aluno['id']; ?></td>
                        <td><?php echo $aluno['nome']; ?></td>
                        <td><?php echo $aluno['situacao'] == 1 ? 'Ativo' : 'Desativo' ?></td>
                        <td><a href="">Edit</a></td>
                        <td><a href="">Delete</a></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="3">Nenhum aluno encontrado.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

</html>