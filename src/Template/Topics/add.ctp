<!-- File: src/Template/Topics/add.ctp -->

<h1>Agregar Topic</h1> 
<?php
    echo $this->Form->create($topic);
    echo $this->Form->input('title', array('label'=>"Titulo"));
    echo $this->Form->input('content', array('label'=>"Contenido"), ['rows' => '3']);
    echo $this->Form->input('tags', array('label'=>"Tags"));	
    echo $this->Form->input('author', array('label'=>"Autor"));	
    echo $this->Form->button(__('Guardar'));
    echo $this->Form->end();
?>