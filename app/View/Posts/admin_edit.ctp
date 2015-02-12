<?php

$options = array(
    'label' => 'Envoyer',
     'class' => 'button'
    
);
?>
<?php if ($id): ?>
	<?= $this->Media->iframe('Post',$id); ?>
<?php endif ?>
<h3>Editer un article</h3>
<div class="row">
	<div class="span12">
		<?= $this->Form->create('Post'); ?>
		<?= $this->Form->input('id'); ?>
		<?= $this->Form->input('name', array('label' => "Nom de l'article")); ?>
		<?= $this->Form->input('category_id', array('label' => "Dans quelle catégorie")); ?>
		<?= $this->Form->input('online', array('type' => 'checkbox', 'label' => "Voulez vous mettre cet article en ligne ?"));?>
		<?= $this->Media->ckeditor('content', array('label' => 'Contenu')); ?>
		<?= $this->Form->end($options); ?>
	</div>
</div>
