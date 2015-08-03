<?php defined('SYSPATH') or die('No direct script access.');

/**
 * Class Controller_Admin
 */

class Controller_Admin extends Appadmincontroller {

    public $newsView ='admin/newsview'; // news view
    public $itemNewsView ='admin/itemnewsview'; //item news

    /**
     * add news
     */
    public function action_add(){
        $data = array();
        if($_POST){
            $news = new Model_New();
            if($news->insNew()){
                $data = 'Новость добавлена';
            }else{
                $data = 'Новость не добавлена';
            }
        }
        $content = View::factory('admin/addview');
        $content->bind('data',$data);
        $this->template->content =$content;
    }

    /**
     * @throws Kohana_Exception
     *
     * delete news
     */
    public function action_del(){
        $id = $this->request->param('id');
        $id = Security::encode_php_tags(HTML::chars($id));
        $news = new Model_New();
        $news->delNew($id);
        HTTP::redirect($_SERVER['HTTP_REFERER']);
    }
} // End
