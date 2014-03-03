');
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
<body>

<?php echo $this->Session->flash(); ?>
<?php echo $this->fetch('content'); ?>

</body>
</html>
