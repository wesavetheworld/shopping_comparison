
<div id="page-container" class="row">

	<div id="sidebar" class="col-sm-3">
		
		<div class="actions">
			
			<ul class="list-group">			
						<li class="list-group-item"><?php echo $this->Html->link(__('Edit Item'), array('action' => 'edit', $item['Item']['id']), array('class' => '')); ?> </li>
		<li class="list-group-item"><?php echo $this->Form->postLink(__('Delete Item'), array('action' => 'delete', $item['Item']['id']), array('class' => ''), __('Are you sure you want to delete # %s?', $item['Item']['id'])); ?> </li>
		<li class="list-group-item"><?php echo $this->Html->link(__('List Items'), array('action' => 'index'), array('class' => '')); ?> </li>
		<li class="list-group-item"><?php echo $this->Html->link(__('New Item'), array('action' => 'add'), array('class' => '')); ?> </li>
		<li class="list-group-item"><?php echo $this->Html->link(__('List Categories'), array('controller' => 'categories', 'action' => 'index'), array('class' => '')); ?> </li>
		<li class="list-group-item"><?php echo $this->Html->link(__('New Category'), array('controller' => 'categories', 'action' => 'add'), array('class' => '')); ?> </li>
		<li class="list-group-item"><?php echo $this->Html->link(__('List Entries'), array('controller' => 'entries', 'action' => 'index'), array('class' => '')); ?> </li>
		<li class="list-group-item"><?php echo $this->Html->link(__('New Entry'), array('controller' => 'entries', 'action' => 'add'), array('class' => '')); ?> </li>
				
			</ul><!-- /.list-group -->
			
		</div><!-- /.actions -->
		
	</div><!-- /#sidebar .span3 -->
	
	<div id="page-content" class="col-sm-9">
		
		<div class="items view">

			<h2><?php  echo __('Item'); ?></h2>
			
			<div class="table-responsive">
				<table class="table table-striped table-bordered">
					<tbody>
						<tr>		<td><strong><?php echo __('Item'); ?></strong></td>
		<td>
			<?php echo h($item['Item']['item']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Category'); ?></strong></td>
		<td>
			<?php echo $this->Html->link($item['Category']['category'], array('controller' => 'categories', 'action' => 'view', $item['Category']['id']), array('class' => '')); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Lowest Price'); ?></strong></td>
		<td>
			<?php echo h($item['Item']['lowest_price']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Highest Price'); ?></strong></td>
		<td>
			<?php echo h($item['Item']['highest_price']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Last Price Update'); ?></strong></td>
		<td>
			<?php echo $this->Time->format('F jS, Y h:i A', $item['Item']['last_price_update'], ''); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Created'); ?></strong></td>
		<td>
			<?php echo $this->Time->format('F jS, Y h:i A', $item['Item']['created'], ''); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Modified'); ?></strong></td>
		<td>
			<?php echo $this->Time->format('F jS, Y h:i A', $item['Item']['modified'], ''); ?>
			&nbsp;
		</td>
</tr>					</tbody>
				</table><!-- /.table table-striped table-bordered -->
			</div><!-- /.table-responsive -->
			
		</div><!-- /.view -->

					
			<div class="related">

				<h3><?php echo __('Related Entries'); ?></h3>
				
				<?php if (!empty($item['Entry'])): ?>
					
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
										foreach ($item['Entry'] as $entry): ?>
		<tr>
			<?php if(strtotime($item['Entry'][$i]['price']) && 1 === preg_match('/^\d{4}-\d{2}-\d{2} [0-2][0-3]:[0-5][0-9]:[0-5][0-9]$/', $item['Entry'][$i]['price'])){
												    $display = $this->Time->format('F jS, Y h:i A', $item['Entry'][$i]['price']);

															}else{

												    				$display = h($item['Entry'][$i]['price']);

															} ?>
<td><?php echo $this->Html->link($display, array('controller' => 'entries', 'action' => 'view', $item['Entry'][$i]['id'])); ?></td>
			<?php if(strtotime($item['Entry'][$i]['quantity']) && 1 === preg_match('/^\d{4}-\d{2}-\d{2} [0-2][0-3]:[0-5][0-9]:[0-5][0-9]$/', $item['Entry'][$i]['quantity'])){
												    $display = $this->Time->format('F jS, Y h:i A', $item['Entry'][$i]['quantity']);

															}else{

												    				$display = h($item['Entry'][$i]['quantity']);

															} ?>
<td><?php echo $display; ?></td>
			<?php if(strtotime($item['Entry'][$i]['unit_price']) && 1 === preg_match('/^\d{4}-\d{2}-\d{2} [0-2][0-3]:[0-5][0-9]:[0-5][0-9]$/', $item['Entry'][$i]['unit_price'])){
												    $display = $this->Time->format('F jS, Y h:i A', $item['Entry'][$i]['unit_price']);

															}else{

												    				$display = h($item['Entry'][$i]['unit_price']);

															} ?>
<td><?php echo $display; ?></td>
			<?php if(strtotime($item['Entry'][$i]['note']) && 1 === preg_match('/^\d{4}-\d{2}-\d{2} [0-2][0-3]:[0-5][0-9]:[0-5][0-9]$/', $item['Entry'][$i]['note'])){
												    $display = $this->Time->format('F jS, Y h:i A', $item['Entry'][$i]['note']);

															}else{

												    				$display = h($item['Entry'][$i]['note']);

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
