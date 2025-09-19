<?php
require_once __DIR__ . '/../models/Word.php';
require_once __DIR__ . '/../core/View.php';

class WordController extends AbstractController {
    public function index() {
        View::render('words/list', ['words' => Word::getAll()]);
    }

    public function list() {
        View::render('words/list', ['words' => Word::getAll()]);
    }

    public function add() {
        if (!empty($_POST['word']) && !empty($_POST['translation'])) {
            Word::create($_POST['word'], $_POST['translation']);
        }
        header("Location: /words");
        exit;
    }
}
