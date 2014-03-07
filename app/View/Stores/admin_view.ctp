
<div id="page-container" class="row">

	<div id="sidebar" class="col-sm-3">
		
		<div class="actions">
			
			<ul class="list-group">			
						<li class="list-group-item"><?php echo $this->Html->link(__('Edit Store'), array('action' => 'edit', $store['Store']['id']), array('class' => '')); ?> </li>
		<li class="list-group-item"><?php echo $this->Form->postLink(__('Delete Store'), array('action' => 'delete', $store['Store']['id']), array('class' => ''), __('Are you sure you want to delete # %s?', $store['Store']['id'])); ?> </li>
		<li class="list-group-item"><?php echo $this->Html->link(__('List Stores'), array('action' => 'index'), array('class' => '')); ?> </li>
		<li class="list-group-item"><?php echo $this->Html->link(__('New Store'), array('action' => 'add'), array('class' => '')); ?> </li>
		<li class="list-group-item"><?php echo $this->Html->link(__('List Entries'), array('controller' => 'entries', 'action' => 'index'), array('class' => '')); ?> </li>
		<li class="list-group-item"><?php echo $this->Html->link(__('New Entry'), array('controller' => 'entries', 'action' => 'add'), array('class' => '')); ?> </li>
				
			</ul><!-- /.list-group -->
			
		</div><!-- /.actions -->
		
	</div><!-- /#sidebar .span3 -->
	
	<div id="page-content" class="col-sm-9">
		
		<div class="stores view">

			<h2><?php  echo __('Store'); ?></h2>
			
			<div class="table-responsive">
				<table class="table table-striped table-bordered">
					<tbody>
						<tr>		<td><strong><?php echo __('Name'); ?></strong></td>
		<td>
			<?php echo h($store['Store']['name']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Location'); ?></strong></td>
		<td>
			<?php echo h($store['Store']['location']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Created'); ?></strong></td>
		<td>
			<?php echo h($store['Store']['created']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Modified'); ?></strong></td>
		<td>
			<?php echo h($store['Store']['modified']); ?>
			&nbsp;
		</td>
</tr>					</tbody>
				</table><!-- /.table table-striped table-bordered -->
			</div><!-- /.table-responsive -->
			
		</div><!-- /.view -->

					
			<div class="related">

				<h3><?php echo __('Entries for this Store'); ?></h3>
				
				<?php if (!empty($store['Entry'])): ?>
					
					<div class="table-responsive">
						<table class="table table-striped table-bordered">
							<thead>
								<tr>
											<th><?php echo __('Item'); ?></th>
		<th><?php echo __('Price'); ?></th>
		<th><?php echo __('Quantity'); ?></th>
		<th><?php echo __('Unit'); ?></th>
		<th><?php echo __('Store'); ?></th>
		<th><?php echo __('Note'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
								</tr>
							</thead>
							<tbody>
									<?php
										$i = 0;
										foreach ($store['Entry'] as $entry): ?>
		<tr>
			<td><?php echo , array('controller' => 'entries', 'action' => 'view', $entry['id'])); ?></td>
			<td><?php echo ; ?></td>
			<td><?php echo ; ?></td>
			<td><?php echo ; ?></td>
			<td><?php echo ; ?></td>
			<td><?php echo ; ?></td>
			<td><?php echo ; ?></td>
			<td><?php echo ; ?></td>
		</tr>
	<?php endforeach; ?>
							</tbody>
						</table><!-- /.table table-striped table-bordered -->
					</div><!-- /.table-responsive -->
					
				<?php endif; ?>

				
				<div class="actions">
					<?php echo $this->Html->link('<i class="icon-plus icon-white"></i> '.__('New Entry'), array('controller' => 'entries', 'action' => 'add'), array('class' => 'btn btn-primary', 'escape' => false)); ?>				</div><!-- /.actions -->
				
			</div><!-- /.related -->

			
	</div><!-- /#page-content .span9 -->

</div><!-- /#page-container .row-fluid -->
