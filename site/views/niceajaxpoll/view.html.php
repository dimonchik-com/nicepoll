<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');
 
// import Joomla view library
jimport('joomla.application.component.view');
 
/**
 * HTML View class for the NiceaJaxpoll Component
 */
class NiceaJaxpollViewNiceaJaxpoll extends JView
{
    var $alies_id;
    function display($tpl = null)
    {
        $alias=JURI::getInstance();
        $alias=preg_replace("/.*niceajaxpoll\//is","",$alias);
        if(!empty($alias)){
             $this->alies_id=$this->det_alies_id($alias);
        }
        $this->get_poll();
        $this->poll=$this->get_list();
        parent::display($tpl);
    }
    
    function det_alies_id($alias){
        $db = JFactory::getDBO();
        $query="SELECT id FROM #__polls WHERE alias='$alias'";
        $db->setQuery($query);
        return $db->loadResult();
    }
    
    function get_list(){
        $db = JFactory::getDBO();
        $query="SELECT * FROM #__polls";
        $db->setQuery($query);
        $result = $db->loadObjectList();
        return $result;
    }
    
    function get_poll(){
        if(isset($_GET['getpliseid'])) {
            $query="SELECT * FROM #__poll_data WHERE pollid=".$_GET['getpliseid'];
            $db = JFactory::getDBO();
            $db->setQuery($query);
            $result = $db->loadObjectList();
            $res="";
            $number=0;
            foreach($result as $val){
                $res.="['".$val->text."', ".$val->hits."],";
                $number=$number+$val->hits;
        }
        $res=substr($res,0,strlen($res)-1);
        $query="SELECT title FROM #__polls WHERE id=".$_GET['getpliseid'];
        $db = JFactory::getDBO();
        $db->setQuery($query);
        

                
        $title = $db->loadResult();
        
        $query = 'SELECT MIN( date ) AS mindate, MAX( date ) AS maxdate'
                . ' FROM #__poll_date'
                . ' WHERE poll_id = '. (int) $_GET['getpliseid'];
            $db->setQuery( $query );
            $dates = $db->loadObject();
                $first_vote = JHTML::_('date',  $dates->mindate, JText::_('DATE_FORMAT_LC4') );
                $last_vote     = JHTML::_('date',  $dates->maxdate, JText::_('DATE_FORMAT_LC4') );
                
            $html= "<script type='text/javascript'>

              jQuery.jqplot.config.enablePlugins = true;plot7 = jQuery.jqplot('response', 
                [[".$res."]], 
                {
                  title: '".$title."', 
                  seriesDefaults: {shadow: true, renderer: jQuery.jqplot.PieRenderer, rendererOptions: { showDataLabels: true } }, 
                  legend: { show:true }
                }
              );
              $('#number').html('".$number."');
              $('#firstvote').html('".$first_vote."');
              $('#lastvite').html('".$last_vote."');
              
</script>
            ";
            $html=preg_replace("'([\r\n])[\s]+'","",$html);
            echo $html;
            exit;
        }
    }
    
}
