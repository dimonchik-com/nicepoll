<?php
// No direct access to this file
defined('_JEXEC') or die;
 
/**
 * NiceaJaxpoll component helper.
 */
abstract class NiceaJaxpollHelper
{
    /**
     * Configure the Linkbar.
     */
    public static function addSubmenu($submenu) 
    {

        JSubMenuHelper::addEntry(JText::_('Poll'), 'index.php?option=com_niceajaxpoll');
        JSubMenuHelper::addEntry(JText::_('About Me'), 'index.php?option=com_niceajaxpoll&view=niceajaxpolls&layout=ageent');

        $document = JFactory::getDocument();
        $document->addStyleDeclaration('.icon-48-niceajaxpoll {background-image: url(../media/com_niceajaxpoll/images/tux-48x48.png);}');

    }
    /**
     * Get the actions
     */
    public static function getActions($messageId = 0)
    {
        $user    = JFactory::getUser();
        $result    = new JObject;
 
        if (empty($messageId)) {
            $assetName = 'com_niceajaxpoll';
        }
        else {
            $assetName = 'com_niceajaxpoll.message.'.(int) $messageId;
        }
 
        $actions = array(
            'core.admin', 'core.manage', 'core.create', 'core.edit', 'core.delete'
        );
 
        foreach ($actions as $action) {
            $result->set($action,    $user->authorise($action, $assetName));
        }
 
        return $result;
    }
}
