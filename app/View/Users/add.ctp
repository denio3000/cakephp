<div class="modal-header">
    <h3>Inregistrare user</h3>
</div>
<div class="modal-body">
<?php
   echo $this->Form->create('User');
        echo $this->Form->input('name');
        echo $this->Form->input('username');
        echo $this->Form->input('email');
        echo $this->Form->input('password');
        echo $this->Form->input('password_confirm', array('label' => 'Confirm Password *', 'maxLength' => 255, 'title' => 'Confirm password', 'type'=>'password'));
       /* echo $this->Form->input('role', array(
            'options' => array( 'admin' => 'Admin', 'regular' => 'Developer')
        )); */
    ?>
<?php
// Send form through ajax submit.
echo $this->Js->submit('Register', array(
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

<?php
if($this->Session->check('Auth.User')){
    echo $this->Html->link( "Return to Dashboard",   array('action'=>'index') );
    echo "<br>";
    echo $this->Html->link( "Logout",   array('action'=>'logout') );
}else{
    echo $this->Html->link( "Return to Login Screen",   array('action'=>'login') );
}
?>