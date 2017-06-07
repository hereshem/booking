<div class="vehicles index">
	<h2><?php echo __('Vehicles'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('description'); ?></th>
			<th><?php echo $this->Paginator->sort('plateNumber'); ?></th>
			<th><?php echo $this->Paginator->sort('route'); ?></th>
			<th><?php echo $this->Paginator->sort('travel_id'); ?></th>
			<th><?php echo $this->Paginator->sort('hasAC'); ?></th>
			<th><?php echo $this->Paginator->sort('templateseat_id'); ?></th>
			<th><?php echo $this->Paginator->sort('published'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($vehicles as $vehicle): ?>
	<tr>
		<td><?php echo h($vehicle['Vehicle']['id']); ?>&nbsp;</td>
		<td><?php echo h($vehicle['Vehicle']['name']); ?>&nbsp;</td>
		<td><?php echo h($vehicle['Vehicle']['description']); ?>&nbsp;</td>
		<td><?php echo h($vehicle['Vehicle']['plateNumber']); ?>&nbsp;</td>
		<td><?php echo h($vehicle['Vehicle']['route']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($vehicle['Travel']['name'], array('controller' => 'travels', 'action' => 'view', $vehicle['Travel']['id'])); ?>
		</td>
		<td><?php echo h($vehicle['Vehicle']['hasAC']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($vehicle['Templateseat']['name'], array('controller' => 'templateseats', 'action' => 'view', $vehicle['Templateseat']['id'])); ?>
		</td>
		<td><?php echo h($vehicle['Vehicle']['published']); ?>&nbsp;</td>
		<td><?php echo h($vehicle['Vehicle']['created']); ?>&nbsp;</td>
		<td><?php echo h($vehicle['Vehicle']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $vehicle['Vehicle']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $vehicle['Vehicle']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $vehicle['Vehicle']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $vehicle['Vehicle']['id']))); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
		'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Vehicle'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Travels'), array('controller' => 'travels', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Travel'), array('controller' => 'travels', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Templateseats'), array('controller' => 'templateseats', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Templateseat'), array('controller' => 'templateseats', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Schedules'), array('controller' => 'schedules', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Schedule'), array('controller' => 'schedules', 'action' => 'add')); ?> </li>
	</ul>
</div>
