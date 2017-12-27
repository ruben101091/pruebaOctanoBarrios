<!-- File: src/Template/Topics/view.ctp -->

<h1><?= h($topic->title) ?></h1>
<p><?= h($topic->content) ?></p>

<p>Tags :<?= h($topic->tags) ?></p>
Por <h3><?= h($topic->author) ?></h3>
<p><small>Creado: <?= $topic->created->format(DATE_RFC850) ?></small></p>