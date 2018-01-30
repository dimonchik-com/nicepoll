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

        agjoker("#toolbar-delete a").remove();
        
        agjoker("#toolbar-new a").removeAttr("click");
        agjoker("#toolbar-new a").click(function(){
           window.location="<?php echo JURI::base()?>index.php?option=com_niceajaxpoll&view=niceajaxpoll&layout=edit";
        })

});
})(Ageent);
</script>
<form action="" method="post" name="adminForm" id="niceajaxpoll" >

    <div class="width-60 fltlft">
<fieldset class="adminform">
    <legend>About me</legend>
<p style='color:#559;font-weight:600;'>This component allows you to beautifully display poll on page. It also provides an opportunity to vote without reloading the page.</p><p style='color:#000;font-weight:600'><span style='color:#b55;'>Email:</span> ageent.ru@gmail.com<br/> <span style='color:#b55;'>Web:</span> <a target='_blank' href='http://www.ageent.ru'>www.ageent.ru</a><br /><span style='color:#b55;'>Developer:</span> <a target='_blank' href='http://www.ageent.ru/en/about-me.html'>Dmitriy Kupriyanov</a><br/><span <span style='color:#b55;'>Offer me a job:</span> <a target='_blank' href='http://www.ageent.ru/en/about-me.html#offer'>contact information</a><br/><span style='color:#b55;'>Web Hosting:</span> <a target='_blank' href='http://online-ua.org/'>online-ua.org</a><br/><span <span style='color:#b55;'>Donations:</span> <a target='_blank' href='http://www.ageent.ru/en/about-me.html#offer'>Support me!<span </p>
    </fieldset>
    </div>


</form>
