<?= $this->Html->css('signup');?>

<?php
	$options = array(
    'label' => 'Confirmer',
    'class' => 'btn btn-lg btn-primary btn-block'
    );
?>

<?= $this->Form->create('User', array('class' => 'form-signup', 'role' => 'form')); ?>
<h2 class="form-signup-heading">Mot de passe</h2>
	<?= $this->Form->input('password', array('label' => false, 
											 'class' => 'form-control', 
											 'placeholder' => "Mot de passe"
	));?>
	<?= $this->Form->input('password2', array('label' => false, 
											  'class' => 'form-control', 
											  'type' => 'password',
											  'placeholder' => "Confirmation mot de passe"
	));?>

	</br>
<?= $this->Form->end($options); ?>



