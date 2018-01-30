<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');
// import the Joomla modellist library
jimport('joomla.application.component.modellist');
/**
 * NiceaJaxpollList Model
 */
class NiceaJaxpollModelNiceaJaxpolls extends JModelList
{
    /**
     * Method to build an SQL query to load the list data.
     *
     * @return    string    An SQL query
     */
    public function getPoll()
    {
        // Create a new query object.        
        $db = JFactory::getDBO();
        $query="SELECT * FROM #__polls";
        $db->setQuery($query);
        $result = $db->loadObjectList();
        return $result;
    }
}
