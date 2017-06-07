<div class="schedules view">
<h2><?php echo __('Schedule'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($schedule['Schedule']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($schedule['Schedule']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Vehicle'); ?></dt>
		<dd>
			<?php echo $this->Html->link($schedule['Vehicle']['name'], array('controller' => 'vehicles', 'action' => 'view', $schedule['Vehicle']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Time'); ?></dt>
		<dd>
			<?php echo h($schedule['Schedule']['time']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Route'); ?></dt>
		<dd>
			<?php echo h($schedule['Schedule']['route']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Published'); ?></dt>
		<dd>
			<?php echo h($schedule['Schedule']['published']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($schedule['Schedule']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($schedule['Schedule']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
	<!-- Ticket booking view -->
	<?php if (!empty($schedule['Seat'])): ?>
	<div><br/><br/>
		<h2>Seats Arrangement</h2>
		<table><tr>
		<?php $index=0; foreach ($schedule['Seat'] as $seat): ?>
		<?php echo ($index%4==2?"</tr><tr>":"")."<td class=\"".($seat['status']==1?"open":($seat['status']==2?"selected":"booked"))."\"><a href=\"?seat=".$seat['id']."\">".$seat['name']."</a></td>"; ?>
		<?php $index++; endforeach; ?></tr>
		</table>
		<div class="actions"><?php echo $this->Html->link(__('Book Now'), array('controller' => 'bookings', 'action' => 'add')); ?>
		</div>
	</div>
	<?php endif; ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Schedule'), array('action' => 'edit', $schedule['Schedule']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Schedule'), array('action' => 'delete', $schedule['Schedule']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $schedule['Schedule']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Schedules'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Schedule'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Vehicles'), array('controller' => 'vehicles', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Vehicle'), array('controller' => 'vehicles', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Bookings'), array('controller' => 'bookings', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Booking'), array('controller' => 'bookings', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Seats'), array('controller' => 'seats', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Seat'), array('controller' => 'seats', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Bookings'); ?></h3>
	<?php if (!empty($schedule['Booking'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Address'); ?></th>
		<th><?php echo __('Phone'); ?></th>
		<th><?php echo __('Schedule Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('SeatNames'); ?></th>
		<th><?php echo __('SeatCount'); ?></th>
		<th><?php echo __('SubTotal'); ?></th>
		<th><?php echo __('TotalAmount'); ?></th>
		<th><?php echo __('File'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($schedule['Booking'] as $booking): ?>
		<tr>
			<td><?php echo $booking['id']; ?></td>
			<td><?php echo $booking['name']; ?></td>
			<td><?php echo $booking['address']; ?></td>
			<td><?php echo $booking['phone']; ?></td>
			<td><?php echo $booking['schedule_id']; ?></td>
			<td><?php echo $booking['user_id']; ?></td>
			<td><?php echo $booking['seatNames']; ?></td>
			<td><?php echo $booking['seatCount']; ?></td>
			<td><?php echo $booking['subTotal']; ?></td>
			<td><?php echo $booking['totalAmount']; ?></td>
			<td><?php echo $booking['file']; ?></td>
			<td><?php echo $booking['created']; ?></td>
			<td><?php echo $booking['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'bookings', 'action' => 'view', $booking['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'bookings', 'action' => 'edit', $booking['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'bookings', 'action' => 'delete', $booking['id']), array('confirm' => __('Are you sure you want to delete # %s?', $booking['id']))); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Booking'), array('controller' => 'bookings', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Seats'); ?></h3>
	<?php if (!empty($schedule['Seat'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Schedule Id'); ?></th>
		<th><?php echo __('Status'); ?></th>
		<th><?php echo __('Price'); ?></th>
		<th><?php echo __('Published'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($schedule['Seat'] as $seat): ?>
		<tr>
			<td><?php echo $seat['id']; ?></td>
			<td><?php echo $seat['name']; ?></td>
			<td><?php echo $seat['schedule_id']; ?></td>
			<td><?php echo $seat['status']; ?></td>
			<td><?php echo $seat['price']; ?></td>
			<td><?php echo $seat['published']; ?></td>
			<td><?php echo $seat['created']; ?></td>
			<td><?php echo $seat['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'seats', 'action' => 'view', $seat['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'seats', 'action' => 'edit', $seat['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'seats', 'action' => 'delete', $seat['id']), array('confirm' => __('Are you sure you want to delete # %s?', $seat['id']))); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Seat'), array('controller' => 'seats', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
