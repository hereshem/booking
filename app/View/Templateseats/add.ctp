<div class="templateseats form">
<?php echo $this->Form->create('Templateseat'); ?>
	<fieldset>
		<legend><?php echo __('Add Templateseat'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('photo');
		echo $this->Form->input('seatCount');
		echo $this->Form->input('seatNames');
		echo $this->Form->input('seatPrices');
		echo $this->Form->input('published');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Templateseats'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Vehicles'), array('controller' => 'vehicles', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Vehicle'), array('controller' => 'vehicles', 'action' => 'add')); ?> </li>
	</ul>
</div>
