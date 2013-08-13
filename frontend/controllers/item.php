<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Martijn
 * Date: 10-8-13
 * Time: 19:47
 * To change this template use File | Settings | File Templates.
 */
defined('_JEXEC') or die();

class MdticketsControllerItem extends FOFController {
   public function onBeforeApplySave(&$data) {
       $model = $this->getThisModel();
       $item = $model->getItem();
       $remark = $item->get('remark');
       $modified = $item->get('modified');
       $detail = $item->get('detail');
       if(!$modified){
           $modified_on = date("Y-m-d H:i:s");
           $data['modified_on'] = $modified_on;
       }
      /* if($remark !=""){
           $user =& JFactory::getUser();
           $name = $user->name;
           $datum = date("Y-m-d H:i:s");
           // Collect all data and form a new string.
           $text = $datum .' : ' . $name . '<br />' . $remark . '<br /><hr>' . $detail;
           $data['detail'] = $text;
           $data['remark'] = '';
       }*/

       return $data;
   }

  public function onAfterApplySave(){
        $model = $this->getThisModel();
        $id = $model->getId();
        $item = $model->getItem();
        $jinput = JFactory::getApplication()->input;
        $remark = $jinput->get('remark', '', 'string');
        $detail = $item->get('detail');
        $user =& JFactory::getUser();
        $name = $user->name;
        $datum = date("Y-m-d H:i:s");
        // Collect all data and form a new string.
        $text = $datum .' : ' . $name . '<br />' . $remark . '<hr>' . $detail;
        $remark_new = '';

        if ($remark != "") {
            // Get a db connection.
            $db = JFactory::getDbo();
            // Create a new query object.
            $query = $db->getQuery(true);
            $query
                ->update($db->qn('#__mdtickets_items'))
                ->set($db->qn('detail').' = '.$db->q($text))
                ->set($db->qn('remark').' = '.$db->q($remark_new))
                ->where($db->qn('mdtickets_item_id').' = '.$db->q($id));
            $db->setQuery($query);

            try {
                $result = $db->execute(); // Use $db->execute() for Joomla 3.0.
            } catch (Exception $e) {
                // Catch the error.
            }
        }
        return true;

    }
}