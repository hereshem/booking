<div class="seats form">
<?php echo $this->Form->create('Seat'); ?>
	<fieldset>
		<legend><?php echo __('Add Seat'); ?></legend>
	<?php
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

		<li><?php echo $this->Html->link(__('List Seats'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Schedules'), array('controller' => 'schedules', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Schedule'), array('controller' => 'schedules', 'action' => 'add')); ?> </li>
	</ul>
</div>
