<div class="templateseats view">
<h2><?php echo __('Templateseat'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($templateseat['Templateseat']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($templateseat['Templateseat']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Photo'); ?></dt>
		<dd>
			<?php echo h($templateseat['Templateseat']['photo']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Html'); ?></dt>
		<dd>
			<?php echo h($templateseat['Templateseat']['html']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('SeatCount'); ?></dt>
		<dd>
			<?php echo h($templateseat['Templateseat']['seatCount']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('SeatNames'); ?></dt>
		<dd>
			<?php echo h($templateseat['Templateseat']['seatNames']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('SeatPrices'); ?></dt>
		<dd>
			<?php echo h($templateseat['Templateseat']['seatPrices']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Published'); ?></dt>
		<dd>
			<?php echo h($templateseat['Templateseat']['published']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($templateseat['Templateseat']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($templateseat['Templateseat']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Templateseat'), array('action' => 'edit', $templateseat['Templateseat']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Templateseat'), array('action' => 'delete', $templateseat['Templateseat']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $templateseat['Templateseat']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Templateseats'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Templateseat'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Vehicles'), array('controller' => 'vehicles', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Vehicle'), array('controller' => 'vehicles', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Vehicles'); ?></h3>
	<?php if (!empty($templateseat['Vehicle'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Description'); ?></th>
		<th><?php echo __('PlateNumber'); ?></th>
		<th><?php echo __('Route'); ?></th>
		<th><?php echo __('Travel Id'); ?></th>
		<th><?php echo __('HasAC'); ?></th>
		<th><?php echo __('Templateseat Id'); ?></th>
		<th><?php echo __('Published'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($templateseat['Vehicle'] as $vehicle): ?>
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
