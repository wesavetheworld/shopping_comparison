<nav class="navbar navbar-default" role="navigation">
	<div class="navbar-header">
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button><!-- /.navbar-toggle -->
		<?php
			echo $this->Html->Link('Search', '/', array('class' => 'navbar-brand'));
		?>
	</div><!-- /.navbar-header -->
	<div class="collapse navbar-collapse navbar-ex1-collapse">
		<ul class="nav navbar-nav">
		<?php 
			$pages = array('stores', 'categories', 'items');
			foreach ($pages as $page):
				$url = $this->Html->url("/$page");
				$class = $this->here == $url ? 'active' : '';
				echo "<li class='$class'>";
				echo $this->Html->Link($page, $url, array('class' => 'navbar-brand'));
				echo "</li>";
			endforeach;
		?>
		</ul><!-- /.nav navbar-nav -->
	</div><!-- /.navbar-collapse -->
</nav><!-- /.navbar navbar-default -->