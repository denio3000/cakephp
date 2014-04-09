<?php
/**
 * Created by PhpStorm.
 * User: stefanita.soare
 * Date: 2/28/14
 * Time: 10:41 AM
 */

class PostCategoriesController extends AppController {

    public $name = 'PostCategories';
    public $helpers = array('Js');
    public $components = array('RequestHandler');

    public function beforeFilter()
    {
        parent::beforeFilter();
        $this->Auth->allow( 'view', 'index', 'listall');
    }

    public function index ()
    {
        $categories = $this->PostCategory->find('all');
        if (is_array($categories) || (count($categories) != 0)){
            $this->set('categories', $categories);
        }
    }
    public function listall ()
    {
        $this->autoRender = false;

        $categories = $this->PostCategory->find('all', array('fields' => 'PostCategory.id, PostCategory.title'));
        if (is_array($categories) || (count($categories) != 0)){
            return $categories;
        }
    }

    public function edit ()
    {
        $this->layout = 'post';
        if (!empty($this->request->data)){
            if($this->PostCategory->save($this->request->data))
            {
                if($this->request->is('ajax')){
                    $this->render('success','ajax');
                }
                else {
                    $this->Session->setFlash('No');
                }
            }
        }
    }

    public function view ($id = NULL)
    {
        if(!empty ( $id )){
            $CategoryLoaded = $this->PostCategory->find('first', array('conditions'=>array('PostCategory.id' => $id)));
            $this->set('CategoryLoaded', $CategoryLoaded);

            $this->loadModel('Post');
            $posts = $this->Post->find('all', array('conditions'=> array('Post.cat_id ='.$id)));
            $this->set('posts', $posts);

        }
    }
}