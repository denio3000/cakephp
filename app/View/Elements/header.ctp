<nav class="navbar navbar-static-top navbar-default navbar-inverse" role="navigation">
    <div class="container">
        <a href="<?php echo $this->webroot; ?>" class="navbar-brand logo">Infodesign</a>
        <button data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <div class="collapse navbar-collapse navHeaderCollapse">
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">Posts <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="<?php echo $this->webroot .'posts/index'; ?>">List all posts</a></li>
                        <li><a href="<?php echo $this->webroot .'posts/edit'; ?>">Add post</a></li>
                        <li><a href="<?php echo $this->webroot .'postCategories/edit'; ?>">Add category post</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">Messages <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="<?php echo $this->webroot .'messages/index'; ?>">List messages</a></li>
                        <li><a href="<?php echo $this->webroot .'messages/add'; ?>">Add message</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">Users <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="<?php echo $this->webroot .'users/index'; ?>">List users</a></li>
                        <li><a href="<?php echo $this->webroot .'users/add'; ?>">Register</a></li>
                    </ul>
                </li>
                <li><a data-toggle="modal" href="#contact">Contact</a></li>
                <li> <?php if($logged_in): ?>
                    Welcome <?php echo $current_user['username']; ?>
                </li><li> <?php echo $this->Html->link('Logout', array('controller' => 'users','action' => 'logout')); ?>
                <?php else: ?>
                    <?php echo $this->Html->link('Login', array('controller' => 'users','action' => 'login')); ?>
                <?php endif; ?></li>
            </ul>
        </div>
    </div>
</nav>
