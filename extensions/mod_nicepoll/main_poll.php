<?php
/**
 * Nice Ajax Poll -  handsome module polls. 
 *
 * @version 1.0
 * @author Dima Kuprijanov (ageent.ua@gmail.com)
 * @copyright (C) 2010 by Dima Kuprijanov (http://www.ageent.ru)
 * @license GNU/GPL: http://www.gnu.org/copyleft/gpl.html
 **/
 
define( '_JEXEC', 1 );
define( 'DS', DIRECTORY_SEPARATOR );
define ('ABSOLUTE_PATH', dirname(__FILE__) );
define ('RELATIVE_PATH', 'modules' . DS . 'mod_nicepoll');
define ('JPATH_BASE', str_replace(RELATIVE_PATH, "", ABSOLUTE_PATH)); 

require_once ( JPATH_BASE . DS.'includes'.DS.'defines.php' );
require_once ( JPATH_BASE . DS.'includes'.DS.'framework.php' );
require_once (dirname(__FILE__).DS.'helper.php');
  
$mainframe =& JFactory::getApplication('site');
$mainframe->initialise();


$pollId = JRequest::getInt("number_poll");
$optionId = JRequest::getInt("id_option"); 

$poll   = modNicePollHelper::getNicePoll( $pollId, 86400 );
$time_cash = $poll->lag;

if(!empty($pollId) && !empty($optionId) && $optionId!="undefined") { 
    $cookieName = JUtility::getHash( $mainframe->getName() . 'NicePoll' . $pollId );        
    $voted = JRequest::getVar( $cookieName, '0', 'COOKIE', 'INT');
    if($voted) {
        get_full_poll($pollId);
    }
    $ip=$_SERVER['REMOTE_ADDR'];
    setcookie($cookieName, '1', time() + $time_cash, '/');
    $database = &JFactory::getDBO();
    
    $now =  date( 'Y-m-d h:i:s', time() );
    $nowfitche =  date( 'Y-m-d h:i:s', time()+$time_cash );
    
    $database->setQuery("SELECT id FROM #__poll_date WHERE ip='".$ip."' LIMIT 1");
    $rows1 = $database-> loadRow();
    $database->setQuery("SELECT id FROM #__poll_date WHERE date>'".$nowfitche."' AND ip='".$ip."' LIMIT 1");
    $rows = $database-> loadRow();
    
    if(!empty($rows) || empty($rows1)) {
        $query = "INSERT INTO #__poll_date SET date = " .$database->Quote($now). ", vote_id = ".$optionId.", poll_id = ".$pollId.", ip=\"".$ip."\"" ;
        $database->setQuery( $query );
        $database->query();
        $query = "UPDATE #__poll_data SET hits = hits + 1 WHERE pollid = $pollId AND id = $optionId";
        $database->setQuery($query);
        $database->query();

        $query = "UPDATE #__polls SET voters = voters + 1 WHERE id = $pollId";
        $database->setQuery( $query );
        $database->query();
    }
    get_full_poll($pollId);    
} else{
    get_full_poll($pollId);
}

function get_full_poll($pollId) {
     
    $database = &JFactory::getDBO();
    
    $database->setQuery("SET CHARACTER SET utf8");
    $database->query();
    $database->setQuery('SET character_set_results=utf8'); 
    $database->query();
    $database->setQuery('SET character_set_client=utf8');
    $database->query();
    $database->setQuery('SET character_set_connection=utf8');
    $database->query();
   
    $database->setQuery("SELECT * FROM #__poll_data WHERE pollid = ".$pollId."  AND text NOT LIKE '' ORDER BY hits DESC");
    $rows = $database->loadAssocList();
    $full_vote = "";
    foreach ($rows as $row) {
        $full_vote .= '["","'.$row["text"].'","'.$row["hits"].'"],';
    }                
    $full_vote = substr($full_vote, 0, strlen($full_vote)-1);
    echo $full_vote = '['.$full_vote.']';
    exit;
}
?>