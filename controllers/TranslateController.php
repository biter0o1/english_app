<?php
require_once __DIR__ . '/../models/Translate.php';
require_once __DIR__ . '/../core/View.php';
require_once __DIR__ . '/../services/ChatService.php';
require_once __DIR__ . '/AbstractController.php';

class TranslateController extends AbstractController {

    public function index() {
        View::render('translate/main', ["text_from_chat" => $this->services['chat']->generateExample('test')]);
    }

    public function check() {
        View::render('translate/main', ["text_from_chat" => $this->services['chat']->generateExample('test')]);
    }
}
