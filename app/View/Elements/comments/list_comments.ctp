<div id="commContainer">
<?php
foreach ($comments as $comment){
    ?>
    <div class="row commentBox">
        <div class="col-xs-3">
            <span class="avatar"></span>
            <?php
            echo $this->Html->link(
                $this->requestAction('/users/getUsername/'.$comment['user_id']),
                array('controller'=>'Users', 'action' => 'view', $comment['user_id'])
            );
            ?>
        </div>
        <div class="col-xs-9">
            <?php
            echo $comment['content'];
            ?>
            <div class="infoComment">
                <span class="smallInfo"><?php echo $comment['created']; ?></span>
                <?php if($comment['user_id'] == $current_user['id'] || $current_user['role'] == 'admin' ){ ?>
                <a data-id="<?php echo $comment['id'];?>" href="#" class=" btn-xs removeComment">
                    Delete
                </a>
                <?php } ?>
            </div>

        </div>
    </div>
<?php
}
?>
</div>