<?php

class Post extends AppModel {


    public function getAuthorName($userid = NULL){
        App::import('Model', 'User');
        $userObj = new User();
        if($userid > 0 ){
            $loadUser = $userObj->find('first', array('conditions'=>array('User.id' => $userid)));
            return $loadUser['user']['name'];
        }
        return false;
    }
}
