<div class="bookings view">
<h2><?php echo __('Booking'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($booking['Booking']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($booking['Booking']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Address'); ?></dt>
		<dd>
			<?php echo h($booking['Booking']['address']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Phone'); ?></dt>
		<dd>
			<?php echo h($booking['Booking']['phone']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Schedule'); ?></dt>
		<dd>
			<?php echo $this->Html->link($booking['Schedule']['name'], array('controller' => 'schedules', 'action' => 'view', $booking['Schedule']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($booking['User']['id'], array('controller' => 'users', 'action' => 'view', $booking['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('SeatNames'); ?></dt>
		<dd>
			<?php echo h($booking['Booking']['seatNames']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('SeatCount'); ?></dt>
		<dd>
			<?php echo h($booking['Booking']['seatCount']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('SubTotal'); ?></dt>
		<dd>
			<?php echo h($booking['Booking']['subTotal']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('TotalAmount'); ?></dt>
		<dd>
			<?php echo h($booking['Booking']['totalAmount']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('File'); ?></dt>
		<dd>
			<?php echo h($booking['Booking']['file']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($booking['Booking']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($booking['Booking']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Booking'), array('action' => 'edit', $booking['Booking']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Booking'), array('action' => 'delete', $booking['Booking']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $booking['Booking']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Bookings'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Booking'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('New Schedule'), array('controller' => 'schedules', 'action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Vehicles'), array('controller' => 'vehicles', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Vehicle'), array('controller' => 'vehicles', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Template'), array('controller' => 'templateseats', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('List Travel'), array('controller' => 'travels', 'action' => 'index')); ?> </li>
	</ul>
</div>
