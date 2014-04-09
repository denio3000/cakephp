
<div class="well">
    <h4> Search</h4>
    <?php
        echo $this->Form->create(null, array(
            'url' => array( 'controller' => 'posts', 'action' => 'search'),
            'inputDefaults' => array(
                'div' => false
            ),
            'method' => 'post',
            'class' => 'input-group'
        ));
        echo $this->Form->input('value', array('label' => false, 'value' => '' , 'div' => false, 'class' => 'form-control'));
       /* echo $this->Form->end(array(
            'type' => 'button',
            'label' => 'Search',
            'class' => 'btn btn-default',
            'div' => array(
                'class' => 'input-group-btn',
            )
        )); */
    ?>
    <span class="input-group-btn">
        <button class="btn btn-default" type="submit">
            <span class="glyphicon glyphicon-search"></span>
        </button>
    </span>
</div>
<!-- /well -->