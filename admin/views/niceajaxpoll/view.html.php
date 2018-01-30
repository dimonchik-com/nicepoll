<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');
 
// import Joomla view library
jimport('joomla.application.component.view');
 
/**
 * NiceaJaxpoll   View
 */
class NiceaJaxpollViewNiceaJaxpoll extends JView
{

    public function display($tpl = null) 
    {

        $lol=new NiceaJaxpollModelNiceaJaxpoll  ();
        $this->result=$lol->edit();
 
        // Set the toolbar
        $this->addToolBar();
 
        // Display the template
        parent::display($tpl);
 
        // Set the document
        $this->setDocument();
    }
 
    protected function addToolBar() 
    {
        if(isset($this->item->id))  {
            $userId = $user->id ;
        } else {
                $this->item->id=0;
        }
        JRequest::setVar('hidemainmenu', true);
        $user = JFactory::getUser();
        $userId = $user->id;
        $isNew = $this->item->id == 0;
        $canDo = NiceaJaxpollHelper::getActions($this->item->id);
        JToolBarHelper::title($isNew ? JText::_('COM_NICEAJAXPOLL_MANAGER_NICEAJAXPOLL_NEW') : JText::_('COM_NICEAJAXPOLL_MANAGER_NICEAJAXPOLL_EDIT'), 'niceajaxpoll');
        // Built the actions for new and existing records.
        if ($isNew) 
        {
            // For new records, check the create permission.
            if ($canDo->get('core.create')) 
            {
                JToolBarHelper::apply('niceajaxpoll.apply', 'JTOOLBAR_APPLY');
                JToolBarHelper::save('niceajaxpoll.save', 'JTOOLBAR_SAVE');
                JToolBarHelper::custom('niceajaxpoll.save2new', 'save-new.png', 'save-new_f2.png', 'JTOOLBAR_SAVE_AND_NEW', false);
            }
            JToolBarHelper::cancel('niceajaxpoll.cancel', 'JTOOLBAR_CANCEL');
        }
    }

    protected function setDocument() 
    {
        if(isset($this->item->id))  {
            $userId = $user->id ;
        } else {
                $this->item->id=0;
        }
        $isNew = $this->item->id == 0;
        $document = JFactory::getDocument();
        $document->setTitle($isNew ? JText::_('COM_NICEAJAXPOLL_NICEAJAXPOLL_CREATING') : JText::_('COM_NICEAJAXPOLL_NICEAJAXPOLL_EDITING'));

        $document->addScript(JURI::root() . "/administrator/components/com_niceajaxpoll/views/niceajaxpoll/submitbutton.js");
        JText::script('COM_NICEAJAXPOLL_NICEAJAXPOLL_ERROR_UNACCEPTABLE');
    }
}
