
<h2>
    List all posts
</h2>
<p> Listarea tuturor posturilor </p>
<hr/>
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
            Written by
            <strong>
         <?php    echo $this->Html->link($post['Post']['name'], array('controller'=>'Users', 'action' => 'view', $post['Post']['userid'])); ?>
            </strong>
            at
            <?php echo date("d M Y H:i", strtotime($post['Post']['created']));  ?>
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