<h2>
    List all messages
</h2>
<p> Listarea tuturor mesajelor </p>
<hr/>
<?php
foreach ($messages as $message){ ?>
    <div class="panel-group">
        <h4>
            <?php
            echo $message['Message']['id'].'. ';
            echo $this->Html->link($message['Message']['name'], array('controller'=>'Messages', 'action' => 'view', $message['Message']['id']));
            ?>
        </h4>
        <div class="panel-body">
            <?php
            echo $message['Message']['message'].'<hr/>';
            ?>
        </div>
    </div>
<?php
}
?>