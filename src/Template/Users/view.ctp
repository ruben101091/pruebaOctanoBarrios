

<h1><?= h($user->name) ?></h1>
<p>Usuario<?= h($user->username) ?></p>
<p>Email :<?= h($user->email) ?></p>
<p>Telefono :<?= h($user->phone) ?></p>
<p>Fecha de Nacimiento :<?= h($user->birthdate) ?></p>
<p><small>Creado: <?= $user->created->format(DATE_RFC850) ?></small></p>