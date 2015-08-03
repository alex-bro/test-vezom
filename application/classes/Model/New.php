<?php defined('SYSPATH') or die('No direct script access.');

/**
 * Class Model_New
 */

class Model_New extends ORM {
    /**
     * @param int $offset
     * @param int $limit
     * @return array|bool
     * @throws Kohana_Exception
     *
     * get pagination
     */
    public function getPagination($offset=0, $limit=10){
        $news = ORM::factory('New')
            ->limit($limit)
            ->offset($offset)
            ->find_all();
        if ($news->count()){
            $data = array();
            foreach($news as $item){
                $data[] = array('id'=>$item->id,
                    'name'=>$item->name,
                    'body'=>$item->body);
            }
            return $data;
        }else{
            return false;
        }

    }

    /**
     * @param $id
     * @return array|bool
     */
    public function getNew($id){
        $new = ORM::factory('New',$id);
        if($new->loaded()) return $new->as_array();
        return false;
    }

    /**
     * @param $id
     * @return bool
     * @throws Kohana_Exception
     *
     * set news
     */
    public function setNew($id){
        $new = ORM::factory('New',$id);
        $new->name = $_POST('name');
        $new->body = $_POST('body');
        try{
            $new->update();
            return true;
        }catch (ORM_Validation_Exception $e){
            return false;
        }
    }

    /**
     * @return bool
     * @throws Kohana_Exception
     *
     * append news
     */
    public function insNew(){
        $new = ORM::factory('New');
        $new->name = $_POST['name'];
        $new->body = $_POST['body'];
        try{
            $new->create();
            return true;
        }catch (ORM_Validation_Exception $e){
            return false;
        }
    }

    /**
     * @param $id
     * @return bool
     * @throws Kohana_Exception
     *
     * delete news
     */
    public function delNew($id){
        $new = ORM::factory('New',$id);
        try{
            $new->delete();
            return true;
        }catch (ORM_Validation_Exception $e){
            return false;
        }
    }

    /**
     * @return int
     * @throws Kohana_Exception
     *
     * count news
     */
    public static function getCount(){
    return ORM::factory('New')->find_all()->count();
    }
} // End Model_New