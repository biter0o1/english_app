<?php
require_once __DIR__ . '/controllers/WordController.php';

$router->get('/', [WordController::class, 'index']);
$router->get('/words', [WordController::class, 'list']);

$router->post('/words/add', [WordController::class, 'add']);