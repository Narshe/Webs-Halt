<?= $this->Html->css('signup');?>

<?php
	$options = array(
    'label' => 'Confirmer',
    'class' => 'btn btn-lg btn-primary btn-block'
    );
?>

<?= $this->Form->create('User', array('class' => 'form-signup', 'role' => 'form')); ?>
<h2 class="form-signup-heading">Récuperation de mot de passe</h2>
	<?= $this->Form->input('mail', array('label' => false, 
											  'class' => 'form-control',
											  'type'  => 'mail',
											  'placeholder' => "Adresse mail"
			));?>
	</br>
<?= $this->Form->end($options); ?>



