<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/../../core/DB.php';
require_once __DIR__ . '/../../config/Config.php';

$db = DB::conn();

$db->exec("
    CREATE TABLE IF NOT EXISTS words (
        id INT AUTO_INCREMENT PRIMARY KEY,
        word VARCHAR(255) NOT NULL,
        translation VARCHAR(255) NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )
");

$stmt = $db->prepare("INSERT INTO words (word, translation) VALUES (?, ?)");
$stmt->execute(['apple', 'jabłko']);
$stmt->execute(['book', 'książka']);

$result = $db->query("SELECT * FROM words")->fetchAll(PDO::FETCH_ASSOC);

echo "<pre>";
print_r($result);
echo "</pre>";
