<?php
require_once __DIR__ . '/../models/Translate.php';
require_once __DIR__ . '/../core/View.php';
require_once __DIR__ . '/../services/ChatService.php';

class TranslateController {
    // private ChatService $chat = new ChatService();

    function __construct(public ChatService $chat){}

    public function index() {
        View::render('translate/main', ["text_from_chat" => $this->chat->generateExample('test')]);
    }

    public function check() {
        View::render('translate/main', ["text_from_chat" => $this->chat->generateExample('test')]);
    }
}
