<h1>Lista słówek</h1>

<form method="POST" action="/words/add">
    <input type="text" name="word" placeholder="Word" required>
    <input type="text" name="translation" placeholder="Translation" required>
    <button type="submit">Dodaj</button>
</form>

<ul>
    <?php foreach ($words as $word): ?>
        <li><?= htmlspecialchars($word['word']) ?> - <?= htmlspecialchars($word['translation']) ?></li>
    <?php endforeach; ?>
</ul>
