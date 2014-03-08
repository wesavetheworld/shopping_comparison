<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake.Console.Templates.default.views
 * @since         CakePHP(tm) v 1.2.0.5234
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
?>
<div id="page-container" class="row">
	<?php echo "<?php if (!empty(\$sidebar)): ?>"; ?>

	<div id="sidebar" class="col-sm-3">
		
		<div class="actions">
		
			<ul class="list-group">
				<?php echo "<?php foreach (\$sidebar as \$link => \$path): ?>"; ?>
					<li class="list-group-item"><?php echo "<?php echo \$this->Html->link(h(\$link), \$path); ?>"; ?></li>
				<?php echo "<?php endforeach; ?>"; ?>
			</ul><!-- /.list-group -->
			
		</div><!-- /.actions -->
		
	</div><!-- /#sidebar .col-sm-3 -->
	<?php echo "<?php endif ?>"; ?>

	<?php echo "<?php \$class = empty(\$sidebar) ? 'col-sm-12' : 'col-sm-9'; ?>"; ?>
	
	<div id="page-content" class='<?php echo "<?php echo \$class; ?>"; ?>'>

		<div class="<?php echo $pluralVar; ?> index">
		
			<h2><?php echo "<?php echo __('{$pluralHumanName}'); ?>"; ?></h2>
			
			<div class="table-responsive">
				<table cellpadding="0" cellspacing="0" class="table table-striped table-bordered">
					<thead>
						<tr>
			<?php foreach ($fields as $field):
				if (in_array($field, array('id','created','modified'))) {
					continue;
				}
			?>
				<th><?php echo "<?php echo \$this->Paginator->sort('{$field}'); ?>"; ?></th>
			<?php endforeach; ?>
						</tr>
					</thead>
					<tbody>
<?php 
	echo "<?php foreach (\${$pluralVar} as \${$singularVar}): ?>\n";
	echo "\t<tr>\n";
	$first_column = true;
	foreach ($fields as $field) {
		if (in_array($field, array('id','created','modified'))) {
			continue;
		}
		$isKey = false;
		if (!empty($associations['belongsTo'])) {
			foreach ($associations['belongsTo'] as $alias => $details) {
				if ($field === $details['foreignKey']) {
					$isKey = true;
					echo "\t\t<td><?php echo \$this->Html->link(\${$singularVar}['{$alias}']['{$details['displayField']}'], array('controller' => '{$details['controller']}', 'action' => 'view', \${$singularVar}['{$alias}']['{$details['primaryKey']}'])); ?>&nbsp;</td>\n";
					break;
				}
			}
		}
		if ($isKey !== true) {
			if ($first_column) {
				echo "\t\t<td><?php echo \$this->Html->link(\${$singularVar}['{$modelClass}']['{$field}'], array('action' => 'view', \${$singularVar}['{$modelClass}']['{$primaryKey}'])); ?>&nbsp;</td>\n";
				$first_column = false;
			} else {
				if ($schema[$field]['type'] == 'datetime') {
					$display = "\$this->Time->format('F jS, Y h:i A', \${$singularVar}['{$modelClass}']['{$field}'], '')";
				} else {
					$display = "h(\${$singularVar}['{$modelClass}']['{$field}'])";
				}

				echo "\t\t<td><?php echo $display;?>&nbsp;</td>\n";
			}
		}
	}
	echo "\t</tr>\n";

	echo "<?php endforeach; ?>\n";
?>
					</tbody>
				</table>
			</div><!-- /.table-responsive -->
			
			<p><small>
				<?php echo "<?php
					echo \$this->Paginator->counter(array(
					'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
					));
				?>\n"; ?>
			</small></p>

			<ul class="pagination">
				<?php
					echo "<?php\n";
					echo "\t\t\t\t\techo \$this->Paginator->prev('< ' . __('Previous'), array('tag' => 'li'), null, array('class' => 'disabled', 'tag' => 'li', 'disabledTag' => 'a'));\n";
					echo "\t\t\t\t\techo \$this->Paginator->numbers(array('separator' => '', 'currentTag' => 'a', 'tag' => 'li', 'currentClass' => 'disabled'));\n";
					echo "\t\t\t\t\techo \$this->Paginator->next(__('Next') . ' >', array('tag' => 'li'), null, array('class' => 'disabled', 'tag' => 'li', 'disabledTag' => 'a'));\n";
					echo "\t\t\t\t?>\n";
				?>
			</ul><!-- /.pagination -->
			
		</div><!-- /.index -->
	
	</div><!-- /#page-content .col-sm-9 -->

</div><!-- /#page-container .row-fluid -->