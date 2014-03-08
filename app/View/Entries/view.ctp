
<div id="page-container" class="row">

	<div id="sidebar" class="col-sm-3">
		
		<div class="actions">
			
			<ul class="list-group">			
						<li class="list-group-item"><?php echo $this->Html->link(__('Edit Entry'), array('action' => 'edit', $entry['Entry']['id']), array('class' => '')); ?> </li>
		<li class="list-group-item"><?php echo $this->Form->postLink(__('Delete Entry'), array('action' => 'delete', $entry['Entry']['id']), array('class' => ''), __('Are you sure you want to delete # %s?', $entry['Entry']['id'])); ?> </li>
		<li class="list-group-item"><?php echo $this->Html->link(__('List Entries'), array('action' => 'index'), array('class' => '')); ?> </li>
		<li class="list-group-item"><?php echo $this->Html->link(__('New Entry'), array('action' => 'add'), array('class' => '')); ?> </li>
		<li class="list-group-item"><?php echo $this->Html->link(__('List Items'), array('controller' => 'items', 'action' => 'index'), array('class' => '')); ?> </li>
		<li class="list-group-item"><?php echo $this->Html->link(__('New Item'), array('controller' => 'items', 'action' => 'add'), array('class' => '')); ?> </li>
		<li class="list-group-item"><?php echo $this->Html->link(__('List Units'), array('controller' => 'units', 'action' => 'index'), array('class' => '')); ?> </li>
		<li class="list-group-item"><?php echo $this->Html->link(__('New Unit'), array('controller' => 'units', 'action' => 'add'), array('class' => '')); ?> </li>
		<li class="list-group-item"><?php echo $this->Html->link(__('List Stores'), array('controller' => 'stores', 'action' => 'index'), array('class' => '')); ?> </li>
		<li class="list-group-item"><?php echo $this->Html->link(__('New Store'), array('controller' => 'stores', 'action' => 'add'), array('class' => '')); ?> </li>
				
			</ul><!-- /.list-group -->
			
		</div><!-- /.actions -->
		
	</div><!-- /#sidebar .span3 -->
	
	<div id="page-content" class="col-sm-9">
		
		<div class="entries view">

			<h2><?php  echo __('Entry'); ?></h2>
			
			<div class="table-responsive">
				<table class="table table-striped table-bordered">
					<tbody>
						<tr>		<td><strong><?php echo __('Item'); ?></strong></td>
		<td>
			<?php echo $this->Html->link($entry['Item']['item'], array('controller' => 'items', 'action' => 'view', $entry['Item']['id']), array('class' => '')); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Price'); ?></strong></td>
		<td>
			<?php echo h($entry['Entry']['price']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Quantity'); ?></strong></td>
		<td>
			<?php echo h($entry['Entry']['quantity']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Unit Price'); ?></strong></td>
		<td>
			<?php echo h($entry['Entry']['unit_price']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Unit'); ?></strong></td>
		<td>
			<?php echo $this->Html->link($entry['Unit']['unit'], array('controller' => 'units', 'action' => 'view', $entry['Unit']['id']), array('class' => '')); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Store'); ?></strong></td>
		<td>
			<?php echo $this->Html->link($entry['Store']['name'], array('controller' => 'stores', 'action' => 'view', $entry['Store']['id']), array('class' => '')); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Note'); ?></strong></td>
		<td>
			<?php echo h($entry['Entry']['note']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Created'); ?></strong></td>
		<td>
			<?php echo $this->Time->format('F jS, Y h:i A', $entry['Entry']['created'], ''); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Modified'); ?></strong></td>
		<td>
			<?php echo $this->Time->format('F jS, Y h:i A', $entry['Entry']['modified'], ''); ?>
			&nbsp;
		</td>
</tr>					</tbody>
				</table><!-- /.table table-striped table-bordered -->
			</div><!-- /.table-responsive -->
			
		</div><!-- /.view -->

			
	</div><!-- /#page-content .span9 -->

</div><!-- /#page-container .row-fluid -->
