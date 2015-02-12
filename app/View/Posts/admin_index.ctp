<div class="row">
	<div class="span12">
		<p>
			<?=$this->Html->link('Ajouter un article', array('action' => 'edit'),array('class' => 'button'));?>
		</p>
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>Id</th>
					<th>Titre</th>
					<th>Contenu</th>
					<th>Online</th>
					<th>Actions</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($posts as $k => $p):?>
				<tr>
					<td><?=$p['Post']['id'];?></td>
					<td><?=$p['Post']['name'];?></td>
					<td><?= $this->Text->truncate($p['Post']['content'],200,array('ellipsis' => '...', 'exact' => false));?></td>
					<td><?=$p['Post']['online']=='0'?'<span class="label label-important">Hors ligne</span>':
					                         '<span class="label label-success">En ligne</span>';?>
					</td>
					<td>
						<?=$this->Html->link('Editer', array('action' => 'edit', $p['Post']['id']));?>
						-
						<?=$this->Form->postLink('Supprimer',array(
							'action' => 'delete', 
							$p['Post']['id']),
						null,
						"Voulez vous vraiment supprimer cette catégories ?")
						;?>
					</td>
				</tr>
				<?php endforeach ?>
			</tbody>
		</table>
	</div>
</div>