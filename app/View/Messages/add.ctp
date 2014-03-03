
<h2>Contacteaza-ne</h2>
<div id="success"></div>
<?php

   echo $this->Form->create();
   echo $this->Form->input('name', array('id' => 'name'));
   echo $this->Form->input('email', array('id' => 'email'));
   echo $this->Form->input('message', array('id' => 'message'));
// Send form through ajax submit.
   echo $this->Js->submit('Send', array(
       'before' => $this->js->get('#sending')->effect('fadeIn'),
       'success' => $this->js->get('#sending')->effect('fadeOut'),
       'update' => '#success'
   ));
   echo $this->Form->end();

?>
<div id="sending">Se trimite ...</div>