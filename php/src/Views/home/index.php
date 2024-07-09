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
    <form method="post" action="">
        <label for="filtrar-tabela">Procurar pelo Aluno:</label>
        <input type="text" name="filtro_nome" id="filtrar-tabela" placeholder="Digite o nome:">
        <input type="submit" id="filtragem" value="Filtrar">
    </form>

    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Título</th>
                <th scope="col">Descrição</th>
                <th scope="col">Status</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($todosAlunos)): ?>
                <?php foreach ($todosAlunos as $aluno): ?>
                    <tr>
                        <td><?php echo $aluno['nome']; ?></td>
                        <td><?php echo ''; ?></td>
                        <td><?php echo $aluno['status']; ?></td>
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