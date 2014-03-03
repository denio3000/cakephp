<?php
/**
 * Created by PhpStorm.
 * User: stefanita.soare
 * Date: 2/27/14
 * Time: 2:00 PM
 */
class User extends AppModel{

    public $name = 'user';
    public $displayField = 'name';

    public $validate = array(
        'name' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'Not empty',
                //'allowEmpty' => false,
                //'required' => false,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
            )
        ),
        'username' => array(
            'between5-15' => array(
                'rule' => array('between', 5, 15),
                'message' => 'Name must be between 5 and 15 chars.'
                //'allowEmpty' => false,
                //'required' => false,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
            'not taken' =>array(
                'rule' => array('isUnique'),
                'message' => 'That username has already been taken.'
            )
        ),
        'email' => array(
            'valid email' => array(
                'rule' => array('email'),
                'message' => 'Enter a valid email address.'
                //'allowEmpty' => false,
                //'required' => false,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'password'=>array(
            'Not empty' =>array(
                'rule' => 'notEmpty',
                'message' => 'Please enter your password.'
            ),
            'Match passwords' =>array(
                'rule'=>'matchPasswords',
                'message' => 'Your password do not match.'
            )
        ),
        'password_confirmation'=>array(
            'Not empty' =>array(
                'rule' => 'notEmpty',
                'message' => 'Please confirm your password.'
            )
        ),
    );

    public function matchPasswords($data) {
        if ($data['password'] == $this->data['User']['password_confirmation']) {
            return true;
        }
        $this->invalidate('password_confirmation', 'Your password do not match');
        return false;
    }

    public function beforeSave(){

        if(isset($this->data['User']['password'])) {
            $this->data['User']['password'] = AuthComponent::password($this->data['User']['password']);
        }
        return true;
    }

}