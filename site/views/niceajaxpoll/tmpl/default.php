<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');
?>
  <script language="javascript" type="text/javascript" src="<?php echo JURI::base();?>components/com_niceajaxpoll/views/niceajaxpoll/tmpl/jquery.min.js"></script>
<style type="text/css">
.select {
    position: absolute;
    width: 158px; /* With the padding included, the width is 190 pixels: the actual width of the image. */
    height: 21px;
    padding: 0 24px 0 8px;
    color: #fff;
    font: 12px/21px arial,sans-serif;
    background: url(<?php echo JURI::base();?>components/com_niceajaxpoll/views/niceajaxpoll/tmpl/select.gif) no-repeat;
    overflow: hidden;
}
</style>
  <script type="text/javascript">
(function($) { 
$(function() {
    
        getpoll();
        $("#getpoll").change(function(){
            getpoll();
        });
        
        function getpoll(){
            id=$("#getpoll option::selected").val();
            <?php if(!empty($this->alies_id)) echo "id=".$this->alies_id.";" ?>
            if(id!="") {
                $.ajax({
                  url: "<?php echo JURI::base()?>index.php?option=com_niceajaxpoll&getpliseid="+id,
                  context: document.body,
                  success: function($data){
                    $("#response").html($data);
                  }
                });
            }
        }
        
});
})(jQuery);
</script>
  <!--[if lt IE 9]><script language="javascript" type="text/javascript" src="<?php echo JURI::base();?>components/com_niceajaxpoll/views/niceajaxpoll/tmpl/excanvas.js"></script><![endif]-->
  
  <link rel="stylesheet" type="text/css" href="<?php echo JURI::base();?>components/com_niceajaxpoll/views/niceajaxpoll/tmpl/jquery.jqplot.css" />
  <!-- BEGIN: load jqplot -->
  <script language="javascript" type="text/javascript" src="<?php echo JURI::base();?>components/com_niceajaxpoll/views/niceajaxpoll/tmpl/jquery.jqplot.js"></script>
  <script language="javascript" type="text/javascript" src="<?php echo JURI::base();?>components/com_niceajaxpoll/views/niceajaxpoll/tmpl/jqplot.pieRenderer.js"></script>
    <script language="javascript" type="text/javascript" src="<?php echo JURI::base();?>components/com_niceajaxpoll/views/niceajaxpoll/tmpl/custom-form-elements.js"></script>
  <!-- END: load jqplot -->
<style>
.jqplot-target {font-size: 16px;}
#agresult td{padding: 3px;}
</style>
<form id="poll" name="poll" method="post" action="index.php" style="min-width : 400px;">
<div class="componentheading">
    </div>
<div class="contentpane">
    <label for="id">Select Poll        
    <select  size="1" class="stylednice" name="id" id="getpoll">
<?php
        foreach($this->poll as $val) {
            if($this->alies_id==$val->id){
                echo '<option selected="selected" value="'.$val->id.'">'.$val->title.'</option>';
            } else {
                echo '<option value="'.$val->id.'">'.$val->title.'</option>';
            }
        }    
?>
        </select>
    </label>
</div>
<div class="contentpane">
<br>
<table cellspacing="0" cellpadding="0" border="0" class="pollstableborder">
<thead>
    <tr>
        <th class="sectiontableheader" colspan="3"><img height="14" border="0" align="middle" width="12" alt="" src="<?php echo JURI::base();?>components/com_niceajaxpoll/views/niceajaxpoll/tmpl/poll.png"></th>
    </tr>
</thead>
<tbody>
</tbody>
</table>
<br/>
<div id="responsehide" style="display: none;"></div>
<div id="response"></div>
<table cellspacing="0" cellpadding="0" border="0" id="agresult">
<tbody>
    <tr>
        <td class="smalldark">Number of Voters</td>
        <td class="smalldark"><span id="number">&nbsp;:&nbsp;</span></td>
    </tr>
    <tr>
        <td class="smalldark">First Vote</td>
        <td class="smalldark"><span id="firstvote">&nbsp;:&nbsp;</span></td>
    </tr>
    <tr>
        <td class="smalldark">Last Vote</td>
        <td class="smalldark"><span id="lastvite">&nbsp;:&nbsp;</span></td>
    </tr>
</tbody>
</table>
</div>
</form>
