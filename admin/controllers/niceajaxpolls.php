<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');
 
// import Joomla controlleradmin library
jimport('joomla.application.component.controlleradmin');
 
/**
 * NiceaJaxpolls Controller
 */
class NiceaJaxpollControllerNiceaJaxpolls extends JControllerAdmin
{
    /**
     * Proxy for getModel.
     * @since    1.6
     */
    public function getModel($name = 'NiceaJaxpoll', $prefix = 'NiceaJaxpollModel') 
    {
        $model = parent::getModel($name, $prefix, array('ignore_request' => true));
        return $model;
    }
}
