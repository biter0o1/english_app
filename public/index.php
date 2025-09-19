<?php
require_once __DIR__ . '/../core/Router.php';
require_once __DIR__ . '/../core/View.php';
require_once __DIR__ . '/../models/Word.php';
require_once __DIR__ . '/../helpers/helpers.php';
require_once __DIR__ . '/../services/ChatService.php';

$router = new Router();

require_once __DIR__ . '/../routes.php';

$router->run();
