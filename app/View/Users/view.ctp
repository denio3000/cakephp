
<h2>User</h2>

<div class="col-lg-3">
    <h3>Actions</h3>
    <ul>
        <?php if ($current_user['id'] == $user['User']['id'] || $current_user['role'] == 'admin'){ ?>
            <li><?php echo $this->Html->link('Edit User', array('action' => 'edit', $user['User']['id'])); ?></li>
            <li><?php echo $this->Form->postLink('Delete User', array('action' => 'delete', $user['User']['id']),  array('confirm' =>'Are you sure?')); ?></li>
       <?php } ?>
        <li><?php echo $this->Html->link('List Users', array('action' => 'index')); ?></li>
        <li><?php echo $this->Html->link('New user', array('action' => 'add')); ?></li>
    </ul>
</div>
<div class="col-lg-9">
  <dl  class="dl-horizontal"> <?php $i = 0; $class = 'class="altrow"'; ?>
    <dt <?php if ($i % 2 == 0) echo $class;?>>Id</dt>
    <dd <?php if ($i % 2 == 0) echo $class;?>>
        <?php echo $user['User']['id']; ?>
    </dd>
    <dt <?php if ($i % 2 == 0) echo $class;?>>Name</dt>
    <dd <?php if ($i % 2 == 0) echo $class;?>>
        <?php echo $user['User']['name']; ?>
    </dd>
    <dt <?php if ($i % 2 == 0) echo $class;?>>Username</dt>
    <dd <?php if ($i % 2 == 0) echo $class;?>>
        <?php echo $user['User']['username']; ?>
    </dd>
    <dt <?php if ($i % 2 == 0) echo $class;?>>Email</dt>
    <dd <?php if ($i % 2 == 0) echo $class;?>>
        <?php echo $user['User']['email']; ?>
    </dd>
  </dl>
</div>