<div class="seats index">
	<h2><?php echo __('Seats'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('schedule_id'); ?></th>
			<th><?php echo $this->Paginator->sort('status'); ?></th>
			<th><?php echo $this->Paginator->sort('price'); ?></th>
			<th><?php echo $this->Paginator->sort('published'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($seats as $seat): ?>
	<tr>
		<td><?php echo h($seat['Seat']['id']); ?>&nbsp;</td>
		<td><?php echo h($seat['Seat']['name']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($seat['Schedule']['name'], array('controller' => 'schedules', 'action' => 'view', $seat['Schedule']['id'])); ?>
		</td>
		<td><?php echo h($seat['Seat']['status']); ?>&nbsp;</td>
		<td><?php echo h($seat['Seat']['price']); ?>&nbsp;</td>
		<td><?php echo h($seat['Seat']['published']); ?>&nbsp;</td>
		<td><?php echo h($seat['Seat']['created']); ?>&nbsp;</td>
		<td><?php echo h($seat['Seat']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $seat['Seat']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $seat['Seat']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $seat['Seat']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $seat['Seat']['id']))); ?>
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
		<li><?php echo $this->Html->link(__('New Seat'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Schedules'), array('controller' => 'schedules', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Schedule'), array('controller' => 'schedules', 'action' => 'add')); ?> </li>
	</ul>
</div>
