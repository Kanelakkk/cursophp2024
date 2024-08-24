<?php
include_once __DIR__ . '/../../../config/database.php';

$id = $_GET['id'] ?? null;

if (!$id) {
    header('Location: index.php');
    exit;
}

$stmt = $pdo->prepare('SELECT * FROM usuarios WHERE id = :id');
$stmt->execute(['id' => $id]);
$usuario = $stmt->fetch();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nome       = $_POST['nome'];
    $email  = $_POST['email'];
    $senha      = $_POST['senha'];

    $sql = "UPDATE usuarios SET nome = :nome, email = :email, senha = :senha WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id' => $id, 'nome' => $nome, 'email' => $email, 'senha' => $senha]);

    header('Location: index.php');
    exit;
}
?>

<?php include_once(__DIR__ . '/../../template/header.php'); ?>

<div class="container my-5">
    <h2>Editar usuario</h2>
    <form method="post">

        <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" id="nome" name="nome" class="form-control" value="<?= htmlspecialchars($usuario['nome']) ?>" required>
        </div>

        <div class="form-group">
            <label for="email">Descrição</label>
            <input type="text" id="email" name="email" class="form-control" value="<?= htmlspecialchars($usuario['email']) ?>" required>
        </div>

        <div class="form-group">
            <label for="senha">Preço</label>
            <input type="number" id="senha" name="senha" class="form-control" value="<?= htmlspecialchars($usuario['senha']) ?>" required>
        </div>

        <button type="submit" class="btn btn-primary">Salvar</button>
        <a href="index.php" class="btn btn-secondary">Voltar</a>
    </form>
</div>

<?php include_once(__DIR__ . '/../../template/footer.php'); ?>

