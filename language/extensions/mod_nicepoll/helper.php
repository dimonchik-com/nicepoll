<?php
/**
 * Nice Ajax Poll -  handsome module polls. 
 *
 * @version 1.0
 * @author Dima Kuprijanov (ageent.ua@gmail.com)
 * @copyright (C) 2010 by Dima Kuprijanov (http://www.ageent.ru)
 * @license GNU/GPL: http://www.gnu.org/copyleft/gpl.html
 **/
 
defined('_JEXEC') or die('Restricted access');

class modNicePollHelper
{
    function getNicePoll($id)
    {
        $db        =& JFactory::getDBO();
        $result    = null; 
        
        if(empty($id) || $id=="rand") { // random poll
            $query = 'SELECT id FROM #__polls WHERE published = 1';
            $db->setQuery($query);
            $rand = $db->loadResultArray();
            if(empty($rand)) $rand=array(0);
            do {
                $randnumber=$rand[array_rand($rand, 1)];
            } while(!is_numeric($randnumber));
            $query = 'SELECT id, title, lag FROM #__polls WHERE id = '.$randnumber.' AND published = 1';
            
        } else {
            $query = 'SELECT id, title, lag, alias FROM #__polls WHERE id = '.(int) $id.' AND published = 1';
        }
        $db->setQuery($query);
        $result = $db->loadObject();
        
        if(empty($result)) echo "Please create and publish a survey in the control panel.";
        
        if ($db->getErrorNum()) {
            JError::raiseWarning( 500, $db->stderr() );
        }

        return $result;
    }

    function getNicePollOptions($id)
    {
        $db    =& JFactory::getDBO();

        $query = 'SELECT id, text' .
            ' FROM #__poll_data' .
            ' WHERE pollid = ' . (int) $id .
            ' AND text <> ""' .
            ' ORDER BY id';
        $db->setQuery($query);

        if (!($options = $db->loadObjectList())) {
            echo "MD ".$db->stderr();
            return;
        }
        $query = 'SELECT alias' .
            ' FROM #__poll' .
            ' WHERE pollid = ' . (int) $id .
            ' AND text <> ""' .
            ' ORDER BY id';
        $db->setQuery($query);
        
        return $options;
    }
}
?>