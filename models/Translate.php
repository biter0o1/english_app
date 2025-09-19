<?php
require_once __DIR__ . '/../core/DB.php';
require_once __DIR__ . '/ModelAbstract.php';

class Translate extends ModelAbstract {
    protected static string $table = 'translate';
}
