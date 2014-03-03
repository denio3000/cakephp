<?php
foreach ($categories as $category){ ?>
    <div class="panel-group">
        <h4>
            <?php
            echo $category['PostCategory']['id'].'. ';
            echo $this->Html->link($category['PostCategory']['title'], array('controller'=>'PostCategories', 'action' => 'view', $category['PostCategory']['id']));
            ?>
        </h4>
        <div class="panel-body">
            <?php
            echo $category['PostCategory']['description'].'<br/>';
            ?>
        </div>
    </div>
<?php
}
?>