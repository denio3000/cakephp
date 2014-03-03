<div class="modal-header">
    <h3>Inregistrare user</h3>
</div>
<div class="modal-body">
<?php
   echo $this->Form->create('User');
?>
    <?php
        echo $this->Form->input('name');
        echo $this->Form->input('username');
        echo $this->Form->input('email');
        echo $this->Form->input('password');
        echo $this->Form->input('password_confirmation', array('type'=>'password'));
    ?>
<?php
// Send form through ajax submit.
echo $this->Js->submit('Send', array(
    'id' => 'SendBtn',
    'class' => 'btn btn-primary',
    'before' => $this->js->get('#sending')->effect('fadeIn'),
    'success' => $this->js->get('#sending')->effect('fadeOut'),
    'update' => '.modal-body'
));
?>
    <a class="btn btn-default" data-dismiss="modal">Close</a>
    <?php echo $this->Form->end(); ?>
    <div id="sending" style="display:none;">Se inregistreaza ...</div>
</div>