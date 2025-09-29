<?php
require_once 'database.php';

function updateInfoMember() {
    if (!isset($_GET['id']) || !ctype_digit($_GET['id'])) {
        header('Location: liste.php');
        exit;
    }
    if (!isset($_POST['update'])) {
        header('Location: liste.php');
        exit;
    }

    $id = (int) $_GET['id'];

    $db = new Database();
    $pdo = $db->connexion();

    $sql = $db->updateMemberId();
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':lastname'  => $_POST['lastname'] ?? '',
        ':firstname' => $_POST['firstname'] ?? '',
        ':email'     => $_POST['email'] ?? '',
        ':city'      => $_POST['city'] ?? '',
        ':id'        => $id
    ]);
    $stmt->closeCursor();
}

updateInfoMember();
header('Location: liste.php');
exit;

