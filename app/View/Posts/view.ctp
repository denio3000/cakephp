<?php
/*
 * View page of a singular post
 */
?>

<h1>
    <?php echo $PostLoaded['Post']['title']; ?>
</h1>

<p class="step-description postContent">
    <?php echo $PostLoaded['Post']['text']; ?>
</p>
<p><hr/></p>
<h3>Ce parere au altii ...</h3>
<br/>
<!-- List of comments -->
<?php  echo $this->element('comments/list_comments', array("comments" => $PostLoaded['Comment'])); ?>

<!-- Add a comment -->
<?php
if ($logged_in):
     echo $this->element('comments/add_comment',  array("post_id" => $PostLoaded['Post']['id']));
else:
    echo 'Trebuie sa fii logat sa poti adauga un comentariu ...';
endif; ?>






