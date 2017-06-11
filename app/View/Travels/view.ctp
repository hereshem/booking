<div class="travels view">
<h2><?php echo __('Travel'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($travel['Travel']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($travel['Travel']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($travel['Travel']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Address'); ?></dt>
		<dd>
			<?php echo h($travel['Travel']['address']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($travel['Travel']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($travel['Travel']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Published'); ?></dt>
		<dd>
			<?php echo h($travel['Travel']['published']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Travel'), array('action' => 'edit', $travel['Travel']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Travel'), array('action' => 'delete', $travel['Travel']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $travel['Travel']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Travels'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Travel'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('New Schedule'), array('controller' => 'schedules', 'action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Vehicles'), array('controller' => 'vehicles', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Vehicle'), array('controller' => 'vehicles', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Bookings'), array('controller' => 'bookings', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('List Template'), array('controller' => 'templateseats', 'action' => 'index')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Vehicles'); ?></h3>
	<?php if (!empty($travel['Vehicle'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Description'); ?></th>
		<th><?php echo __('PlateNumber'); ?></th>
		<th><?php echo __('Route'); ?></th>
		<th><?php echo __('Travel Id'); ?></th>
		<th><?php echo __('HasAC'); ?></th>
		<th><?php echo __('TemplateSeat Id'); ?></th>
		<th><?php echo __('Published'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($travel['Vehicle'] as $vehicle): ?>
		<tr>
			<td><?php echo $vehicle['id']; ?></td>
			<td><?php echo $vehicle['name']; ?></td>
			<td><?php echo $vehicle['description']; ?></td>
			<td><?php echo $vehicle['plateNumber']; ?></td>
			<td><?php echo $vehicle['route']; ?></td>
			<td><?php echo $vehicle['travel_id']; ?></td>
			<td><?php echo $vehicle['hasAC']; ?></td>
			<td><?php echo $vehicle['templateseat_id']; ?></td>
			<td><?php echo $vehicle['published']; ?></td>
			<td><?php echo $vehicle['created']; ?></td>
			<td><?php echo $vehicle['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'vehicles', 'action' => 'view', $vehicle['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'vehicles', 'action' => 'edit', $vehicle['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'vehicles', 'action' => 'delete', $vehicle['id']), array('confirm' => __('Are you sure you want to delete # %s?', $vehicle['id']))); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Vehicle'), array('controller' => 'vehicles', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
