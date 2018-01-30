<?php
/**
* @version        1.0.0
* @package        AcePolls
* @subpackage    AcePolls
* @copyright    2009-2011 JoomAce LLC, www.joomace.net
* @license        GNU/GPL http://www.gnu.org/copyleft/gpl.html
*/

defined('_JEXEC') or die( 'Restricted access');

// Imports
jimport('joomla.installer.installer');

$db = &JFactory::getDBO();

$db->setQuery("SELECT extension_id FROM #__extensions WHERE type = 'module' AND element = 'mod_nicepoll' LIMIT 1");
$id = $db->loadResult();
if ($id) {
    $installer = new JInstaller();
    $installer->uninstall('module', $id);
}
?>