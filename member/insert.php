<?php
require_once __DIR__ . '/../database.php';

if (isset($_POST['form_insert'])) {
    $db = new Database();
    $pdo = $db->connexion();

    $sql = $db->addMember(); 
    $stmt = $pdo->prepare($sql);

    $stmt->execute([
        ':lastname'  => $_POST['lastname'] ?? '',
        ':firstname' => $_POST['firstname'] ?? '',
        ':email'     => $_POST['email'] ?? '',
        ':city'      => $_POST['city'] ?? ''
    ]);

    
    header('Location: ../index.php');
    exit;
} else {
    header('Location: ../index.php');
    exit;
}
