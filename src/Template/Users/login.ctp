<?= $this->Html->css('login') ?>
<div class="container">

<div class="row" style="margin-top:20px">
    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
		<?= $this->Form->create(); ?>
			<fieldset>
				<h2>Iniciar Sesión</h2>
				<hr class="colorgraph">
				<div class="form-group">
                    <?= $this->Form->input('email', array('label'=>"Correo Electronico"), ['class'=>'form-control input-lg', 'placeholder'=>'Correo Electronico', 'required']); ?>
				</div>
				<div class="form-group">
                    <?= $this->Form->input('password', array('label'=>"Contraseña"), ['class'=>'form-control input-lg', 'placeholder'=>'Contraseña', 'type'=>'password', 'required']); ?>
				</div>
				<hr class="colorgraph">
				<div class="row">
					<div class="col-xs-6 col-sm-6 col-md-6">
                        <?= $this->Form->button('Iniciar Sesión'); ?>
					</div>
				</div>
			</fieldset>
		<?= $this->Form->end() ?>
	</div>
</div>