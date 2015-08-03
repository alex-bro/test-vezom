<?php defined('SYSPATH') or die('No direct script access.');

/**
 * Class Controller_Adminbook
 */

class Controller_Adminbook extends Appadmincontroller {

    public $bookView ='admin/booksview';
    public $itemBookView ='admin/addguestview';

    /**
     * @throws Kohana_Exception
     *
     * admin delete book
     */
    public function action_del(){
        $id = $this->request->param('id');
        $id = Security::encode_php_tags(HTML::chars($id));
        $book = new Model_Guestbook();
        $book->delBook($id);
        HTTP::redirect($_SERVER['HTTP_REFERER']);
    }

    /**
     * @throws HTTP_Exception_404
     *
     * edit book
     */
    public function action_editbook(){
        $id = $this->request->param('id');
        $id = Security::encode_php_tags(HTML::chars($id));
        $session = Session::instance();
        $data['page'] = $session->get("page",'');
        $book = new Model_Guestbook();
        $data = $book->getBook($id);
        if($data){
            if($_POST){
                $book->insBook($id);
                $data['msg'] = 'Запись добавлена';
                HTTP::redirect($_SERVER['HTTP_REFERER']);
            }else{
                $data['msg'] = 'Запись не добавлена';
            }
            $content = View::factory($this->itemBookView);
            $content->bind('data',$data);
            $this->template->content =$content;
        }else{
            throw new HTTP_Exception_404('File not found!');
        };
    }

} // End
