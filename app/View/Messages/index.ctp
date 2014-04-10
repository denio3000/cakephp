<h2>
    List all messages
</h2>
<p> Listarea tuturor mesajelor </p>
<hr/>
<?php
foreach ($messages as $message){ ?>
    <div class="row messageBox">
        <div class="col-xs-2">
                <?php
                //echo $message['Message']['id'].'. ';
                echo $this->Html->link($message['Message']['name'], array('controller'=>'Messages', 'action' => 'view', $message['Message']['id']));
                ?>
        </div>
        <div class="col-xs-7">
            <?php
            echo $message['Message']['message'];
            ?>
        </div>
        <div class="col-xs-2 smallInfo">
            <?php
            echo $message['Message']['created'];
            ?>
        </div>
        <div class="col-xs-1">
            <a data-id="<?php echo $message['Message']['id'];?>" class="btn btn-default btn-xs removeMessage">
                <i class="glyphicon glyphicon-remove"></i>
            </a>
        </div>
    </div>
<?php
}
?>