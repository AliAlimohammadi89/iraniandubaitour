<?php
// no direczt access
defined( '_JEXEC' ) or die( 'Restricted access' );
 $document = JFactory::getDocument();
$document->addStyleSheet('modules/mod_joomla_ITEM5/assets/gallery2.css');
$document->addScriptDeclaration('
jQuery(document).ready(function () {
    // Load the first 8 list items from another HTML file
    //jQuery(\'#myList'.$module->id.'\').load(\'externalList.html li:lt(100)\');
    jQuery(\'#myList'.$module->id.' li:lt(100)\').show();
    jQuery(\'#showLess\').hide();
    var items =  '.$count.';
    var shown =  '.$inpage.';
    jQuery(\'#loadMore'.$module->id.'\').click(function () {
        jQuery(\'#showLess\').show();
        shown = jQuery(\'#myList'.$module->id.' li:visible\').size()+100;
        if(shown< items) {jQuery(\'#myList'.$module->id.' li:lt(\'+shown+\')\').show();}
        else {jQuery(\'#myList'.$module->id.' li:lt(\'+items+\')\').show();
             jQuery(\'#loadMore'.$module->id.'\').hide();
             }
    });
    jQuery(\'#showLess\').click(function () {
        jQuery(\'#myList'.$module->id.' li\').not(\':lt(8)\').hide();
    });
});');
$option='com_tourismtour';
?>
<style>
#myList<?php echo $module->id ?> li{
	display:none;
}
#loadMore<?php echo $module->id ?> {
    color:#FFF;
    cursor:pointer;
	text-align:center;
	background:#BDB00F;
	float:right;
	width:100%;
}
#loadMore<?php echo $module->id ?>:hover {
    color:black;
}
</style>
<?php if (!empty($list)) :?>
<?php if($description >''): ?>
<h1><?php echo $description; ?></h1>
<?php endif; ?>
<ul class="row-fluid gallery2_list" id="myList<?php echo $module->id ?>">
	<?php foreach ($list as $item) : ?>
        <li class="gallery2_item revealOnScroll span3" data-animation="flipInX" data-timeout="400" style="height:<?php echo $height; ?>px;">
            <div class="gallery2_image">
                <div class="overimg">
                    <a href="<?php echo JRoute::_("index.php?option=$option&view=tours&id=" . $item->id); ?>" title="<?php echo $item->fld_title ; ?>xcontent,'UTF-8'"><?php echo $item->fld_title ; ?></a> v
                </div>
                <a href="<?php echo JRoute::_("index.php?option=$option&view=tours&id=" . $item->id); ?>" title="<?php echo  $item->fld_title ; ?>">
                    <img src="<?php echo  $item->fld_pic; ?>" alt="<?php echo $item->fld_title ; ?>" title="<?php echo  $item->fld_title ?>" />
                </a>
            </div>
        </li>
	<?php endforeach; ?>
   </ul>
 <?php endif; ?>
