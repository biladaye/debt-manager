<?php
require 'config/db.php';
$id = $_GET['id'];
$pdo->prepare("DELETE FROM debts WHERE id=?")->execute([$id]);
header("Location: dashboard.php");
