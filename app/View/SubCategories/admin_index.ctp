<div class="row">
	<div class="span12">
		<p>
			<?=$this->Html->link('Ajouter une sous-catégorie', array('action' => 'edit'),array('class' => 'btn btn-primary'));?>
		</p>
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>Id</th>
					<th>Nom</th>
					<th>Categorie</th>
					<th>Online</th>
					<th style="text-align:center;">Actions</th>
				</tr>
			</thead>
			<tbody>


				<?php foreach ($subCategories as $k => $sc):  ?>
				<tr>
					<td><?=$sc['SubCategory']['id'];?></td>
					<td><?=$sc['SubCategory']['name'];?></td>
					<td><?=$sc['Category']['name'];?></td>
					<td><?=$sc['SubCategory']['online']=='0'?'<span class="label label-important">Hors ligne</span>':
					                         '<span class="label label-success">En ligne</span>';?>
					</td>
					<td class="tabOptions">
						<?=$this->Html->link('Editer', array('action' => 'edit', $sc['SubCategory']['id']), array('class' => "btn btn-info"));?>
						-
						<?=$this->Form->postLink('Supprimer',array(
							'action' => 'delete', 
							$sc['SubCategory']['id']),
						array('class' => 'btn btn-danger'),
						"Voulez vous vraiment supprimer cette catégories ?")
						;?>
					</td>
				</tr>
				<?php endforeach ?>
			</tbody>
		</table>
		<?= $this->Paginator->numbers();?>
	</div>
</div>