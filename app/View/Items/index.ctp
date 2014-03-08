<div id="page-container" class="row">
	<?php if (!empty($sidebar)): ?>
	<div id="sidebar" class="col-sm-3">
		
		<div class="actions">
		
			<ul class="list-group">
				<?php foreach ($sidebar as $link => $path): ?>					<li class="list-group-item"><?php echo $this->Html->link(h($link), $path); ?></li>
				<?php endforeach; ?>			</ul><!-- /.list-group -->
			
		</div><!-- /.actions -->
		
	</div><!-- /#sidebar .col-sm-3 -->
	<?php endif ?>
	<?php $class = empty($sidebar) ? 'col-sm-12' : 'col-sm-9'; ?>	
	<div id="page-content" class='<?php echo $class; ?>'>

		<div class="items index">
		
			<h2><?php echo __('Items'); ?></h2>
			
			<div class="table-responsive">
				<table cellpadding="0" cellspacing="0" class="table table-striped table-bordered">
					<thead>
						<tr>
							<th><?php echo $this->Paginator->sort('item'); ?></th>
							<th><?php echo $this->Paginator->sort('category_id'); ?></th>
							<th><?php echo $this->Paginator->sort('lowest_price'); ?></th>
							<th><?php echo $this->Paginator->sort('highest_price'); ?></th>
							<th><?php echo $this->Paginator->sort('last_price_update'); ?></th>
									</tr>
					</thead>
					<tbody>
<?php foreach ($items as $item): ?>
	<tr>
		<td><?php echo $this->Html->link($item['Item']['item'], array('action' => 'view', $item['Item']['id'])); ?>&nbsp;</td>
		<td><?php echo $this->Html->link($item['Category']['category'], array('controller' => 'categories', 'action' => 'view', $item['Category']['id'])); ?>&nbsp;</td>
		<td><?php echo h($item['Item']['lowest_price']);?>&nbsp;</td>
		<td><?php echo h($item['Item']['highest_price']);?>&nbsp;</td>
		<td><?php echo $this->Time->format('F jS, Y h:i A', $item['Item']['last_price_update'], '');?>&nbsp;</td>
	</tr>
<?php endforeach; ?>
					</tbody>
				</table>
			</div><!-- /.table-responsive -->
			
			<p><small>
				<?php
					echo $this->Paginator->counter(array(
					'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
					));
				?>
			</small></p>

			<ul class="pagination">
				<?php
					echo $this->Paginator->prev('< ' . __('Previous'), array('tag' => 'li'), null, array('class' => 'disabled', 'tag' => 'li', 'disabledTag' => 'a'));
					echo $this->Paginator->numbers(array('separator' => '', 'currentTag' => 'a', 'tag' => 'li', 'currentClass' => 'disabled'));
					echo $this->Paginator->next(__('Next') . ' >', array('tag' => 'li'), null, array('class' => 'disabled', 'tag' => 'li', 'disabledTag' => 'a'));
				?>
			</ul><!-- /.pagination -->
			
		</div><!-- /.index -->
	
	</div><!-- /#page-content .col-sm-9 -->

</div><!-- /#page-container .row-fluid -->