<!DOCTYPE html>
<!--[if IE 9]><html class="lt-ie10" lang="en" > <![endif]-->
<html class="no-js" lang="en" >

<head>
   
	<?php echo $this->Html->charset(); ?>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>
		<?php echo $this->fetch('title').' - Mairie de Jacou'?>
	</title>
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css('normalize.css');
		echo $this->Html->css('foundation.css');
		echo $this->Html->css('main');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		
	?>
	<?= $this->Html->script('vendor/modernizr.js'); ?>
	<?= $this->Html->script('vendor/jquery.js'); ?>
	<?= $this->Html->script('foundation.min.js'); ?>

</head>

<body>
	<div id="content">
		<div class="row">
		<div class="small-6 columns">
			<?php echo $this->Session->flash(); ?>

			<?php echo $this->fetch('content'); ?>
		</div>
		</div>
	</div>

  <?= $this->fetch('script'); ?>
  <script>
    $(document).foundation();
  </script>
</body>
</html>