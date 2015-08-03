<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Main extends Appcontroller {
    /**
     *
     */
    public function action_index(){

        $data = array();


        $data['links'][]="<a href='/auth'>login</a>";
        $data['links'][]="<a href='/auth/logout'>logout</a>";
        $data['links'][]="<a href='/news'>news</a>";
        $data['links'][]="<a href='/guestbooks'>guest book</a>";
        $data['links'][]="<a href='/guestbooks/addguest'>add guest</a>";

        $content = View::factory('homeview');
        $content->bind('data',$data);
        $this->template->content =$content;
    }
} // End
