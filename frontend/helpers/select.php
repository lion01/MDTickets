<?php
/**
 * @package MDTickets
 * @copyright Copyright (c)2013 Martijn Hiddink / mardinkwebdesign.com
 * @license GNU General Public License version 3 or later
 */

defined('_JEXEC') or die();

class MdticketsHelperSelect
{
    protected static function genericlist($list, $name, $attribs, $selected, $idTag)
    {
        if(empty($attribs))
        {
            $attribs = null;
        }
        else
        {
            $temp = '';
            foreach($attribs as $key=>$value)
            {
                $temp .= $key.' = "'.$value.'"';
            }
            $attribs = $temp;
        }

        return JHTML::_('select.genericlist', $list, $name, $attribs, 'value', 'text', $selected, $idTag);
    }
    // Set the prio fields
    public static function prio($selected = null, $id = 'type', $attribs = array() )
    {
        $options = array();
        $options[] = JHTML::_('select.option','','- '.JText::_('COM_MDTICKETS_PRIO_TYPE_SELECT').' -');
        $options[] = JHTML::_('select.option','Normaal',JText::_('COM_MDTICKETS_PRIO_TYPE_NORMAL'));
        $options[] = JHTML::_('select.option','Hoog',JText::_('COM_MDTICKETS_PRIO_TYPE_HIGH'));
        $options[] = JHTML::_('select.option','Laag',JText::_('COM_MDTICKETS_PRIO_TYPE_LAAG'));
        $options[] = JHTML::_('select.option','Periodiek',JText::_('COM_MDTICKETS_PRIO_TYPE_PERIODIEK'));
        $options[] = JHTML::_('select.option','tzt',JText::_('COM_MDTICKETS_PRIO_TYPE_TZT'));

        return self::genericlist($options, $id, $attribs, $selected, $id);
    }

    // Set the category fields
    public static function category($selected = null, $id = 'type', $attribs = array() )
    {
        $options = array();
        $options[] = JHTML::_('select.option','','- '.JText::_('COM_MDTICKETS_CATEGORY_TYPE_SELECT').' -');
        $options[] = JHTML::_('select.option','Telefonie',JText::_('COM_MDTICKETS_CATEGORY_TYPE_PHONE'));
        $options[] = JHTML::_('select.option','Mob-telefonie',JText::_('COM_MDTICKETS_CATEGORY_TYPE_MOBPHONE'));
        $options[] = JHTML::_('select.option','Netwerk',JText::_('COM_MDTICKETS_CATEGORY_TYPE_NETWORK'));
        $options[] = JHTML::_('select.option','Applicaties',JText::_('COM_MDTICKETS_CATEGORY_TYPE_APPLICATIES'));
        $options[] = JHTML::_('select.option','Hardware',JText::_('COM_MDTICKETS_CATEGORY_TYPE_HARDWARE'));
        $options[] = JHTML::_('select.option','Software',JText::_('COM_MDTICKETS_CATEGORY_TYPE_SOFTWARE'));
        $options[] = JHTML::_('select.option','Beheer',JText::_('COM_MDTICKETS_CATEGORY_TYPE_BEHEER'));
        $options[] = JHTML::_('select.option','Security',JText::_('COM_MDTICKETS_CATEGORY_TYPE_SECURITY'));
        $options[] = JHTML::_('select.option','Internet',JText::_('COM_MDTICKETS_CATEGORY_TYPE_INTERNET'));

        return self::genericlist($options, $id, $attribs, $selected, $id);
    }

    // Set the status fields
    public static function status($selected = null, $id = 'type', $attribs = array() )
    {
        $options = array();
        $options[] = JHTML::_('select.option','','- '.JText::_('COM_MDTICKETS_STATUS_TYPE_SELECT').' -');
        $options[] = JHTML::_('select.option','Not Started',JText::_('COM_MDTICKETS_STATUS_TYPE_NOTSTARTED'));
        $options[] = JHTML::_('select.option','Started',JText::_('COM_MDTICKETS_STATUS_TYPE_STARTED'));
        $options[] = JHTML::_('select.option','Pauzed',JText::_('COM_MDTICKETS_STATUS_TYPE_PAUZED'));
        $options[] = JHTML::_('select.option','Waiting for ITON',JText::_('COM_MDTICKETS_STATUS_TYPE_ITON'));
        $options[] = JHTML::_('select.option','Waiting for supplier',JText::_('COM_MDTICKETS_STATUS_TYPE_SUPPLIER'));
        $options[] = JHTML::_('select.option','Waiting for other',JText::_('COM_MDTICKETS_STATUS_TYPE_OTHER'));
        $options[] = JHTML::_('select.option','Closed',JText::_('COM_MDTICKETS_STATUS_TYPE_CLOSED'));
        $options[] = JHTML::_('select.option','Cancelled',JText::_('COM_MDTICKETS_STATUS_TYPE_CANCELLED'));

        return self::genericlist($options, $id, $attribs, $selected, $id);
    }
    // Set the assigned fields
    public static function assigned($selected = null, $id = 'type', $attribs = array() )
    {
        $options = array();
        $options[] = JHTML::_('select.option','','- '.JText::_('COM_MDTICKETS_ASSIGNED_TYPE_SELECT').' -');
        $options[] = JHTML::_('select.option','MHI', 'MHI' );
        $options[] = JHTML::_('select.option','HvT', 'HvT');
        $options[] = JHTML::_('select.option','MHI-HvT', 'MHI-HvT');
        $options[] = JHTML::_('select.option','ITON', 'ITON');
        $options[] = JHTML::_('select.option','Other', 'Other');

        return self::genericlist($options, $id, $attribs, $selected, $id);
    }
    // Set the published fields
    public static function published($selected = null, $id = 'enabled', $attribs = array())
    {
        $options = array();
        $options[] = JHTML::_('select.option','','- '.JText::_('COM_ARS_COMMON_STATE_SELECT_LABEL').' -');
        $options[] = JHTML::_('select.option',0,JText::_('JUNPUBLISHED'));
        $options[] = JHTML::_('select.option',1,JText::_('JPUBLISHED'));

        return self::genericlist($options, $id, $attribs, $selected, $id);
    }
    // Set the pagination fields
    public static function pagination($selected = null, $id = 'limit', $attribs = array())
    {
        $options = array();
        $options[] = JHTML::_('select.option','20','20');
        $options[] = JHTML::_('select.option','50','50');
        $options[] = JHTML::_('select.option','100','100');
        $options[] = JHTML::_('select.option','8888',JText::_('COM_MDTICKETS_NOPAGINATION'));

        return self::genericlist($options, $id, $attribs, $selected, $id);
    }
    // set finished state
    public static function finished($selected = null, $id = 'finished', $attribs = array())
    {
        $options = array();
        $options[] = JHTML::_('select.option','0',JText::_('COM_MDTICKETS_NO'));
        $options[] = JHTML::_('select.option','1',JText::_('COM_MDTICKETS_YES'));

        return self::genericlist($options, $id, $attribs, $selected, $id);
    }
    //get the lastlogin date from the mdtickets_lastlogins database
    //  $id Userid should be set as parameter
    public static function getLastlogin($id){
        $db = JFactory::getDbo();
        $query = $db->getQuery(true);
        $query->select('previouslogin');
        $query->from('#__mdtickets_lastlogins');
        $query->where($db->qn('user_id').' = '.$db->q($id));
        // Reset the query using our newly populated query object.
        $db->setQuery($query);
        $previouslogin = $db->loadResult();

        return $previouslogin;
    }

}
