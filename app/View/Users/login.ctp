
<?php
  $options = array(
    'label' => 'Connexion',
    'class' => 'button'
    );
?>

<?php if (AuthComponent::user('id') == 0): ?>
  

  <?= $this->Form->create('User', array('class' => 'form-signup', 'role' => 'form')); ?>
    <h2 class="form-signin-heading">Espace administrateur</h2>

     <?= $this->Form->input('username', array('label' => false, 
                           'class' => 'form-control', 
                           'placeholder' => "Nom d'utilisateur"

      ));?>
   <?= $this->Form->input('password', array('label' => false, 
                           'class' => 'form-control',
                           'type' => 'password',
                           'placeholder' => "Mot de passe"

      ));?>



 <?= $this->Form->end($options); ?>


  <p class="link"><?=$this->Html->link("Mot de passe oublié ?", array('action' => 'forgot')); ?></p>

<?php else: ?>
<p> Vous êtes déjà connecté </p>
<?php endif ?>




