<?php
require_once 'database.php';
require_once 'select.php';   

$db  = new Database();
$pdo = $db->connexion();

listAllMember($pdo);

