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
    require_once (dirname(__FILE__).DS.'helper.php');
    $poll   = modNicePollHelper::getNicePoll($params->get( 'id', 0 ));
    $template_nice_list=$params->get('template_nice_list', 1);
    $document = & JFactory::getDocument();
    
    if(!isset($GLOBALS["copy"])){
        $GLOBALS["copy"]=1;
    } else {
        $GLOBALS["copy"]=$GLOBALS["copy"]+1;
    }
    $sufics_varibal = $params->get('moduleclass_sfx');
    $select_varibal="";
    

    $document->addScript(JURI::base()."modules/mod_nicepoll/js/joker_ageent.js");

    $document->addStyleSheet(JURI::base()."modules/mod_nicepoll/css/mod_nicepoll.css");
    
    if($params->get('display_link')) {
        $select_varibal = " ageent_all.push({'mod_nicepoll':1, 'full_url_nicepoll' : '".JRoute::_('index.php?option=com_niceajaxpoll')."','just_site_url' :'".JURI::base()."modules/mod_nicepoll/main_poll.php',";  
    } else {
        $select_varibal = " ageent_all.push({'mod_nicepoll':0, 'full_url_nicepoll' : '".JRoute::_('index.php?option=com_niceajaxpoll')."','just_site_url' :'".JURI::base()."modules/mod_nicepoll/main_poll.php',"; 
    }
    if(!empty($sufics_varibal)) $sufics_varibal="ageent_main_only".$sufics_varibal;
    $select_varibal .= "'sufics_varibal':'ageent_main_only".$GLOBALS["copy"]."',";
    
    
    if($params->get('template_list')) {
       $select_varibal .= "'nicepoll_template_list':'".$params->get('template_list')."',"; 
    } else {
        $select_varibal .= "'nicepoll_template_list': 1,";
    }
    
    if($params->get('width_percent')) {
        $select_varibal .= "'nicepoll_width_percent':'".$params->get('width_percent')."',"; 
    } else {
        $select_varibal .= "'nicepoll_width_percent': 100,";
    }
    
    if($params->get('ag_disabled_or_del')) {
        $select_varibal .= "'ag_disabled_or_del':1,"; 
    } else {
        $select_varibal .= "'ag_disabled_or_del':0,";
    }
    
    if($params->get('ag_fast_refrash')) {
        $select_varibal .= "'ag_fast_refrash':1,"; 
    } else {
        $select_varibal .= "'ag_fast_refrash':0,";
    }
    
    if($params->get('ag_real_back')) {
        $select_varibal .= "'ag_real_back':1,"; 
    } else {
        $select_varibal .= "'ag_real_back':0,";
    }
    
    if($params->get('show_resultat')) {
        $select_varibal .= "'show_resultat':1,"; 
    } else {
        $select_varibal .= "'show_resultat':0,";
    }
    
    if($params->get('already_voted')) {
        $select_varibal .= "'already_voted':1,"; 
    } else {
        $select_varibal .= "'already_voted':0,";
    }
    
    if($params->get('ag_show_result')==1) {
        $select_varibal.="'ag_total_votes':'".JText::_('TOTAL_VOTES')."',";
    } else {
       $select_varibal.="'ag_total_votes':'',";
    }
    $select_varibal.="'ag_all_poll':'".JText::_('ALL_POLL')."',";

    $select_varibal.="'ag_back':'".JText::_('BACK')."'});";

    $document->addScriptDeclaration($select_varibal); 

    $document->addScript(JURI::base()."components/com_niceajaxpoll/views/niceajaxpoll/tmpl/custom-form-elements.js"); 
    
    $document->addScript(JURI::base()."modules/mod_nicepoll/js/ajax.js");
    $document->addCustomTag("<!-- Copyright Nice Ajax Poll  http://ageent.ru -->");
    
    if ( $poll && $poll->id ) {
        $template=$params->get("template_list_def");
        $layout = JModuleHelper::getLayoutPath('mod_nicepoll',$template);            
        $options = modNicePollHelper::getNicePollOptions($poll->id);        
        require($layout);
    }
?>
