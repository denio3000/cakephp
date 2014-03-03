<?php
/**
 * Created by PhpStorm.
 * User: stefanita.soare
 * Date: 2/24/14
 * Time: 5:01 PM
 */

class Message extends AppModel {

    public $validate = array(
        'name' => array(
            'rule'=> 'notEmpty',
            'message'=>'Introdu numele'
        ),
        'email'=>array(
            'rule' => 'email',
            'message' => 'Introdu o adresa de mail valida!'
        ),
        'message' => array(
            'rule' => 'notEmpty',
            'message' => 'Introdu mesajul pe care vrei sa il transmiti!'
        )
    );
}