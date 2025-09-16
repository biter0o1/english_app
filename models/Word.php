<?php
require_once __DIR__ . '/../core/DB.php';

class Word {
    public static function getAll(): array {
        $stmt = DB::conn()->query("SELECT * FROM words ORDER BY created_at DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function create(string $word, string $translation): bool {
        $stmt = DB::conn()->prepare("INSERT INTO words (word, translation) VALUES (?, ?)");
        return $stmt->execute([$word, $translation]);
    }
}
