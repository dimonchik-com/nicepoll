<style>
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

        agjoker("#toolbar-delete a").removeAttr("onclick");
        agjoker("#toolbar-delete a").click(function(){
           agjoker("#allpoll").attr("action", "<?php echo JURI::base()."index.php?option=com_niceajaxpoll&view=niceajaxpoll&layout=edit&agtask=delete" ?>");
           agjoker("#allpoll").submit();
        })
        agjoker("#allcheck").click(function(){
            agjoker("#allpoll input[type='checkbox']").each(function(){
                var check=agjoker(this).attr("checked");
                if(check!="checked") {
                    agjoker(this).attr("checked","checked");
                    agjoker("#allpoll input[type='checkbox']:first").attr("checked","checked");
                } else {
                    agjoker(this).removeAttr("checked");
                    agjoker("#allpoll input[type='checkbox']:first").removeAttr("checked");
                }
            })
        });
        agjoker(".changeme").click(function(){
            title=agjoker(this).attr("title");
            id=agjoker(this).attr("id");
            agjoker.getJSON("<?php echo JURI::base()?>index.php?option=com_niceajaxpoll&view=niceajaxpoll&layout=edit&agtask=changepub&agpub="+title+"&agid="+id, function(data_ageent){
               if(title==0) {
                   agjoker(".changeme[id="+data_ageent+"]").attr("title",'1');
                   agjoker(".changeme[id="+data_ageent+"]").html("<img border='0' alt='Published' src='<?php echo JURI::base(); ?>templates/bluestork/images/admin/publish_x.png'>");
               } else {
                   agjoker(".changeme[id="+data_ageent+"]").attr("title",'0');
                   agjoker(".changeme[id="+data_ageent+"]").html("<img border='0' alt='Published' src='<?php echo JURI::base(); ?>templates/bluestork/images/admin/tick.png'>");
               }
               
            });
        });
});
})(Ageent);
</script>
<form action="<?php echo JRoute::_('index.php?option=com_niceajaxpoll'); ?>" method="post" name="adminForm" id="allpoll">
<div id="tablecell">
    <table class="adminlist">
    <thead>
        <tr>
            <th width="5">
                #            </th>
            <th width="20">
                <input type="checkbox" name="toggle" id="allcheck" value="" />
            </th>
            <th class="title">Poll Title</th>
            <th align="center" width="5%">Published</th>
            <th align="center" width="5%">Votes</th>
            <th align="center" width="5%">Options</th>
            <th align="center" width="5%">Lag</th>
            <th nowrap="nowrap" width="1%">ID<img alt="" src="/p4/administrator/images/sort_asc.png"></th>
        </tr>
    </thead>

    <tbody>
    <?php  
    $index=1;
    foreach($this->poll as $val) { 
        $db = JFactory::getDBO();
        $query="SELECT count(*) FROM #__poll_data WHERE  NOT text='' AND pollid=".$val->id;
        $db->setQuery($query);
        $result = $db->loadResult();    
    ?>
    <tr class="row0">
            <td><?php echo $index ?></td>
            <td><input type="checkbox"  value="<?php echo $val->id; ?>" name="cid[]"></td>
            <td><span class="editlinktip hasTip"><a  href="<?php echo JRoute::_('index.php?option=com_niceajaxpoll&view=niceajaxpoll&layout=edit&agtask=edit&gid='.$val->id);?>"><?php echo $val->title; ?></a></span></td>
            <td align="center">
                <?php 
                    if($val->published==1) {
                        echo '<a href="" onclick="return false" class="changeme" title="0" id="'.$val->id.'"><img border="0" alt="Published" src="'.JURI::base().'templates/bluestork/images/admin/tick.png"></a>';
                    } else {
                        echo '<a href="" onclick="return false" class="changeme" title="1" id="'.$val->id.'"><img border="0" alt="Published" src="'.JURI::base().'templates/bluestork/images/admin/publish_x.png"></a>';
                    }
                ?>
            </td>
            <td align="center"><?php echo $val->voters; ?></td>
            <td align="center"><?php echo $result; ?></td>
            <td align="center"><?php echo $val->lag; ?></td>
            <td align="center"><?php echo $val->id; ?></td>
        </tr>
    <?php $index++;  } 
           
    ?>
            </tbody>
    </table>
</div>

        <input type="hidden" name="task" value="" />
        <input type="hidden" name="boxchecked" value="0" />
        <?php echo JHtml::_('form.token'); ?>
</form>