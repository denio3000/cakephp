<div class="modal-header">
    <h3>Contact Info Design</h3>
</div>
<div class="modal-body">
    <?php

       echo $this->Form->create();
       echo $this->Form->input('name', array('id' => 'name'));
       echo $this->Form->input('email', array('id' => 'email'));
       echo $this->Form->input('message', array('id' => 'message'));

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
    <div id="sending" style="display:none;">Se trimite ...</div>
</div>