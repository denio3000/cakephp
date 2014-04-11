<div>
<?php
echo $this->Form->create('Comment', array('url' => array('controller' => 'Comments', 'action' => 'add'), 'default' => false));
echo $this->Form->input('post_id', array('id' => 'commPostId',  'type' => 'hidden', 'value' => $post_id));
echo $this->Form->input('content', array('id' => 'commContent',  'type' => 'quote', 'placeholder' => 'Scrie un comentariu ...' ,'class' => 'textarea'));
echo $this->Js->submit('Send', array(
    'url' => '/comments/add',
    'update' => '#commContainer',
    'class' => 'btn btn-primary btn-large'
));

echo $this->Form->end();
    ?>
<div id="sending" style="display:none;">Se trimite ...</div>
</div>