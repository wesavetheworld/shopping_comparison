
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
			<?php echo $this->Time->format('F jS, Y h:i A', $store['Store']['created'], ''); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Modified'); ?></strong></td>
		<td>
			<?php echo $this->Time->format('F jS, Y h:i A', $store['Store']['modified'], ''); ?>
			&nbsp;
		</td>
</tr>					</tbody>
				</table><!-- /.table table-striped table-bordered -->
			</div><!-- /.table-responsive -->
			
		</div><!-- /.view -->

					
			<div class="related">

				<h3><?php echo __('Related Entries'); ?></h3>
				
				<?php if (!empty($store['Entry'])): ?>
					
					<div class="table-responsive">
						<table class="table table-striped table-bordered">
							<thead>
								<tr>
											<th><?php echo __('Price'); ?></th>
		<th><?php echo __('Quantity'); ?></th>
		<th><?php echo __('Unit Price'); ?></th>
		<th><?php echo __('Note'); ?></th>
								</tr>
							</thead>
							<tbody>
								<?php $i = 0; ?>	<?php
										foreach ($store['Entry'] as $entry): ?>
		<tr>
			<?php if(strtotime($store['Entry'][$i]['price']) && 1 === preg_match('/^\d{4}-\d{2}-\d{2} [0-2][0-3]:[0-5][0-9]:[0-5][0-9]$/', $store['Entry'][$i]['price'])){
												    $display = $this->Time->format('F jS, Y h:i A', $store['Entry'][$i]['price']);

															}else{

												    				$display = h($store['Entry'][$i]['price']);

															} ?>
<td><?php echo $this->Html->link($display, array('controller' => 'entries', 'action' => 'view', $store['Entry'][$i]['id'])); ?></td>
			<?php if(strtotime($store['Entry'][$i]['quantity']) && 1 === preg_match('/^\d{4}-\d{2}-\d{2} [0-2][0-3]:[0-5][0-9]:[0-5][0-9]$/', $store['Entry'][$i]['quantity'])){
												    $display = $this->Time->format('F jS, Y h:i A', $store['Entry'][$i]['quantity']);

															}else{

												    				$display = h($store['Entry'][$i]['quantity']);

															} ?>
<td><?php echo $display; ?></td>
			<?php if(strtotime($store['Entry'][$i]['unit_price']) && 1 === preg_match('/^\d{4}-\d{2}-\d{2} [0-2][0-3]:[0-5][0-9]:[0-5][0-9]$/', $store['Entry'][$i]['unit_price'])){
												    $display = $this->Time->format('F jS, Y h:i A', $store['Entry'][$i]['unit_price']);

															}else{

												    				$display = h($store['Entry'][$i]['unit_price']);

															} ?>
<td><?php echo $display; ?></td>
			<?php if(strtotime($store['Entry'][$i]['note']) && 1 === preg_match('/^\d{4}-\d{2}-\d{2} [0-2][0-3]:[0-5][0-9]:[0-5][0-9]$/', $store['Entry'][$i]['note'])){
												    $display = $this->Time->format('F jS, Y h:i A', $store['Entry'][$i]['note']);

															}else{

												    				$display = h($store['Entry'][$i]['note']);

															} ?>
<td><?php echo $display; ?></td>
		</tr>
<?php $i++; ?>	<?php endforeach; ?>
							</tbody>
						</table><!-- /.table table-striped table-bordered -->
					</div><!-- /.table-responsive -->
					
				<?php endif; ?>

				
				<div class="actions">
					<?php echo $this->Html->link('<i class="icon-plus icon-white"></i> '.__('New Entry'), array('controller' => 'entries', 'action' => 'add'), array('class' => 'btn btn-primary', 'escape' => false)); ?>				</div><!-- /.actions -->
				
			</div><!-- /.related -->

			
	</div><!-- /#page-content .span9 -->

</div><!-- /#page-container .row-fluid -->
