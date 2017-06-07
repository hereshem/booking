<div class="bookings index">
	<h2><?php echo __('Bookings'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('address'); ?></th>
			<th><?php echo $this->Paginator->sort('phone'); ?></th>
			<th><?php echo $this->Paginator->sort('schedule_id'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('seatNames'); ?></th>
			<th><?php echo $this->Paginator->sort('seatCount'); ?></th>
			<th><?php echo $this->Paginator->sort('subTotal'); ?></th>
			<th><?php echo $this->Paginator->sort('totalAmount'); ?></th>
			<th><?php echo $this->Paginator->sort('file'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($bookings as $booking): ?>
	<tr>
		<td><?php echo h($booking['Booking']['id']); ?>&nbsp;</td>
		<td><?php echo h($booking['Booking']['name']); ?>&nbsp;</td>
		<td><?php echo h($booking['Booking']['address']); ?>&nbsp;</td>
		<td><?php echo h($booking['Booking']['phone']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($booking['Schedule']['name'], array('controller' => 'schedules', 'action' => 'view', $booking['Schedule']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($booking['User']['id'], array('controller' => 'users', 'action' => 'view', $booking['User']['id'])); ?>
		</td>
		<td><?php echo h($booking['Booking']['seatNames']); ?>&nbsp;</td>
		<td><?php echo h($booking['Booking']['seatCount']); ?>&nbsp;</td>
		<td><?php echo h($booking['Booking']['subTotal']); ?>&nbsp;</td>
		<td><?php echo h($booking['Booking']['totalAmount']); ?>&nbsp;</td>
		<td><?php echo h($booking['Booking']['file']); ?>&nbsp;</td>
		<td><?php echo h($booking['Booking']['created']); ?>&nbsp;</td>
		<td><?php echo h($booking['Booking']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $booking['Booking']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $booking['Booking']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $booking['Booking']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $booking['Booking']['id']))); ?>
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
		<li><?php echo $this->Html->link(__('New Booking'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Schedules'), array('controller' => 'schedules', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Schedule'), array('controller' => 'schedules', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
