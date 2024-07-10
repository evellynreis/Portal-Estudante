<?php
// Inicia o buffering de saída
ob_start();

include_once "../../../vendor/autoload.php";
use Student\Controller\AlunosController;

$controller = new AlunosController();

if (isset($_GET['id'])) {
    $aluno = $controller->getAluno($_GET['id']);
    if (!$aluno) {
        echo '<div class="alert alert-danger" role="alert">Aluno não encontrado.</div>';
        exit;
    }
} else {
    echo '<div class="alert alert-danger" role="alert">ID do aluno não especificado.</div>';
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $updateSuccess = $controller->update($_POST);
    if ($updateSuccess) {
        echo '<div class="alert alert-success" role="alert">Aluno atualizado com sucesso!</div>';
        header('Location: /src/Views/home/index.php');
        exit();
    } else {
        echo '<div class="alert alert-danger" role="alert">Erro ao atualizar aluno.</div>';
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Editar Aluno</title>
</head>

<body>

    <div class="container mt-5">
        <h2>Editar Aluno:</h2>

        <form action="" method="post">
            <input type="hidden" name="id" value="<?php echo $aluno['id']; ?>">
            <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome" value="<?php echo $aluno['nome']; ?>"
                    required>
            </div>
            <div class="form-group">
                <label for="email">E-mail</label>
                <input type="email" class="form-control" id="email" name="email"
                    value="<?php echo $aluno['email']; ?>">
            </div>
            <div class="form-group">
                <label for="telefone">Telefone</label>
                <input type="text" class="form-control" id="telefone" name="telefone"
                    value="<?php echo $aluno['telefone']; ?>" maxlength="11">
            </div>
            <div class="form-group">
                <label for="valor_mensalidade">Valor da Mensalidade</label>
                <input type="text" class="form-control" id="valor_mensalidade" name="valor_mensalidade"
                    value="<?php echo $aluno['valor_mensalidade']; ?>">
            </div>
            <div class="form-group">
                <label for="senha">Senha</label>
                <input type="password" class="form-control" id="senha" name="senha" required>
            </div>
            <div class="form-group">
                <label for="situacao">Situação</label>
                <select class="form-control" id="situacao" name="situacao" required>
                    <option value="1" <?php echo $aluno['situacao'] == 1 ? 'selected' : ''; ?>>Ativo</option>
                    <option value="0" <?php echo $aluno['situacao'] == 0 ? 'selected' : ''; ?>>Inativo</option>
                </select>
            </div>
            <div class="form-group">
                <label for="observacao">Observação</label>
                <textarea class="form-control" id="observacao" name="observacao"
                    rows="3"><?php echo $aluno['observacao']; ?></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Salvar</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>

<?php
// Limpa o buffer de saída e envia o conteúdo ao navegador
ob_end_flush();
?>
