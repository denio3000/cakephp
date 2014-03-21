<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {

    var $helpers = array('Html', 'Form', 'Js');
    public $components = array(
        'RequestHandler',
        'DebugKit.Toolbar',
        'Session',
        'Auth' => array(
            'loginRedirect' => array('controller' => 'users', 'action' => 'index'),
            'logoutRedirect' => array('controller' => 'users', 'action' => 'login'),
            'authError'=>"You don't have access to view that page",
            'loginAction' => array(
                'controller' => 'users',
                'action' => 'login'
            ),
            'authorize' => array('Controller')
        )
    );

//Determine the loggedin user what access pages have to
    public function isAuthorized($user){
        return true;
    }

//Determine the nonloggedin user what access have to
    public function beforeFilter(){

        $this->Auth->authorize = array('controller');
        $this->Auth->loginAction = array(
            'controller' => 'users',
            'action' => 'login'
        );

        $this->set('logged_in', $this->Auth->loggedIn());
        $this->set('current_user' , $this->Auth->user());

     // Write session
        $loadUser = $this->Auth->user();
        SessionComponent::write("User.id", $loadUser['id']);
        SessionComponent::write("User.username", $loadUser['username']);
        SessionComponent::write("User.role", $loadUser['role']);

     // Ajax change layout
        if ($this->request->is('ajax')) {
            $this->layout = 'ajax';
        } else {
            $this->layout = 'post';
        }
    }

}

