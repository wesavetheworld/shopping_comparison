
<div id="page-container" class="row">

	<div id="sidebar" class="col-sm-3">
		
		<div class="actions">
			
			<ul class="list-group">			
						<li class="list-group-item"><?php echo $this->Html->link(__('Edit Category'), array('action' => 'edit', $category['Category']['id']), array('class' => '')); ?> </li>
		<li class="list-group-item"><?php echo $this->Form->postLink(__('Delete Category'), array('action' => 'delete', $category['Category']['id']), array('class' => ''), __('Are you sure you want to delete # %s?', $category['Category']['id'])); ?> </li>
		<li class="list-group-item"><?php echo $this->Html->link(__('List Categories'), array('action' => 'index'), array('class' => '')); ?> </li>
		<li class="list-group-item"><?php echo $this->Html->link(__('New Category'), array('action' => 'add'), array('class' => '')); ?> </li>
		<li class="list-group-item"><?php echo $this->Html->link(__('List Items'), array('controller' => 'items', 'action' => 'index'), array('class' => '')); ?> </li>
		<li class="list-group-item"><?php echo $this->Html->link(__('New Item'), array('controller' => 'items', 'action' => 'add'), array('class' => '')); ?> </li>
				
			</ul><!-- /.list-group -->
			
		</div><!-- /.actions -->
		
	</div><!-- /#sidebar .span3 -->
	
	<div id="page-content" class="col-sm-9">
		
		<div class="categories view">

			<h2><?php  echo __('Category'); ?></h2>
			
			<div class="table-responsive">
				<table class="table table-striped table-bordered">
					<tbody>
						<tr>		<td><strong><?php echo __('Category'); ?></strong></td>
		<td>
			<?php echo h($category['Category']['category']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Created'); ?></strong></td>
		<td>
			<?php echo $this->Time->format('F jS, Y h:i A', $category['Category']['created'], ''); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Modified'); ?></strong></td>
		<td>
			<?php echo $this->Time->format('F jS, Y h:i A', $category['Category']['modified'], ''); ?>
			&nbsp;
		</td>
</tr>					</tbody>
				</table><!-- /.table table-striped table-bordered -->
			</div><!-- /.table-responsive -->
			
		</div><!-- /.view -->

					
			<div class="related">

				<h3><?php echo __('Related Items'); ?></h3>
				
				<?php if (!empty($category['Item'])): ?>
					
					<div class="table-responsive">
						<table class="table table-striped table-bordered">
							<thead>
								<tr>
											<th><?php echo __('Item'); ?></th>
		<th><?php echo __('Lowest Price'); ?></th>
		<th><?php echo __('Highest Price'); ?></th>
		<th><?php echo __('Last Price Update'); ?></th>
								</tr>
							</thead>
							<tbody>
								<?php $i = 0; ?>	<?php
										foreach ($category['Item'] as $item): ?>
		<tr>
			<?php if(strtotime($category['Item'][$i]['item']) && 1 === preg_match('/^\d{4}-\d{2}-\d{2} [0-2][0-3]:[0-5][0-9]:[0-5][0-9]$/', $category['Item'][$i]['item'])){
												    $display = $this->Time->format('F jS, Y h:i A', $category['Item'][$i]['item']);

															}else{

												    				$display = h($category['Item'][$i]['item']);

															} ?>
<td><?php echo $this->Html->link($display, array('controller' => 'items', 'action' => 'view', $category['Item'][$i]['id'])); ?></td>
			<?php if(strtotime($category['Item'][$i]['lowest_price']) && 1 === preg_match('/^\d{4}-\d{2}-\d{2} [0-2][0-3]:[0-5][0-9]:[0-5][0-9]$/', $category['Item'][$i]['lowest_price'])){
												    $display = $this->Time->format('F jS, Y h:i A', $category['Item'][$i]['lowest_price']);

															}else{

												    				$display = h($category['Item'][$i]['lowest_price']);

															} ?>
<td><?php echo $display; ?></td>
			<?php if(strtotime($category['Item'][$i]['highest_price']) && 1 === preg_match('/^\d{4}-\d{2}-\d{2} [0-2][0-3]:[0-5][0-9]:[0-5][0-9]$/', $category['Item'][$i]['highest_price'])){
												    $display = $this->Time->format('F jS, Y h:i A', $category['Item'][$i]['highest_price']);

															}else{

												    				$display = h($category['Item'][$i]['highest_price']);

															} ?>
<td><?php echo $display; ?></td>
			<?php if(strtotime($category['Item'][$i]['last_price_update']) && 1 === preg_match('/^\d{4}-\d{2}-\d{2} [0-2][0-3]:[0-5][0-9]:[0-5][0-9]$/', $category['Item'][$i]['last_price_update'])){
												    $display = $this->Time->format('F jS, Y h:i A', $category['Item'][$i]['last_price_update']);

															}else{

												    				$display = h($category['Item'][$i]['last_price_update']);

															} ?>
<td><?php echo $display; ?></td>
		</tr>
<?php $i++; ?>	<?php endforeach; ?>
							</tbody>
						</table><!-- /.table table-striped table-bordered -->
					</div><!-- /.table-responsive -->
					
				<?php endif; ?>

				
				<div class="actions">
					<?php echo $this->Html->link('<i class="icon-plus icon-white"></i> '.__('New Item'), array('controller' => 'items', 'action' => 'add'), array('class' => 'btn btn-primary', 'escape' => false)); ?>				</div><!-- /.actions -->
				
			</div><!-- /.related -->

			
	</div><!-- /#page-content .span9 -->

</div><!-- /#page-container .row-fluid -->
