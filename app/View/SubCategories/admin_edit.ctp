
	<?php
		$options = array(
			'label' => 'Envoyer',
			'class' => 'button'
		);
	?>
		<?=$this->Form->create('SubCategory'); ?>
			<?=$this->Form->input('id');?>
			<?=$this->Form->input('name', array('label' => "Nom de la categorie"));?>
			<?=$this->Form->input('category_id', array('label' => 'Dans quelle catégorie ?')); ?>
			<?=$this->Form->input('online', array('type' => 'checkbox','checked' => 'checked','label' => "Voulez vous la mettre en ligne ?"));?>
		<?=$this->Form->end($options); ?>
