<?php
/**
 * Created by PhpStorm.
 * User: stefanita.soare
 * Date: 2/27/14
 * Time: 1:11 PM
 */

class UsersController extends AppController {

    public $paginate = array(
        'limit' => 25,
        'conditions' => array('status' => '1'),
        'order' => array('User.username' => 'asc' )
    );

    public function beforeFilter()
    {
        parent::beforeFilter();
        $this->Auth->allow( 'index', 'view', 'add', 'login');
    }

    public function isAuthorized($user)
    {
        if($user['role'] == 'admin') {
            return true;
        }
        if (in_array($this->action, array('edit', 'delete'))){
            if($user['id'] != $this->request->params['pass'][0]) {
                return false;
            }
        }
        return true;
    }

    public function login() {

        //if already logged-in, redirect
        if($this->Session->check('Auth.User')){
            $this->redirect(array('action' => 'index'));
        }
        // if we get the post information, try to authenticate
        if ($this->request->is('post')) {
            if ($this->Auth->login()) {
                $this->Session->setFlash(__('Welcome, '. $this->Auth->user('username')),'flash_success');
                $this->redirect($this->Auth->redirectUrl());
            } else {
                $this->Session->setFlash(__('Invalid username or password'),'flash_alert');
            }
        }
    }

    public function logout() {
        $this->redirect($this->Auth->logout());
    }

    /** List all users
     */
    public function index() {
        $this->paginate = array(
            'limit' => 6,
            'order' => array('User.username' => 'asc' )
        );
        $users = $this->paginate('User');
        $this->set(compact('users'));
    }

    public function add() {
        if ($this->request->is('ajax')) {
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('The user has been created','flash_success'));
                $this->render('success','ajax');
            } else {
                $this->Session->setFlash(__('The user could not be created. Please, try again.'),'flash_alert');
            }
        }elseif($this->request->is('post')){
            $this->redirect(array('action' => 'index'));
        }
    }

    public function view ($id = null)
    {
        $this->User->id = $id;
        if(!$this->User->exists()){
            throw new NotFoundException('Invalid user');
        }

        if(!$id){
            $this->Session->setFlash('Invalid user');
            $this->redirect(array('action' => 'index'));
        }
        $this->set('user', $this->User->read());

        $this->loadModel('Post');
        $posts = $this->Post->find('all', array('conditions'=> array('Post.userid ='.$id)));
        $this->set('posts', $posts);
    }

    public function edit($id = null) {

        if (!$id) {
            $this->Session->setFlash('Please provide a user id','flash_alert');
            $this->redirect(array('action'=>'index'));
        }

        $user = $this->User->findById($id);
        if (!$user) {
            $this->Session->setFlash('Invalid User ID Provided','flash_alert');
            $this->redirect(array('action'=>'index'));
        }

        if ($this->request->is('post') || $this->request->is('put')) {
            $this->User->id = $id;
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('The user has been updated'),'flash_success');
                $this->redirect(array('action' => 'edit', $id));
            }else{
                $this->Session->setFlash(__('Unable to update your user.'),'flash_alert');
            }
        }

        if (!$this->request->data) {
            $this->request->data = $user;
        }
    }

    public function delete($id = null) {

        if (!$id) {
            $this->Session->setFlash('Please provide a user id','flash_alert');
            $this->redirect(array('action'=>'index'));
        }

        $this->User->id = $id;
        if (!$this->User->exists()) {
            $this->Session->setFlash('Invalid user id provided','flash_alert');
            $this->redirect(array('action'=>'index'));
        }
        if ($this->User->saveField('status', 0)) {
            $this->Session->setFlash(__('User deleted'),'flash_info');
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('User was not deleted'),'flash_alert');
        $this->redirect(array('action' => 'index'));
    }

    public function activate($id = null) {

        if (!$id) {
            $this->Session->setFlash('Please provide a user id','flash_alert');
            $this->redirect(array('action'=>'index'));
        }

        $this->User->id = $id;
        if (!$this->User->exists()) {
            $this->Session->setFlash('Invalid user id provided','flash_alert');
            $this->redirect(array('action'=>'index'));
        }
        if ($this->User->saveField('status', 1)) {
            $this->Session->setFlash(__('User re-activated'),'flash_info');
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('User was not re-activated'),'flash_alert');
        $this->redirect(array('action' => 'index'));
    }

    /**
     * Get User Name by id
     * @param array $id
     * @return int
     */
    public function getUsername ($id = null)
    {
        $this->User->id = $id;
        if(!$this->User->exists()){
            throw new NotFoundException('Invalid user');
        }
        if(!$id){
            $this->Session->setFlash('Invalid user');
            $this->redirect(array('action' => 'index'));
        }
        $user = $this->User->find('first', array('conditions'=> array('User.id ='.$id), 'fields' => 'name'));
        return $user['User']['name'];
    }

}