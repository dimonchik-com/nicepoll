<?php
// No direct access
defined('_JEXEC') or die('Restricted access');
JHtml::_('behavior.tooltip');
?>
<style>
table.admintable td.key, table.admintable td.paramlist_key {
    background-color: #F6F6F6;
    border-bottom: 1px solid #E9E9E9;
    border-right: 1px solid #E9E9E9;
    color: #666666;
    font-weight: bold;
    text-align: right;
    width: 140px;
}
.icon-48-niceajaxpoll {
  background: url("<?php echo JURI::root() ;?>media/com_niceajaxpoll/images/icon-48-niceajaxpoll.gif") 5px 5px no-repeat;
}
</style>
<?php
    echo '<script src="'.JURI::base()."components/com_niceajaxpoll/views/niceajaxpolls/tmpl/joker_ageent.js".'" type="text/javascript"></script>';
?>
<script type="text/javascript">
(function(agjoker) { 
agjoker(function() {
        agjoker("#toolbar-apply a").removeAttr("onclick");
        agjoker("#toolbar-apply a").click(function(){
             agjoker("#niceajaxpoll").attr("action", "<?php echo JURI::base()."index.php?option=com_niceajaxpoll&view=niceajaxpoll&layout=edit&agtask=save" ?>");
             agjoker("#niceajaxpoll").submit();
        })
        
        agjoker("#toolbar-save a").removeAttr("onclick");
        agjoker("#toolbar-save a").click(function() {
            agjoker("#niceajaxpoll").attr("action", "<?php echo JURI::base()."index.php?option=com_niceajaxpoll&view=niceajaxpoll&layout=edit&agtask=saveandclose" ?>");
            agjoker("#niceajaxpoll").submit();
        })
             
        agjoker("#toolbar-save-new a").removeAttr("onclick");
        agjoker("#toolbar-save-new a").click(function() {
            agjoker("#niceajaxpoll").attr("action", "<?php echo JURI::base()."index.php?option=com_niceajaxpoll&view=niceajaxpoll&layout=edit&agtask=saveandnew" ?>");
            agjoker("#niceajaxpoll").submit();
        })
        
        agjoker("#toolbar-cancel a").removeAttr("onclick");
        agjoker("#toolbar-cancel a").attr("href", "<?php echo JURI::base()."index.php?option=com_niceajaxpoll" ?>");
        
        agjoker("#addplease").click(function(){
           var tr = agjoker("#bigtable tr:last").find("td:first").attr("id");
           tr=parseInt(tr)+1;
            agjoker("#bigtable tbody").append('<tr><td class="key" align="right" id="'+tr+'">Option '+tr+'</td><td ><input type="text" name="ceath[]" style="width: 100%;"  id="title" name="title" class="inputbox"></td></tr> ');
        })
});
})(Ageent);
</script>
<?php
    if(!empty($this->result[0])) { ?>
<form action="" method="post" name="adminForm" id="niceajaxpoll" >
<input name="lolid" value="<?php echo $this->result[0][0]->id; ?>" type="hidden">

    <div class="width-60 fltlft">
<fieldset class="adminform">
    <legend>Details</legend>
    <table class="admintable" style="margin: 0 10px 10px;">
        <tbody><tr>
            <td width="110" class="key">
                <label for="title">
                    Title:
                </label>
            </td>
            <td>
                <input type="text" value="<?php echo $this->result[0][0]->title;?>" size="60" id="title" name="title" class="inputbox">
            </td>
        </tr>
        <tr>
            <td width="110" class="key">
                <label for="alias">
                    Alias:
                </label>
            </td>
            <td>
                <input type="text" value="<?php echo $this->result[0][0]->alias;?>" size="60" id="alias" name="alias" class="inputbox">
            </td>
        </tr>
        <tr>
            <td class="key">
                <label for="lag">
                    Lag:
                </label>
            </td>
            <td><input type="text" value="<?php echo $this->result[0][0]->lag;?>" size="10" id="lag" name="lag" class="inputbox"><span style="position: relative; top: 5px;">(seconds between votes)</span></td>
        </tr>
        <tr>
            <td width="120" class="key">
                Published:
            </td>
            <td>

    <table border="0" >
    <tr>
        <td align="left"><input type="radio" class="inputbox"<?php if($this->result[0][0]->published==0) echo 'checked="checked"';?> value="0" id="published0" name="published"></td>
        <td align="left"><label for="published0" style="min-width : 20px;">No</label></td>
        <td align="left"><input type="radio" class="inputbox" value="1" id="published1" <?php if($this->result[0][0]->published==1) echo 'checked="checked"';?> name="published"></td>
        <td align="left"><label for="published1" style="min-width: 20px;">Yes</label></td>
    </tr>
    </table>           
            </td>
        </tr>
    </tbody></table>
    </fieldset>
    </div>

    <div class="width-40 fltrt">
<fieldset class="adminform">
    <legend>Options</legend>
    <table class="admintable" width="100%" id="bigtable" >
        <tbody>
        <?php
         foreach ($this->result[1] as $key=>$val) {?>
        <tr>
            <td class="key" align="right" id="<?php echo $key+1 ?>">Option <?php echo $key+1 ?></td>
            <td ><input type="text" value="<?php echo $val->text ?>" name="ceath[<?php echo $val->id ?>]" style="width: 100%;"  id="title" name="title" class="inputbox"></td>
        </tr>  
        <?php } ?>
    </tbody>
    </table>
    <input type="button" value="Add Field" id="addplease">
    </fieldset>
    </div>
</form>
<?    } else {
?>
<form action="" method="post" name="adminForm" id="niceajaxpoll" >

    <div class="width-60 fltlft">
<fieldset class="adminform">
    <legend>Details</legend>
    <table class="admintable" style="margin: 0 10px 10px;">
        <tbody><tr>
            <td width="110" class="key">
                <label for="title">
                    Title:
                </label>
            </td>
            <td>
                <input type="text" value="" size="60" id="title" name="title" class="inputbox">
            </td>
        </tr>
        <tr>
            <td width="110" class="key">
                <label for="alias">
                    Alias:
                </label>
            </td>
            <td>
                <input type="text" value="" size="60" id="alias" name="alias" class="inputbox">
            </td>
        </tr>
        <tr>
            <td class="key">
                <label for="lag">
                    Lag:
                </label>
            </td>
            <td><input type="text" value="86400" size="10" id="lag" name="lag" class="inputbox"><span style="position: relative; top: 5px;">(seconds between votes)</span></td>
        </tr>
        <tr>
            <td width="120" class="key">
                Published:
            </td>
            <td>

    <table border="0" >
    <tr>
        <td align="left"><input type="radio" class="inputbox" checked="checked" value="0" id="published0" name="published"></td>
        <td align="left"><label for="published0" style="min-width : 20px;">No</label></td>
        <td align="left"><input type="radio" class="inputbox" value="1" id="published1" name="published"></td>
        <td align="left"><label for="published1" style="min-width: 20px;">Yes</label></td>
    </tr>
    </table>           
            </td>
        </tr>
    </tbody></table>
    </fieldset>
    </div>

    <div class="width-40 fltrt">
<fieldset class="adminform">
    <legend>Options</legend>
    <table class="admintable" width="100%" id="bigtable" >
        <tbody>
        <tr>
            <td class="key" align="right" id="1">Option 1</td>
            <td ><input type="text" name="ceath[]" style="width: 100%;"  id="title" name="title" class="inputbox"></td>
        </tr>  
        <tr>
            <td class="key" align="right" id="2">Option 2</td>
            <td ><input type="text" name="ceath[]" style="width: 100%;"  id="title" name="title" class="inputbox"></td>
        </tr>  
        <tr>
            <td class="key" align="right" id="3">Option 3</td>
            <td ><input type="text" name="ceath[]" style="width: 100%;"  id="title" name="title" class="inputbox"></td>
        </tr>  
        <tr>
            <td class="key" align="right" id="4">Option 4</td>
            <td ><input type="text" name="ceath[]" style="width: 100%;"  id="title" name="title" class="inputbox"></td>
        </tr>  
        <tr>
            <td class="key" align="right" id="5">Option 5</td>
            <td ><input type="text" name="ceath[]" style="width: 100%;"  id="title" name="title" class="inputbox"></td>
        </tr>  
        <tr>
            <td class="key" align="right" id="6">Option 6</td>
            <td ><input type="text" name="ceath[]" style="width: 100%;"  id="title" name="title" class="inputbox"></td>
        </tr>  
        <tr>
            <td class="key" align="right" id="7">Option 7</td>
            <td ><input type="text" name="ceath[]" style="width: 100%;"  id="title" name="title" class="inputbox"></td>
        </tr>  
        <tr>
            <td class="key" align="right" id="8">Option 8</td>
            <td ><input type="text" name="ceath[]" style="width: 100%;"  id="title" name="title" class="inputbox"></td>
        </tr>  
        <tr>
            <td class="key" align="right" id="9">Option 9</td>
            <td ><input type="text" name="ceath[]" style="width: 100%;"  id="title" name="title" class="inputbox"></td>
        </tr>  
        <tr>
            <td class="key" align="right" id="10">Option 10</td>
            <td ><input type="text" name="ceath[]" style="width: 100%;"  id="title" name="title" class="inputbox"></td>
        </tr>  
    </tbody>
    </table>
    <input type="button" value="Add Field" id="addplease">
    </fieldset>
    </div>
</form>
<?php
    }
?>
