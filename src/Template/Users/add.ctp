<h1>Registrar Nuevo Usuario </h1> 
<?php
 echo $this->Flash->render('auth');
    echo $this->Form->create($user);
    echo $this->Form->input('name' ,array('label'=>"Nombre"));
    echo $this->Form->input('username' ,array('label'=>"Usuario"));
    echo $this->Form->input('password' ,array('label'=>"Contraseña",'type'=>'password'));		
    echo $this->Form->input('password2',array('label'=>"Confirmar Contraseña",'type'=>'password'));	
    echo $this->Form->input('email' ,array('label'=>"Correo Electronico"));
    echo $this->Form->input('phone' ,array('label'=>"Telefono"));	
    echo $this->Form->input('birthdate',array('label'=>"Fecha de Nacimiento") [
		'minYear' => date('Y') - 80,
		'maxYear' => date('Y') - 10
	]);	
		
		
    echo $this->Form->button(__('Registrar'));
    echo $this->Form->end();
?>