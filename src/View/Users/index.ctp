<h1>Ingresar Usuario y Contraseña</h1>

<?
	echo $this->Form->input('user', array('label'=>'Usuario'));
	echo $this->Form->input('pass', array('label'=>'Contraseña'));
	echo $this->Form->end('Iniciar Sesión');
?>