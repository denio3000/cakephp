<?php

$cakeDescription = __d('cake_dev', 'single page - post');
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

    echo $this->Html->css('style');
    // jQuery
    echo $this->Html->script('jquery');
    // Bootstrap
    echo $this->Html->css('bootstrap');
    echo $this->Html->script('bootstrap');

    echo $this->fetch('meta');
    echo $this->fetch('css');
    echo $this->fetch('script');

    // scrierea js-ului generat in site in -> cache
    echo $this->Js->writeBuffer(array('cache'=> TRUE ));
    ?>
    <script>
        // alert('A');
    </script>
</head>
<body class='<?php echo $this->request->params['controller'].'_'.$this->request->params['action']; ?>'>
        <?php echo $this->element('header') ;?>

        <?php echo $this->Session->flash(); ?>
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <?php echo $this->element('search_box') ;?>
                    <?php echo $this->element('categoriesList_box') ;?>
                </div>
                <div class="col-lg-8">
                            <?php echo $this->fetch('content'); ?>
                 </div>
            </div>
        </div>

        <?php echo $this->element('footer') ;?>

<?php // echo $this->element('sql_dump'); ?>
</body>
</html>
