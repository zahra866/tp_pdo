<?php
require_once __DIR__.'/database.php';
$pdo = (new Database())->connexion();
echo "✅ Connexion OK<br>";
echo "MySQL: " . $pdo->query("SELECT VERSION()")->fetchColumn();
