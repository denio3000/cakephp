<?php
/**
 * Created by PhpStorm.
 * User: stefanita.soare
 * Date: 2/24/14
 * Time: 4:59 PM
 */

class MessagesController extends AppController{

    public $helpers = array('Js');
    public $component = array('RequestHandler');

    public function beforeFilter()
    {
        parent::beforeFilter();
        $this->Auth->allow( 'view', 'index', 'add');
    }

    public function add(){
        $this->layout = 'post';
        if(!empty($this->data)){
            if($this->Message->save($this->data)){
                if ($this->request->is('ajax')){
                    $this->render('success','ajax');
                }else{
                    $this->Session->setFlash('Mesaj trimis!');
                    $this->redirect(array('action'=>'index'));
                }
            }
        }
    }

    public function index ()
    {
        $messages = $this->Message->find('all');
        if (is_array($messages) || (count($messages) != 0)){
            $this->set('messages', $messages);
        }
    }

    public function view($id = NULL)
    {
        if(!empty ( $id )){
            $MessageLoaded = $this->Message->find('first', array('conditions'=>array('Message.id' => $id)));
            $this->set('MessageLoaded', $MessageLoaded);

        }
    }

}