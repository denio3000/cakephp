<h2> Login</h2>
<div class="users form">
    <?php
    echo $this->Html->link( "Add A New User",   array('action'=>'add') );
    ?>
    <br/>
    <br/>
    <?php echo $this->Session->flash('auth'); ?>
    <?php echo $this->Form->create('User'); ?>
        <?php echo $this->Form->input('username');
        echo $this->Form->input('password');
        ?>
    <?php echo $this->Form->end(__('Login')); ?>
</div>
