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

		<div class="entries index">
		
			<h2><?php echo __('Entries'); ?></h2>
			
			<div class="table-responsive">
				<table cellpadding="0" cellspacing="0" class="table table-striped table-bordered">
					<thead>
						<tr>
							<th><?php echo $this->Paginator->sort('item_id'); ?></th>
							<th><?php echo $this->Paginator->sort('price'); ?></th>
							<th><?php echo $this->Paginator->sort('quantity'); ?></th>
							<th><?php echo $this->Paginator->sort('unit_price'); ?></th>
							<th><?php echo $this->Paginator->sort('unit_id'); ?></th>
							<th><?php echo $this->Paginator->sort('store_id'); ?></th>
							<th><?php echo $this->Paginator->sort('note'); ?></th>
									</tr>
					</thead>
					<tbody>
<?php foreach ($entries as $entry): ?>
	<tr>
		<td><?php echo $this->Html->link($entry['Item']['item'], array('controller' => 'items', 'action' => 'view', $entry['Item']['id'])); ?>&nbsp;</td>
		<td><?php echo $this->Html->link($entry['Entry']['price'], array('action' => 'view', $entry['Entry']['id'])); ?>&nbsp;</td>
		<td><?php echo h($entry['Entry']['quantity']);?>&nbsp;</td>
		<td><?php echo h($entry['Entry']['unit_price']);?>&nbsp;</td>
		<td><?php echo $this->Html->link($entry['Unit']['unit'], array('controller' => 'units', 'action' => 'view', $entry['Unit']['id'])); ?>&nbsp;</td>
		<td><?php echo $this->Html->link($entry['Store']['name'], array('controller' => 'stores', 'action' => 'view', $entry['Store']['id'])); ?>&nbsp;</td>
		<td><?php echo h($entry['Entry']['note']);?>&nbsp;</td>
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