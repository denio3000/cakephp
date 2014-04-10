<?php

$cakeDescription = __d('cake_dev', 'INFODESIGN: Default layout');
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css('cake.generic');

    // jQuery
        echo $this->Html->script('jquery');
        echo $this->Html->script('all');

    // Bootstrap
        echo $this->Html->css('bootstrap');
        echo $this->Html->script('bootstrap');

        echo $this->Html->css('style');
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');

    // scrierea js-ului generat in site in -> cache
        echo $this->Js->writeBuffer(array('cache'=> TRUE ));
	?>
    <script>
       var webroot = "<?php echo $this->webroot; ?>";
    </script>
</head>
<body class='<?php echo $this->request->params['controller'].'_'.$this->request->params['action']; ?>'>
<?php echo $this->element('header'); ?>
<?php //echo $this->element('slider_homepage'); ?>
<div id="wrapper" class="container">
    <?php echo $this->Session->flash(); ?>
    <?php echo $this->Session->flash('auth'); ?>

    <div class="col-lg-3">
        <div class="well">
            <h4> Search</h4>
            <div class="input-group">
                <input type="text" class="form-control">
                        <span class="input-group-btn">
                            <button type="button" class="btn btn-default">
                                <span class="glyphicon glyphicon-search"></span>
                            </button>
                        </span>
            </div>
            <!-- /input-group -->
        </div>
        <?php echo $this->element('categoriesList_box') ;?>
    </div>

    <div class="col-lg-9 panel-body panel panel-default">
			<?php echo $this->fetch('content'); ?>
    </div>
<div>

<?php echo $this->element('footer'); ?>

	<?php // echo $this->element('sql_dump'); ?>
</body>
</html>
