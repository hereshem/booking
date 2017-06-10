<div class="schedules">
	<div style="width:40%;float:left;">
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
		
	</div>
	<div class="seatplan">
	<br><br><br>
		<?php echo $template['Templateseat']['html']; ?>
		<div id="selected"></div>

		<div class="actions">
			<?php echo $this->Html->link(__('Book Now'), array('controller' => 'bookings', 'action' => 'add')); ?>
		</div>
	</div>
</div>
<div style="clear:both;"></div>
<br><br><hr><br>
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

</div>
<script> var SC=<?php echo $schedule['Schedule']['id'];?>
</script>

<?php echo $this->Html->script(array('jquery.min','custom'));?>
