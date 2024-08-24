<?php
include_once __DIR__ . '/../../../config/database.php';

$id = $_GET['id'] ?? null;

if (!$id) {
    header('Location: index.php');
    exit;
}

$stmt = $pdo->prepare('SELECT * FROM contatos WHERE id = :id');
$stmt->execute(['id' => $id]);
$contato = $stmt->fetch();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nome       = $_POST['nome'];
    

    $sql = "UPDATE contatos SET nome = :nome WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id' => $id, 'nome' => $nome]);

    header('Location: index.php');
    exit;
}
?>

<?php include_once(__DIR__ . '/../../template/header.php'); ?>

<div class="container my-5">
    <h2>Editar contato</h2>
    <form method="post">

        <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" id="nome" name="nome" class="form-control" value="<?= htmlspecialchars($contato['nome']) ?>" required>
        </div>

        <button type="submit" class="btn btn-primary">Salvar</button>
        <a href="index.php" class="btn btn-secondary">Voltar</a>
    </form>
</div>

<?php include_once(__DIR__ . '/../../template/footer.php'); ?>

