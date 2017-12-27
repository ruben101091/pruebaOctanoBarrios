<h1>Bienvenido <?= $current_user['name'] ?></h1>
<p><?= $this->Html->link('Agregar Topic', ['action' => 'add']) ?></p>
<table>
    <tr>
        <th>Id</th>
        <th>Titulo</th>
        <th>Creado</th>
        <?php  if ($this->request->session()->read('Auth.User')){ ?>
            <th>Acción</th>
        <? } ?>
    </tr>

<!-- Aca es donde se recorre todo nuestro arreglo $topic, y se imprimen los resultados -->

    <?php foreach ($topics as $topic): ?>
    <tr>
        <td><?= $topic->id ?></td>
        <td>
            <?= $this->Html->link($topic->title, ['action' => 'view', $topic->id]) ?>
        </td>
        <td>
            <?= $topic->created->format(DATE_RFC850) ?>
        </td>

        <?php  if ($this->request->session()->read('Auth.User')){ ?>
            <td>
                <?= $this->Form->postLink(
                    'Borrar',
                    ['action' => 'delete', $topic->id],
                    ['confirm' => 'Are you sure?'])
                ?>
                <?= $this->Html->link('Editar', ['action' => 'edit', $topic->id]) ?>
            </td>
        <? } ?>
    </tr>
    <?php endforeach; ?>
	<tr>
	<?php  if ($this->request->session()->read('Auth.User')){ ?>
		<td> <?=$this->Html->Link(__('Cerrar Sesión'),['controller'=>'users','action'=>'logout']) ?>  </td>
        <td> <?=$this->Html->Link(__('Control de Usuarios'),['controller'=>'users','action'=>'index']) ?>  </td>
	<?php }else{  ?>
		<td> <?=$this->Html->Link(__('Iniciar Sesión'),['controller'=>'users','action'=>'login']) ?>  </td>	
	<?php } ?>
	
	</tr>
</table>