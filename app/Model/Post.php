<?php

class Post extends AppModel {

    public function getAuthorName($userid = NULL){
        App::import('Model', 'User');
        $userObj = new User();
        if($userid > 0 ){
            $loadUser = $userObj->find('first', array('conditions'=>array('User.id' => $userid)));
            return $loadUser['User']['name'];
        }
        return false;
    }
    public function getCatName($cat_id = NULL){
        App::import('Model', 'PostCategory');
        $catObj = new PostCategory();
        if($cat_id > 0 ){
            $loadCat = $catObj->find('first', array('conditions'=>array('PostCategory.id' => $cat_id)));
            return $loadCat['PostCategory']['title'];
        }
        return false;
    }
}
