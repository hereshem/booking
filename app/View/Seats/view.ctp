<div class="seats view">
<h2><?php echo __('Seat'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($seat['Seat']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($seat['Seat']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Schedule'); ?></dt>
		<dd>
			<?php echo $this->Html->link($seat['Schedule']['name'], array('controller' => 'schedules', 'action' => 'view', $seat['Schedule']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo h($seat['Seat']['status']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Price'); ?></dt>
		<dd>
			<?php echo h($seat['Seat']['price']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Published'); ?></dt>
		<dd>
			<?php echo h($seat['Seat']['published']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($seat['Seat']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($seat['Seat']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Seat'), array('action' => 'edit', $seat['Seat']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Seat'), array('action' => 'delete', $seat['Seat']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $seat['Seat']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Seats'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Seat'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Schedules'), array('controller' => 'schedules', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Schedule'), array('controller' => 'schedules', 'action' => 'add')); ?> </li>
	</ul>
</div>
