
<div class="well">
    <h4> Search</h4>
    <div class="input-group">
    <?php
        echo $this->Form->create(null, array('url' => array('controller' => 'posts','action' => 'search')));
        echo $this->Form->input('value', array('label' => '','value'=> '' , 'class' => 'form-control'));
        echo $this->Form->end('search', array('class' => 'input-group-btn'));
    ?>
    </div>
</div>
<!-- /well -->