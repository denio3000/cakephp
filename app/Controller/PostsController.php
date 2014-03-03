<?php
/**
 * Created by PhpStorm.
 * User: stefanita.soare
 * Date: 2/17/14
 * Time: 2:28 PM
 */

class PostsController extends AppController {

    public $name = 'Posts';
    public $helpers = array('Js');
    public $components = array('RequestHandler');
    //var $scaffold;

    public function beforeFilter()
    {
        parent::beforeFilter();
        $this->Auth->allow( 'view', 'index');
    }

    public function index ()
    {
        $posts = $this->Post->find('all');
        foreach($posts as $key => $post) {
            $posts[$key]['Post']['name'] = $this->Post->getAuthorName($post['Post']['userid']);
        }

        if (is_array($posts) || (count($posts) != 0)){
            $this->set(array(
                'posts' => $posts,
            ));
        }
    }

    public function edit ()
    {
        $this->layout = 'post';
        $userid = $this->Auth->user('id');

        App::import('Model', 'PostCategory');
        $catObj = new PostCategory();
        $cats = $catObj->find('list');
        $this->set(compact('cats'));

        if($this->Auth->user('id') != $userid) {
            $this->Session->setFlash('You do not have permission to edit that post!');
            $this->redirect(array('controller'=>'posts','action'=>'index'));
        }else {
             if (!empty($this->request->data)) {
                 $this->request->data['Post']['userid'] = $userid;
                if($this->Post->save($this->request->data)) {
                    if($this->request->is('ajax')){
                        $this->render('success','ajax');
                    }
                    else {
                        $this->Session->setFlash('No');
                    }
                }
            }
        }
    }

    public function view ($id = NULL)
    {
        $this->layout = 'post';

        if(!empty ( $id )){
            $PostLoaded = $this->Post->find('first', array('conditions'=>array('Post.id' => $id)));
            $this->set('PostLoaded', $PostLoaded);

        }
    }
}