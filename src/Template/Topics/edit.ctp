<!-- File: src/Template/Topics/edit.ctp -->

<h1>Editar Topic</h1> 
<?php
    echo $this->Form->create($topic);
    echo $this->Form->input('title', array('label'=>"Titulo"));
    echo $this->Form->input('content', array('label'=>"Contenido"), ['rows' => '3']);
    echo $this->Form->input('tags', array('label'=>"Tags"));	
    echo $this->Form->input('author', array('label'=>"Autor"));	
    echo $this->Form->button(__('Guardar'));
    echo $this->Form->end();
?>