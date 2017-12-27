
<h1>Listado de usuarios</h1>
<p><?= $this->Html->link('Agregar nuevo Usuario', ['action' => 'add']) ?></p>
<table>
    <tr>
        <th>Id</th>
        <th>Usuario</th>
        <th>Creado</th>
        <th>Acción</th>
    </tr>


    <?php foreach ($users as $user): ?>
    <tr>
        <td><?= $user->id ?></td>
        <td>
            <?= $this->Html->link($user->username, ['action' => 'view', $user->id]) ?>
        </td>
        <td>
            <?= $user->created->format(DATE_RFC850) ?>
        </td>
        <td>
            <?= $this->Form->postLink(
                'Borrar',
                ['action' => 'delete', $user->id],
                ['confirm' => __('Está seguro de eliminar a este usuario?',$user->id)])
            ?>
            <?= $this->Html->link('Editar', ['action' => 'edit', $user->id])?>
        </td>
    </tr>
    <?php endforeach; ?>
    <tr>
    	<td> <?=$this->Html->Link(__('Cerrar Sesión'),['controller'=>'users','action'=>'logout']) ?>  </td>
    	<td> <?=$this->Html->Link(__('Control de Topics'),['controller'=>'topics','action'=>'index']) ?>  </td>
    </tr>
</table>