<?php
include_once __DIR__ . '/../../../config/database.php';

// Consultar todos os usuarios
$stmt = $pdo->query('SELECT * FROM usuarios');
$usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!-- Incluindo o topo do site -->
<?php include_once(__DIR__ . '/../../template/header.php'); ?>


<!-- Conteúdo Principal -->
<div class="container my-5">
    <div class="d-flex justify-content-between align-items-center">
        <h2>usuarios</h2>
        <a href="add.php" class="btn btn-primary">Adicionar usuario</a>
    </div>
    <table class="table table-striped mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>email</th>
                <th>senha</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($usuarios as $usuario): ?>
                <tr>
                    <td><?= htmlspecialchars($usuario['id']) ?></td>
                    <td><?= htmlspecialchars($usuario['nome']) ?></td>
                    <td><?= htmlspecialchars($usuario['email']) ?></td>
                    <td><?= htmlspecialchars($usuario['senha']) ?></td>
                    <td>
                        <a href="edit.php?id=<?= $usuario['id'] ?>" class="btn btn-sm btn-warning">Editar</a>
                        <a href="delete.php?id=<?= $usuario['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Tem certeza que deseja excluir este usuario?');">Excluir</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>


<!-- Incluindo o rodape do site -->

<?php include_once(__DIR__ . '/../../template/footer.php'); ?>
