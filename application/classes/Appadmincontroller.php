<?php defined('SYSPATH') or die('No direct script access.');

/**
 * Class Appadmincontroller
 */

abstract class Appadmincontroller extends Appcontroller {

    public $template = 'admin/mainview';

    public function before(){
        parent::before();
        $session = Session::instance();
        $session->set("auth_redirect",$_SERVER['REQUEST_URI']);

        if(!Auth::instance()->get_user()){HTTP::redirect('Auth');}
    }


} // End Welcome
