<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');
 
// import Joomla view library
jimport('joomla.application.component.view');
 
/**
 * NiceaJaxpolls View
 */
class NiceaJaxpollViewNiceaJaxpolls extends JView
{
    /**
     * NiceaJaxpolls view display method
     * @return void
     */
    function display($tpl = null) 
    {   
        $lol = new NiceaJaxpollModelNiceaJaxpolls();
        $this->poll=$lol->getPoll();
        // Set the toolbar
        $this->addToolBar();
 
        // Display the template
        parent::display($tpl);
 
        // Set the document
        $this->setDocument();
    }
 
    /**
     * Setting the toolbar
     */
    protected function addToolBar() 
    {
        $canDo = NiceaJaxpollHelper::getActions();
        JToolBarHelper::title(JText::_('COM_NICEAJAXPOLL_MANAGER_NICEAJAXPOLLS'), 'niceajaxpoll');

        if ($canDo->get('core.create')) 
        {
            JToolBarHelper::addNew('niceajaxpoll.add', 'JTOOLBAR_NEW');
        }
        
        if ($canDo->get('core.delete')) 
        {
            JToolBarHelper::deleteList('', 'niceajaxpolls.delete', 'JTOOLBAR_DELETE');
        }
    }
    /**
     * Method to set up the document properties
     *
     * @return void
     */
    protected function setDocument() 
    {
        $document = JFactory::getDocument();
        $document->setTitle(JText::_('COM_NICEAJAXPOLL_ADMINISTRATION'));
    }
}
