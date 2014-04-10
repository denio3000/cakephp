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
    //var $scaffold;

    public function beforeFilter()
    {
        parent::beforeFilter();
        /*Ajax change layout
        if ($this->request->is('ajax')) {
            $this->layout = 'ajax';
        } else {
            $this->layout = 'post';
        } */

        $this->Auth->allow( 'view', 'index', 'search');
    }

    public function index ()
    {
        $posts = $this->Post->find('all');
        foreach($posts as $key => $post) {
            $posts[$key]['Post']['name'] = $this->Post->getAuthorName($post['Post']['userid']);
            $posts[$key]['Post']['category'] = $this->Post->getCatName($post['Post']['cat_id']);
        }

        if (is_array($posts) || (count($posts) != 0)){
            $this->set(array(
                'posts' => $posts,
            ));
        }
    }

    public function add ()
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

    function search()
    {
        $conditions = array();
        $or_conditions = array();
        $search_fields = array('Post.title','Post.text');
        if(isset($this->request->data['Post']['value'])){
            $value = $this->request->data['Post']['value'];
        }else{
            $value = '';
        }
        $searches = explode(" ",$value);

        foreach($search_fields as $f)
        {
            array_push($conditions,array("$f Like"=>"%$value%"));
            for($i=0;; $i++)
            {
                if(isset($searches[$i]))
                {
                    array_push($conditions,array("$f Like"=>"%$searches[$i]%"));
                }else{
                    break;
                }
            }

            array_push($or_conditions,array('OR' => $conditions));
            $conditions = array();

        }
        $final_conditions = array('OR' => $or_conditions);
        $results = $this->Post->find('all',array('limit'=>15, 'conditions'=>$final_conditions, 'fields'=>array('Post.*'), 'order' => array('Post.created desc')));
        foreach($results as $key => $result) {
            $results[$key]['Post']['name'] = $this->Post->getAuthorName($result['Post']['userid']);
        }
        $this->set('posts',$results);

        //$this->render('index');

    }

}