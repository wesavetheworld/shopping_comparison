<h1>Welcome!</h1>
<?php echo $this->Form->create('search'); ?>
	<div class='col-sm-9'>
		<?php echo $this->Form->input('Search', array('class' => 'form-control')); ?>
	</div>
	<div class='col-sm-3'>
		<?php echo $this->Form->submit('GO!', array('class' => 'btn btn-large btn-primary')); ?>
	</div>
<?php echo $this->Form->end(); ?>