<?php
/**
 * Created by PhpStorm.
 * User: stefanita.soare
 * Date: 4/10/14
 * Time: 5:35 PM
 */

class CommentsController extends AppController
{

    //var $helpers = array('Html','Form','Ajax','Javascript');

    public function beforeFilter()
    {
        parent::beforeFilter();
        //Ajax change layout
        if ($this->request->is('ajax')) {
            $this->layout = 'ajax';
        } else {
            $this->layout = 'post';
        }

        $this->Auth->allow( 'index');
    }

   public function index($myid = null)
   {

   }

   public function add() {
       $this->autoRender = false;
            if (!empty($this->request->data)) {
                $this->request->data['Comment']['user_id'] = $userid = $this->Auth->user('id');
                $this->Comment->create();
                 if ($this->Comment->save($this->request->data)) {
                     $comments = $this->Comment->find('all',array('conditions'=> array('post_id'=>$this->data['Comment']['post_id']),'recursive'=>-1));
                     $commProcessed = array();
                     foreach($comments as $key => $comment){
                         $commProcessed[$key] = $comment['Comment'];
                     }
                    $this->set('comments' , $commProcessed);
                    $this->render('/Elements/Comments/list_comments','ajax');
                 } else {
                    $this->render('failure','ajax');
                 }
            }
   }

   public function delete($id = null)
   {
       $this->autoRender = false;

       if(!empty ( $id )){
           $CommentLoaded = $this->Comment->find('first', array('conditions'=>array('Comment.id' => $id)));
           $this->Comment->delete($CommentLoaded['Comment']['id']);

           $this->Session->setFlash('Comentariu sters!','flash_success');
           $this->redirect(array('action'=>'index'));
       }else{
           $this->Session->setFlash('Comentariul nu a putut fi sters!','flash_success');
           $this->redirect(array('action'=>'index'));
       }
   }
}