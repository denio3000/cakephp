<?php
foreach ($posts as $post){ ?>
    <div class="panel-group">
        <h3 class="panel-title">
            <?php
            echo $post['Post']['id'].'. ';
            echo $this->Html->link($post['Post']['title'], array('controller'=>'Posts', 'action' => 'view', $post['Post']['id']));
            ?>
        </h3>
        <div class="panel-info">
            Written
                <?php
                if(isset($post['Post']['name'])):
                    echo ' by <strong>'.
                             $this->Html->link($post['Post']['name'], array('controller'=>'Users', 'action' => 'view', $post['Post']['userid'])).
                          '</strong>';
                endif;
                ?>
            at
            <?php echo date("d M Y H:i", strtotime($post['Post']['created']));  ?>

            <?php
            if(isset($post['Post']['category'])):
                echo 'on <strong>'.
                    $this->Html->link($post['Post']['category'], array('controller'=>'PostCategories', 'action' => 'view', $post['Post']['cat_id'])).
                    '</strong>';
            endif;
            ?>
        </div>
        <div class="panel-body">
            <?php
            echo $post['Post']['text'].'<br/>';
            ?>
        </div>
    </div>
<?php
}
?>