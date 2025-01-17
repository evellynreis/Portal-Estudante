<?php
include_once "../../../vendor/autoload.php";
use Student\Controller\AlunosController;

$controller = new AlunosController();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $resultado = $controller->create($_POST);

    if ($resultado) {
        echo '<div class="alert alert-success" role="alert">Aluno adicionado com sucesso!</div>';
    } else {
        echo '<div class="alert alert-danger" role="alert">Erro ao adicionar aluno. Verifique os campos obrigatórios.</div>';
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
    <title>Cadastrar Aluno</title>
</head>

<body>
    <div class="container mt-5">
        <h2 class="mb-4">Adicionar Aluno</h2>
        <form action="" method="post">
            <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome" required>
            </div>
            <div class="form-group">
                <label for="email">E-mail</label>
                <input type="email" class="form-control" id="email" name="email">
            </div>
            <div class="form-group">
                <label for="telefone">Telefone</label>
                <input type="text" class="form-control" id="telefone" name="telefone" maxlength="11">
            </div>
            <div class="form-group">
                <label for="valor_mensalidade">Valor da Mensalidade</label>
                <input type="text" class="form-control" id="valor_mensalidade" name="valor_mensalidade">
            </div>
            <div class="form-group">
                <label for="senha">Senha</label>
                <input type="password" class="form-control" id="senha" name="senha" required>
            </div>
            <div class="form-group">
                <label for="situacao">Situação</label>
                <select class="form-control" id="situacao" name="situacao" required>
                    <option value="1">Ativo</option>
                    <option value="0">Inativo</option>
                </select>
            </div>
            <div class="form-group">
                <label for="observacao">Observação</label>
                <textarea class="form-control" id="observacao" name="observacao" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary" id="save">Salvar</button>
            <button type="button" class="btn btn-primary" id="goBack">
                <a href="/src/Views/home/index.php" style="color: inherit; text-decoration: none;">Voltar</a>
            </button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>