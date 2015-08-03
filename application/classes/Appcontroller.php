<?php defined('SYSPATH') or die('No direct script access.');

/**
 * Class Appcontroller
 */

abstract class Appcontroller extends Controller_Template {

    public $template = 'mainview'; // main view
    public $newsView ='newsview'; // view news
    public $itemNewsView ='itemnewsview'; //view item news
    public $bookView ='booksview'; // view books
    public $itemBookView ='itembooksview'; //view item book

    /**
     * before create
     */
    public function before(){
        parent::before();
        $this->template->content = '';
        $this->template->styles = array('main');;
        $this->template->scripts = '';
    }

    /**
     * @throws HTTP_Exception_404
     * @throws Kohana_Exception
     *
     * show pagination list news
     */
    public function action_list(){
        if(isset($_GET['page'])) $get['page'] = Security::encode_php_tags(HTML::chars($_GET['page']));
        else $get['page'] = 1;
        $valid = Validation::factory($get);
        $valid->rule('page','numeric');
        if(!$valid->check()) HTTP::redirect('/');
        if((integer)$get['page'] <= 0) $get['page'] = 1;
        $items_per_page = Kohana::$config->load('pagination')->get('default')['items_per_page'];
        $news = new Model_New();
        $data= $news->getPagination(((integer)$get['page'] - 1)*(integer)$items_per_page,$items_per_page);
        if($data){
            $session = Session::instance();
            $session->set("page",$get['page']);

            $total_items = $news->getCount();
            $content = View::factory($this->newsView);
            $content->bind('data',$data);
            $content->pagination = Pagination::factory(array('total_items' => $total_items));
            $this->template->content =$content;
        }else{
            throw new HTTP_Exception_404('File not found!');
        }
    }

    /**
     * @throws HTTP_Exception_404
     *
     * view new item
     */
    public function action_view(){
        $id = $this->request->param('id');
        $id = Security::encode_php_tags(HTML::chars($id));
        $news = new Model_New();
        $data = $news->getNew($id);
        if($data){
            $content = View::factory($this->itemNewsView);
            $content->bind('data',$data);
            $this->template->content =$content;
        }else{
            throw new HTTP_Exception_404('File not found!');
        };
    }

    /**
     * @throws HTTP_Exception_404
     * @throws Kohana_Exception
     *
     * view pagination list book
     */
    public function action_viewguest(){

        if(isset($_GET['page'])) $get['page'] = Security::encode_php_tags(HTML::chars($_GET['page']));
        else $get['page'] = 1;
        $valid = Validation::factory($get);
        $valid->rule('page','numeric');
        if(!$valid->check()) HTTP::redirect('/');
        if((integer)$get['page'] <= 0) $get['page'] = 1;
        $items_per_page = Kohana::$config->load('pagination')->get('default')['items_per_page'];
        $books = new Model_Guestbook();
        $data = $books->getPagination(((integer)$get['page'] - 1)*(integer)$items_per_page,$items_per_page);
        if($data){
            $session = Session::instance();
            $session->set("page",$get['page']);

            $total_items = $books->getCount();
            $content = View::factory($this->bookView);
            $content->bind('data',$data);
            $content->pagination = Pagination::factory(array('total_items' => $total_items));
            $this->template->content =$content;
        }else{
            throw new HTTP_Exception_404('File not found!');
        }
    }

    /**
     * add book
     */
    public function action_addguest(){
        $data = array('msg'=>'');
        $captcha = Captcha::instance('default');
        $session = Session::instance();
        $data['page'] = $session->get("page",'');
        if(isset($_POST['btnSubmit'])){
            $book = new Model_Guestbook();
            if(Captcha::valid($_POST['captcha'])){
                if($book->insBook()){
                    $data['msg'] = 'Запись добавлена';
                }else{
                    $data['msg'] = 'Запись не добавлена';
                }
            }   else{
                $data['msg'] = 'Капча не верна';
            }
        }
        $content = View::factory('addguestview');
        $content->captcha = $captcha;
        $content->bind('data',$data);
        $this->template->content = $content;
    }

} // End
