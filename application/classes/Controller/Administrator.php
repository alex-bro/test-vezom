<?php defined('SYSPATH') or die('No direct script access.');

/**
 * Class Controller_Administrator
 */

class Controller_Administrator extends Appadmincontroller {

    public $newsView ='admin/newsview';
    public $itemNewsView ='admin/itemnewsview';

    public function action_index(){
        $data = array();
        $data['links']=array();

        $data['links'][]="<a href='/auth'>login</a>";
        $data['links'][]="<a href='/auth/logout'>logout</a>";
        $data['links'][]="<a href='/admin'>news</a>";
        $data['links'][]="<a href='/admin/add'>add</a>";

        $content = View::factory('adminview');
        $content->bind('data',$data);
        $this->template->content =$content;
    }


} // End
