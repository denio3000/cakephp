<?php
/*
 * View page of a singular post
 */

?>

    <h1>
        <?php echo $CategoryLoaded['PostCategory']['title']; ?>
    </h1>
    <p class="step-description">
        <?php echo $CategoryLoaded['PostCategory']['description']; ?>
    </p>
<hr/>

<?php  echo $this->element('posts/list', array("posts" => $posts)); ?>