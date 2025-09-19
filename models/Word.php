<?php
require_once __DIR__ . '/../core/DB.php';
require_once __DIR__ . '/ModelAbstract.php';

class Word extends ModelAbstract {
    protected static string $table = 'words';
    protected static string $order_by = 'created_at DESC';

    public static function create(string $word, string $translation): bool {
        $stmt = DB::conn()->prepare("INSERT INTO ".static::$table." (word, translation) VALUES (?, ?)");
        return $stmt->execute([$word, $translation]);
    }
}
