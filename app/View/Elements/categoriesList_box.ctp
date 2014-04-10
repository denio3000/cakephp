<?php $categories = $this->requestAction('PostCategories/listall'); ?>

<div class="well">
    <h4>Categories</h4>
    <div class="row">
        <div class="col-lg-9">
            <ul class="list-unstyled">
                <?php
                foreach ($categories as $category){ ?>
                    <li>
                        <?php
                        echo $this->Html->link($category['PostCategory']['title'], array('controller'=>'PostCategories', 'action' => 'view', $category['PostCategory']['id']));
                        ?>
                    </li>
                <?php
                }
                ?>
            </ul>
        </div>
    </div>
</div>