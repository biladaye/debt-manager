<?php
require 'config/db.php';
$id = $_GET['id'];
$debt = $pdo->query("SELECT * FROM debts WHERE id=$id")->fetch();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $pdo->prepare("UPDATE debts SET creditor=?, total=?, paid=? WHERE id=?");
    $stmt->execute([$_POST['creditor'], $_POST['total'], $_POST['paid'], $id]);
    header('Location: dashboard.php');
}
?>
<form method="POST">
    <h2>Edit Debt</h2>
    <input name="creditor" value="<?= $debt['creditor'] ?>" required><br>
    <input name="total" type="number" step="0.01" value="<?= $debt['total'] ?>" required><br>
    <input name="paid" type="number" step="0.01" value="<?= $debt['paid'] ?>" required><br>
    <button type="submit">Save</button>
</form>
