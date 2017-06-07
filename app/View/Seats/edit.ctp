<div class="seats form">
<?php echo $this->Form->create('Seat'); ?>
	<fieldset>
		<legend><?php echo __('Edit Seat'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('schedule_id');
		echo $this->Form->input('status');
		echo $this->Form->input('price');
		echo $this->Form->input('published');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Seat.id')), array('confirm' => __('Are you sure you want to delete # %s?', $this->Form->value('Seat.id')))); ?></li>
		<li><?php echo $this->Html->link(__('List Seats'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Schedules'), array('controller' => 'schedules', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Schedule'), array('controller' => 'schedules', 'action' => 'add')); ?> </li>
	</ul>
</div>
