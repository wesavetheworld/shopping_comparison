
<div id="page-container" class="row">

	<div id="sidebar" class="col-sm-3">
		
		<div class="actions">
			
			<ul class="list-group">			
						<li class="list-group-item"><?php echo $this->Html->link(__('Edit Unit'), array('action' => 'edit', $unit['Unit']['id']), array('class' => '')); ?> </li>
		<li class="list-group-item"><?php echo $this->Form->postLink(__('Delete Unit'), array('action' => 'delete', $unit['Unit']['id']), array('class' => ''), __('Are you sure you want to delete # %s?', $unit['Unit']['id'])); ?> </li>
		<li class="list-group-item"><?php echo $this->Html->link(__('List Units'), array('action' => 'index'), array('class' => '')); ?> </li>
		<li class="list-group-item"><?php echo $this->Html->link(__('New Unit'), array('action' => 'add'), array('class' => '')); ?> </li>
		<li class="list-group-item"><?php echo $this->Html->link(__('List Entries'), array('controller' => 'entries', 'action' => 'index'), array('class' => '')); ?> </li>
		<li class="list-group-item"><?php echo $this->Html->link(__('New Entry'), array('controller' => 'entries', 'action' => 'add'), array('class' => '')); ?> </li>
				
			</ul><!-- /.list-group -->
			
		</div><!-- /.actions -->
		
	</div><!-- /#sidebar .span3 -->
	
	<div id="page-content" class="col-sm-9">
		
		<div class="units view">

			<h2><?php  echo __('Unit'); ?></h2>
			
			<div class="table-responsive">
				<table class="table table-striped table-bordered">
					<tbody>
						<tr>		<td><strong><?php echo __('Unit'); ?></strong></td>
		<td>
			<?php echo h($unit['Unit']['unit']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Created'); ?></strong></td>
		<td>
			<?php echo $this->Time->format('F jS, Y h:i A', $unit['Unit']['created'], ''); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Modified'); ?></strong></td>
		<td>
			<?php echo $this->Time->format('F jS, Y h:i A', $unit['Unit']['modified'], ''); ?>
			&nbsp;
		</td>
</tr>					</tbody>
				</table><!-- /.table table-striped table-bordered -->
			</div><!-- /.table-responsive -->
			
		</div><!-- /.view -->

					
			<div class="related">

				<h3><?php echo __('Related Entries'); ?></h3>
				
				<?php if (!empty($unit['Entry'])): ?>
					
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
									<?php
										$i = 0;
										foreach ($unit['Entry'] as $entry): ?>
		<tr>
			<?php if(strtotime($unit['Entry'][$i]['price']) && 1 === preg_match('~[0-9]~', $unit['Entry'][$i]['price'])){
												    $display = $this->Time->format('F jS, Y h:i A', $unit['Unit']['price']);

															}else{

												    				$display = h($unit['Entry'][$i]['price']);

															} ?>
<td><?php echo $this->Html->link($display, array('controller' => 'entries', 'action' => 'view', $unit['Entry'][$i]['id'])); ?></td>
			<?php if(strtotime($unit['Entry'][$i]['quantity']) && 1 === preg_match('~[0-9]~', $unit['Entry'][$i]['quantity'])){
												    $display = $this->Time->format('F jS, Y h:i A', $unit['Unit']['quantity']);

															}else{

												    				$display = h($unit['Entry'][$i]['quantity']);

															} ?>
<td><?php echo $display; ?></td>
			<?php if(strtotime($unit['Entry'][$i]['unit_price']) && 1 === preg_match('~[0-9]~', $unit['Entry'][$i]['unit_price'])){
												    $display = $this->Time->format('F jS, Y h:i A', $unit['Unit']['unit_price']);

															}else{

												    				$display = h($unit['Entry'][$i]['unit_price']);

															} ?>
<td><?php echo $display; ?></td>
			<?php if(strtotime($unit['Entry'][$i]['note']) && 1 === preg_match('~[0-9]~', $unit['Entry'][$i]['note'])){
												    $display = $this->Time->format('F jS, Y h:i A', $unit['Unit']['note']);

															}else{

												    				$display = h($unit['Entry'][$i]['note']);

															} ?>
<td><?php echo $display; ?></td>
<?php $i++; ?>		</tr>
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
