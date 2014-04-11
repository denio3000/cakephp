<?php
/**
 * Created by PhpStorm.
 * User: stefanita.soare
 * Date: 4/10/14
 * Time: 5:38 PM
 */

class Comment extends AppModel
{
    var $name = 'Comment';
    var $belongsTo = array('Post'=>array('className'=>'Post'));
}