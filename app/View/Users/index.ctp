<h2>Users</h2>
<table class=".table">
    <tr>
        <th>id</th>
        <th>name</th>
        <th>username</th>
        <th>email</th>
        <th class="actions">Actions</th>
    </tr>
    <?php
    $i = 0;
    foreach($users as $user):
        $class=null;
    if($i++ % 2 == 0){
        $class = "class='altrow'";
    }
    ?>
    <tr <?php echo $class;?>>
        <td><?php echo $user['User']['id'] ?>&nbsp;</td>
        <td><?php echo $user['User']['name'] ?>&nbsp;</td>
        <td><?php echo $user['User']['username'] ?>&nbsp;</td>
        <td><?php echo $user['User']['email'] ?>&nbsp;</td>
        <td class="actions">
            <?php echo $this->Html->link('View', array('action'=> 'view', $user['User']['id'])); ?>
            <?php if ($current_user['id'] == $user['User']['id'] || $current_user['role'] == 'admin'){ ?>
            <?php echo $this->Html->link('Edit', array('action'=> 'edit', $user['User']['id'])); ?>
            <?php echo $this->Form->postLink('Delete', array('action' => 'delete', $user['User']['id']), array('confirm' =>'Are you sure?')); ?>
            <?php } ?>
        </td>
    </tr>
    <?php endforeach; ?>
</table>