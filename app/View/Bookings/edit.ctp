<div class="bookings form">
<?php echo $this->Form->create('Booking'); ?>
	<fieldset>
		<legend><?php echo __('Edit Booking'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('address');
		echo $this->Form->input('phone');
		echo $this->Form->input('schedule_id');
		echo $this->Form->input('user_id');
		echo $this->Form->input('seatNames');
		echo $this->Form->input('seatCount');
		echo $this->Form->input('subTotal');
		echo $this->Form->input('totalAmount');
		echo $this->Form->input('file');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Booking.id')), array('confirm' => __('Are you sure you want to delete # %s?', $this->Form->value('Booking.id')))); ?></li>
		<li><?php echo $this->Html->link(__('List Bookings'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Schedules'), array('controller' => 'schedules', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Schedule'), array('controller' => 'schedules', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
