<?php
include_once "../../../vendor/autoload.php";
use Student\Controller\AlunosController;

$controller = new AlunosController();

if (isset($_GET['action']) && $_GET['action'] === 'delete' && isset($_GET['id'])) {
    $deleted = $controller->delete($_GET['id']);
    if ($deleted) {
        $deleteMessage = '<div class="alert alert-success" role="alert">Aluno excluído com sucesso!</div>';
    } else {
        $deleteMessage = '<div class="alert alert-danger" role="alert">Erro ao excluir aluno.</div>';
    }
}

$todosAlunos = $controller->index();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Alunos</title>
</head>

<body>

    <div class="container mt-5">
        <h2 class="d-flex justify-content-between">Lista de Alunos
            <button type="button" class="btn btn-primary">
                <a href="/src/Views/create/index.php"
                    style="color: inherit; text-decoration: none; display: block;">Adicionar</a>
            </button>
        </h2>

        <?php
        if (isset($deleteMessage)) {
            echo $deleteMessage;
        }
        ?>

        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Situação</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($todosAlunos)): ?>
                    <?php foreach ($todosAlunos as $aluno): ?>
                        <tr>
                            <td><?php echo $aluno['id']; ?></td>
                            <td><?php echo $aluno['nome']; ?></td>
                            <td><?php echo $aluno['situacao'] == 1 ? 'Ativo' : 'Inativo' ?></td>
                            <td>
                                <a href="/src/Views/update/index.php?id=<?php echo $aluno['id']; ?>" 
                                    class="btn btn-primary">Editar</a>
                                <a href="?action=delete&id=<?php echo $aluno['id']; ?>"
                                    onclick="return confirm('Tem certeza que deseja excluir este aluno?')"
                                    class="btn btn-danger">Excluir</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="4">Nenhum aluno encontrado.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
