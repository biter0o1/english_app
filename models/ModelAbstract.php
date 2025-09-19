<?php

abstract class ModelAbstract {
    protected static string $table;
    protected static string $order_by = '';

    public static function getAll(): array {
        $sql = "SELECT * FROM ".static::$table;

        if (!empty(static::$order_by)){
            $sql .= " ORDER BY ".static::$order_by;
        }
        
        $stmt = DB::conn()->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}