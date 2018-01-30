<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');
 
// import Joomla modelform library
jimport('joomla.application.component.modellist');
 
/**
 * NiceaJaxpoll Model
 */
class NiceaJaxpollModelNiceaJaxpoll extends JModelList
{
    function edit($obj=null) {
        $db = JFactory::getDBO();
        if($this->geturl('agtask')=="save" || $this->geturl('agtask')=="saveandclose" || $this->geturl('agtask')=="saveandnew") {
            $fest=$this->geturl("lolid");
            if(!empty($fest)) {
                $query="UPDATE #__polls SET title='".$this->geturl("title")."', alias='".$this->geturl("alias")."', published='".$this->geturl("published")."', lag=".$this->geturl("lag")." WHERE id=".$fest;
                $db->setQuery( $query );
                $db->query();

                $getall="";
                foreach ($this->geturl("ceath") as $key=>$val) {
                    $query="SELECT pollid FROM #__poll_data WHERE id=".$key;
                    $db->setQuery( $query );
                    $test=$db->loadResult();
                    if(!empty($test)) {
                        if(!empty($val)) {
                            $query="UPDATE #__poll_data SET text='".$val."' WHERE id=".$key;
                            $db->setQuery( $query );
                            $db->query();
                        } else {
                            $query="DELETE FROM  #__poll_data WHERE id=".$key;
                            $db->setQuery( $query );
                            $db->query();
                        }
                    } else {
                            $query="INSERT INTO #__poll_data (id,pollid,text) VALUES (NULL,".$fest.",'".$val."')";
                            $db->setQuery( $query );
                            $db->query();
                    }
                }
                if($this->geturl('agtask')=="save") {
                    $link = JRoute::_(JURI::base().'index.php?option=com_niceajaxpoll&view=niceajaxpoll&layout=edit&agtask=edit&gid='.$fest);
                    $msg="Data saved successfully.";
                } elseif($this->geturl('agtask')=="saveandclose") {
                    echo $link = JRoute::_(JURI::base().'index.php?option=com_niceajaxpoll'); 
                } else {
                    $link = JRoute::_(JURI::base().'index.php?option=com_niceajaxpoll&view=niceajaxpoll&layout=edit'); 
                }
                JController::setRedirect($link,$msg);
                JController::Redirect();
            } else {
                $query="INSERT INTO #__polls (id,title, alias,published,lag) VALUES ( NULL, '".$this->geturl("title")."', '".$this->geturl("alias")."','".$this->geturl("published")."','".$this->geturl("lag")."')";
                $db->setQuery( $query );
                $db->query();
                $id=$db->insertid();
                $getall="";
                foreach ($this->geturl("ceath") as $val) {
                    if(!empty($val)) $getall.="( NULL, ".$id.", '".$val."'),";
                }
                $getall=substr($getall,0,strlen($getall)-1);
                $query="INSERT INTO #__poll_data (id,pollid,text) VALUES ".$getall;
                $db->setQuery( $query );
                $db->query();
                if($this->geturl('agtask')=="save") {
                    $link = JRoute::_(JURI::base().'index.php?option=com_niceajaxpoll&view=niceajaxpoll&layout=edit&agtask=edit&gid='.$id);
                    $msg="A new poll has been created.";
                } elseif($this->geturl('agtask')=="saveandclose") {
                    $link = JRoute::_(JURI::base().'index.php?option=com_niceajaxpoll'); 
                }else {
                    $link = JRoute::_(JURI::base().'index.php?option=com_niceajaxpoll&view=niceajaxpoll&layout=edit'); 
                }
                JController::setRedirect($link,$msg);
                JController::Redirect(); 
            }
        } else if ($this->geturl("agtask")=="edit") {
            $allresponse=array();
            $query="SELECT * FROM #__polls WHERE id=".$this->geturl("gid");
            $db->setQuery($query);
            $allresponse[]= $db->loadObjectList(); 
            $query="SELECT * FROM #__poll_data WHERE pollid=".$this->geturl("gid")." ORDER BY id";
            $db->setQuery($query);
            $allresponse[] = $db->loadObjectList(); 
            return $allresponse;
        } else if ($this->geturl("agtask")=="delete") {
            foreach ($this->geturl("cid") as $key=>$val) {
                if(!empty($val)) {
                            $query="DELETE FROM  #__polls WHERE id=".$val;
                            $db->setQuery($query);
                            $db->query();
                            $query="DELETE FROM  #__poll_data WHERE pollid=".$val;
                            $db->setQuery( $query );
                            $db->query();
                            $query="DELETE FROM  #__poll_date WHERE poll_id=".$val;
                            $db->setQuery( $query );
                            $db->query();
                }
            }
                $link = JRoute::_(JURI::base().'index.php?option=com_niceajaxpoll'); 
                JController::setRedirect($link,"The poll has been deleted.");
                JController::Redirect(); 
        } else if($this->geturl("agtask")=="changepub") {
            $agpub=$this->geturl("agpub");
            $agid=$this->geturl("agid");
            $query="UPDATE #__polls SET  published='".$agpub."'  WHERE id=".$agid;
            $db->setQuery( $query );
            $db->query();
            echo $agid;
            exit;
        }
    }
    
    function geturl($name) {
        if(!empty($_GET[$name])) return $_GET[$name];
        if(!empty($_POST[$name])) return $_POST[$name];
    }
}
