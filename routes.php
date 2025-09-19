<?php
require_once __DIR__ . '/controllers/WordController.php';
require_once __DIR__ . '/controllers/TranslateController.php';

$router->get('/', [WordController::class, 'index']);
$router->get('/words', [WordController::class, 'list']);

$router->get('/translate', [TranslateController::class, 'index']);
$router->post('/translate/check', [TranslateController::class, 'check']);

$router->post('/words/add', [WordController::class, 'add']);