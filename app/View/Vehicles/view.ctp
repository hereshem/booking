<div class="vehicles view">
<h2><?php echo __('Vehicle'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($vehicle['Vehicle']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($vehicle['Vehicle']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($vehicle['Vehicle']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('PlateNumber'); ?></dt>
		<dd>
			<?php echo h($vehicle['Vehicle']['plateNumber']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Route'); ?></dt>
		<dd>
			<?php echo h($vehicle['Vehicle']['route']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Travel'); ?></dt>
		<dd>
			<?php echo $this->Html->link($vehicle['Travel']['name'], array('controller' => 'travels', 'action' => 'view', $vehicle['Travel']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('HasAC'); ?></dt>
		<dd>
			<?php echo h($vehicle['Vehicle']['hasAC']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Templateseat'); ?></dt>
		<dd>
			<?php echo $this->Html->link($vehicle['Templateseat']['name'], array('controller' => 'templateseats', 'action' => 'view', $vehicle['Templateseat']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Published'); ?></dt>
		<dd>
			<?php echo h($vehicle['Vehicle']['published']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($vehicle['Vehicle']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($vehicle['Vehicle']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Vehicle'), array('action' => 'edit', $vehicle['Vehicle']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Vehicle'), array('action' => 'delete', $vehicle['Vehicle']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $vehicle['Vehicle']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Vehicles'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Vehicle'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Travels'), array('controller' => 'travels', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Travel'), array('controller' => 'travels', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Templateseats'), array('controller' => 'templateseats', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Templateseat'), array('controller' => 'templateseats', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Schedules'), array('controller' => 'schedules', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Schedule'), array('controller' => 'schedules', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Schedules'); ?></h3>
	<?php if (!empty($vehicle['Schedule'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Vehicle Id'); ?></th>
		<th><?php echo __('Time'); ?></th>
		<th><?php echo __('Route'); ?></th>
		<th><?php echo __('Published'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($vehicle['Schedule'] as $schedule): ?>
		<tr>
			<td><?php echo $schedule['id']; ?></td>
			<td><?php echo $schedule['name']; ?></td>
			<td><?php echo $schedule['vehicle_id']; ?></td>
			<td><?php echo $schedule['time']; ?></td>
			<td><?php echo $schedule['route']; ?></td>
			<td><?php echo $schedule['published']; ?></td>
			<td><?php echo $schedule['created']; ?></td>
			<td><?php echo $schedule['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'schedules', 'action' => 'view', $schedule['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'schedules', 'action' => 'edit', $schedule['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'schedules', 'action' => 'delete', $schedule['id']), array('confirm' => __('Are you sure you want to delete # %s?', $schedule['id']))); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Schedule'), array('controller' => 'schedules', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
