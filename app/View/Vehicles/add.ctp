<div class="vehicles form">
<?php echo $this->Form->create('Vehicle'); ?>
	<fieldset>
		<legend><?php echo __('Add Vehicle'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('description');
		echo $this->Form->input('plateNumber');
		echo $this->Form->input('route');
		echo $this->Form->input('travel_id');
		echo $this->Form->input('hasAC');
		echo $this->Form->input('templateseat_id');
		echo $this->Form->input('published');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Vehicles'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Travels'), array('controller' => 'travels', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Travel'), array('controller' => 'travels', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Templateseats'), array('controller' => 'templateseats', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Templateseat'), array('controller' => 'templateseats', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Schedules'), array('controller' => 'schedules', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Schedule'), array('controller' => 'schedules', 'action' => 'add')); ?> </li>
	</ul>
</div>
