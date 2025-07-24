<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: auth/login.php");
    exit;
}

require 'config/db.php';
$debts = $pdo->query("SELECT * FROM debts")->fetchAll(PDO::FETCH_ASSOC);

$total = $pdo->query("SELECT SUM(total) FROM debts")->fetchColumn();
$paid = $pdo->query("SELECT SUM(paid) FROM debts")->fetchColumn();
$remaining = $total - $paid;
?>

<h2>Debt Dashboard</h2>
<p><a href="auth/logout.php">Logout</a></p>
<p>Total: <?= $total ?> | Paid: <?= $paid ?> | Remaining: <?= $remaining ?></p>
<a href="add.php">+ Add New Debt</a>
<table border="1" cellpadding="5">
    <tr>
        <th>Creditor</th><th>Total</th><th>Paid</th><th>Remaining</th><th>Actions</th>
    </tr>
    <?php foreach ($debts as $d): ?>
    <tr>
        <td><?= htmlspecialchars($d['creditor']) ?></td>
        <td><?= $d['total'] ?></td>
        <td><?= $d['paid'] ?></td>
        <td><?= $d['total'] - $d['paid'] ?></td>
        <td>
            <a href="edit.php?id=<?= $d['id'] ?>">Edit</a> |
            <a href="delete.php?id=<?= $d['id'] ?>" onclick="return confirm('Delete?')">Delete</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
