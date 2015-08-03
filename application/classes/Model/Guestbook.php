<?php defined('SYSPATH') or die('No direct script access.');

/**
 * Class Model_Guestbook
 */

class Model_Guestbook extends ORM {
    /**
     * @param int $offset
     * @param int $limit
     * @return array|bool
     * @throws Kohana_Exception
     *
     * get pagination
     */
    public function getPagination($offset=0, $limit=10){
        $books = ORM::factory('Guestbook')
            ->limit($limit)
            ->offset($offset)
            ->find_all();
        if ($books->count()){
            $data = array();
            foreach($books as $item){
                $data[] = array('id'=>$item->id,'name'=>$item->name,'email'=>$item->email,'body'=>$item->body);
            }
            return $data;
        }else{
            return false;
        }

    }

    /**
     * @param $id
     * @return array|bool
     *
     * get array book
     */
    public function getBook($id){
        $book = ORM::factory('Guestbook',$id);
        if($book->loaded()) return $book->as_array();
        return false;
    }

    /**
     * @param $id
     * @return bool
     * @throws Kohana_Exception
     */
    public function setBook($id){
        $book = ORM::factory('Guestbook',$id);
        $book->name = $_POST('name');
        $book->email = $_POST('email');
        $book->body = $_POST('body');
        try{
            $book->update();
            return true;
        }catch (ORM_Validation_Exception $e){
            return false;
        }
    }

    /**
     * @param bool $id
     * @return bool
     * @throws Kohana_Exception
     *
     * insert or update book
     */
    public function insBook($id = false){

        $_POST = Arr::map('trim', $_POST);
        $post = Validation::factory($_POST);
        $post -> rule('name', 'not_empty')
            -> rule('name', 'alpha_numeric', array(':value', false))
            -> rule('name', 'min_length', array(':value', 2))
            -> rule('name', 'max_length', array(':value', 20))
            -> rule('email', 'email')
            -> rule('body', 'not_empty')
            -> rule('body', 'max_length', array(':value', 1024));

        if($post -> check()) {
            if ($id) $book = ORM::factory('Guestbook',$id);
            else $book = ORM::factory('Guestbook');
            $book->name = Security::encode_php_tags(HTML::chars($_POST['name']));
            $book->email = Security::encode_php_tags(HTML::chars($_POST['email']));
            $book->body = Security::encode_php_tags(HTML::chars($_POST['body']));
            try{
                if ($id) $book->update();
                else $book->create();
                return true;
            }catch (ORM_Validation_Exception $e){
                return false;
            }
        } else {
            //$errors = $post -> errors('validation');
            return false;
        }


    }

    /**
     * @param $id
     * @return bool
     * @throws Kohana_Exception
     *
     * delete book
     */
    public function delBook($id){
        $book = ORM::factory('Guestbook',$id);
        try{
            $book->delete();
            return true;
        }catch (ORM_Validation_Exception $e){
            return false;
        }
    }

    /**
     * @return int
     * @throws Kohana_Exception
     *
     * count books
     */
    public static function getCount(){
        return ORM::factory('Guestbook')->find_all()->count();
    }

}