<?php defined('SYSPATH') or die('No direct script access.');

/**
 * Class Controller_Auth
 */

class Controller_Auth extends Appcontroller {
    /**
     * @throws Kohana_Exception
     *
     * auth
     */
    public function action_index(){
        $data =array();

        $post = $this->request->post();
        if(count($post)>0) {
            $login = HTML::chars($post['login']);
            $pass = HTML::chars($post['password']);

            if (Auth::instance()->login($login, $pass)) {
                $session = Session::instance();
                $auth_redirect=$session->get("auth_redirect",'');
                $session->delete('auth_redirect');
                HTTP::redirect($auth_redirect);
            }else{
                $data = 'not login';
            }
        }
        $content = View::factory('authview');
        $content->bind('data', $data);
        $this->template->content = $content;
    }

    /**
     * @throws Kohana_Exception
     *
     * logout
     */
    public  function action_logout(){
        Auth::instance()->logout(TRUE);
        HTTP::redirect();
    }
    


} // End
