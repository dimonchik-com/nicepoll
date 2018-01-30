<?php  
/**
 * Nice Ajax Poll -  handsome module polls. 
 *
 * @version 1.0
 * @author Dima Kuprijanov (ageent.ua@gmail.com)
 * @copyright (C) 2010 by Dima Kuprijanov (http://www.ageent.ru)
 * @license GNU/GPL: http://www.gnu.org/copyleft/gpl.html
 **/
 
defined('_JEXEC') or die('Restricted access'); ?>
<?php 
$mainframe =& JFactory::getApplication('site');
$mainframe->initialise();
$cookieName = JUtility::getHash( $mainframe->getName() . 'NicePoll' . $poll->id ); ?>
<div class="ageent_main_only<?php echo $GLOBALS["copy"]." ".$sufics_varibal?>" >
    <?php echo "<h6 class='one_quesion'>".$poll->title."</h6>"; ?>
    <div class="poll-container">
        <form class="poll" action="index.php?option=com_niceajaxpoll" method="post" accept-charset="utf-8"  name="poll"  onsubmit="return false;">
        <input type="hidden" name="number_poll" value="<?php echo $poll->id;?>" />   
        <input type="hidden" name="cookieName" value="<?php echo $cookieName?>" />        
    <?php        
       foreach ($options as $row) {                  
             echo "<div class='two_input'>
                 <table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" >
                    <tr>
                        <td><input type=\"radio\" value=\"".$row->id."\" name=\"voteid\" id=\"nice_".$row->id."\" class=\"styled\" /></td>
                        <td><label for='nice_".$row->id."' >".$row->text."</label></td>
                    </tr>
                 </table></div>";    
       }
       
    ?>   
    <center>
    <table cellpadding="0" cellspacing="0" class="zobel">
      <tr>
        <td><input type="submit"  value="<?php echo JText::_('VOTE'); ?>" class="nicepollsend button" name="task_button" /></td>
        <td><input type="submit" name="option" value="<?php echo JText::_('RESULTS'); ?>" class="nicepollresult button" onclick="document.location.href='<?php echo JRoute::_("index.php?option=com_niceajaxpoll&id=$poll->alias".$poll->id); ?>'" /></td>
      </tr>
      <tr style="display: none;" class="youalredyvote">
        <td colspan="2" align="center"><span class="already_voted" style="display: none"><?php echo JText::_('YOU_ALREDYVOTE_TEXT'); ?></span><span class="already_error" style="display: none"><?php echo JText::_('ALREADY_ERROR'); ?></span></td>
      </tr>
    </table>
    </center>
    <input type="hidden" name="option" value="com_poll" />
    <input type="hidden" name="task" value="vote" />
    <input type="hidden" name="id" value="<?php echo $poll->id;?>" />
    <?php echo JHTML::_( 'form.token' ); ?>
       </form>
    </div>
</div>
