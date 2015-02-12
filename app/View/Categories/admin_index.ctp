  <?= $this->Html->script('foundation.min.js'); ?>

<?php echo $this->Session->flash(); ?>

<div class="block2">
	<ul id="sortable1" class="connectedSortable">
	<?php foreach ($categories as $key => $category): ?>

	<li data-elementid="<?= $category['Category']['id'];?>" id="<?= 'Element_'.$category['Category']['id']; ?>" class="ui-state-default button info"><?= $category['Category']['name']; ?>
	</li>

		
	<?php endforeach ?>
	</ul>
</div>

<?php
	$options = array(
	'id' => 'add-cat',
	'type' => 'submit',
    'label' => 'Ajouter',
    'class' => 'button'
    );
?>

<div class="add-cat">

	<?=$this->Form->create('Category',array('id'  => 'add-form')); ?>
		<?=$this->Form->input('id');?>
		<?=$this->Form->input('name', array('label' => "Nom de la categorie"));?>
	<?=$this->Form->end($options); ?>

</div>



<div id="droppable" class="ui-widget-content ui-state-default"><p>Poubelle</p></div>



<?= $this->Html->script('updateCategory'); ?>

 <script>
    $(document).foundation();
  </script>