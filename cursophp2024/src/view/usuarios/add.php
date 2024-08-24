<?php
include_once __DIR__ . '/../../../config/database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nome       = $_POST['nome'];
    $email  = $_POST['email'];
    $senha      = $_POST['senha'];

    $sql = "INSERT INTO usuarios (nome, email, senha) VALUES (:nome, :email, :senha)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['nome' => $nome, 'email' => $email, 'senha' => $senha]);

    header('Location: index.php');
    exit;
}
?>

<?php include_once(__DIR__ . '/../../template/header.php'); ?>

<div class="container my-5">
    <h2>Adicionar usuario</h2>
    <form method="post">

        <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" id="nome" name="nome" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="email">email</label>
            <input type="email" id="email" name="email" class="form-control" required>
        </div>
        
        <div class="form-group">
            <label for="senha">senha</label>
            <input type="senha" id="senha" name="senha" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Salvar</button>
        <a href="index.php" class="btn btn-secondary">Voltar</a>
    </form>
</div>

<?php include_once(__DIR__ . '/../../template/footer.php'); ?>


