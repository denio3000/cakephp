
<h2>
    List all categories
</h2>
<p> Listarea tuturor categoriilor </p>
<hr/>

<?php
  foreach ($categories as $category){ ?>
            <div class="panel-group">
        <h3>
     <?php
            echo $category['PostCategory']['id'].'. ';
            echo $this->Html->link($category['PostCategory']['title'], array('controller'=>'PostCategories', 'action' => 'view', $category['PostCategory']['id']));
     ?>
        </h3>
        <div class="panel-body">
        <?php
            echo $category['PostCategory']['description'].'<br/>';
     ?>
        </div>
            </div>
     <?php
  }
?>