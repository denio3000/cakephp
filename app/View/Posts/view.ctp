<?php
/*
 * View page of a singular post
 */

?>

    <h1>
        <?php echo $PostLoaded['Post']['title']; ?>
    </h1>
    <p class="step-description">
        <?php echo $PostLoaded['Post']['text']; ?>
    </p>