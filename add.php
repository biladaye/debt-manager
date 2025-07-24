<?php
require 'config/db.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $pdo->prepare("INSERT INTO debts (creditor, total, paid) VALUES (?, ?, ?)");
    $stmt->execute([$_POST['creditor'], $_POST['total'], $_POST['paid']]);
    header('Location: dashboard.php');
}
?>
<form method="POST">
    <h2>Add Debt</h2>
    <input name="creditor" placeholder="Creditor" required><br>
    <input name="total" placeholder="Total Amount" required type="number" step="0.01"><br>
    <input name="paid" placeholder="Paid Amount" required type="number" step="0.01"><br>
    <button type="submit">Add</button>
</form>
