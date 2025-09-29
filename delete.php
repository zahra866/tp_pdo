<?php
require_once 'database.php';

$db = new Database();
$pdo = $db->connexion();

if (isset($_GET['id']) && ctype_digit($_GET['id'])) {
    $id = (int) $_GET['id'];
    $sql = $db->deleteMemberId();
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':id' => $id]);
    $stmt->closeCursor();
}

header('Location: liste.php');
exit;

