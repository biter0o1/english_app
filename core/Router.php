<?php
require_once __DIR__ . '/../controllers/TranslateController.php';
require_once __DIR__ . '/../services/ChatService.php';

class Router {
    private array $routes = [];

    public function get($path, $action) {
        $this->routes['GET'][$path] = $action;
    }

    public function post($path, $action) {
        $this->routes['POST'][$path] = $action;
    }

    private function getCleanPath(): string {
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $basePath = parse_url(Config::BASE_URL, PHP_URL_PATH) ?: '';

        if (strpos($uri, $basePath) === 0) {
            $uri = substr($uri, strlen($basePath));
        }

        $path = '/' . trim($uri, '/');

        return $path === '//' ? '/' : $path;
    }

    public function run() {
        $method = $_SERVER['REQUEST_METHOD'];
        $path = $this->getCleanPath();

        if (isset($this->routes[$method][$path])) {
            [$controller, $methodName] = $this->routes[$method][$path];
            $obj = new $controller();
            $this->addServices($obj);
            $obj->$methodName();
        } else {
            http_response_code(404);
            echo "404 - Not found";
        }
    }

    private function addServices(object $controller){
        switch(get_class($controller)){
            case TranslateController::class:
                $controller->addService('chat', new ChatService());
                break;
        }
    }
}
