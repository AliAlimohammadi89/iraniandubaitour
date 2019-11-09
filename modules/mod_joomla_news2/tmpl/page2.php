<?php
// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );
$document = JFactory::getDocument();
$document->addStyleSheet('modules/mod_joomla_news/assets/page2.css');
$document->addStyleSheet('modules/mod_joomla_news/assets/animation.css');
$document->addScript('modules/mod_joomla_news/assets/highlight.pack.js');
$document->addScript('modules/mod_joomla_news/assets/tabifier.js');
$document->addScript('modules/mod_joomla_news/assets/js.js');
$document->addScript('modules/mod_joomla_news/assets/jPages.js');
if($fauto =='true'){
	$autotext='
      pause       : '.$fdoration.',
     clickStop   : '.$fauto.',
	';
}else{
	$autotext='';
}
$document->addScriptDeclaration('
  jQuery(function(){
    /* initiate plugin */
    jQuery("div.holder'.$module->id.'").jPages({
      containerID : "itemContainer'.$module->id.'",
	  '.$autotext.'
      perPage     : '.$inpage.',
      animation   : "'.$animation.'"
    });
  });
');
$clrCounter='';
$option='com_tourismtour';
?>
<?php if (!empty($list)) :?>
<?php if($description >''): ?>
<h4><?php echo $description; ?></h4>
<?php endif; ?>

<ul id="itemContainer<?php echo $module->id ?>" class="pageajax">
	<?php $P=0; foreach ($list as $item) :

      //  print "<pre>";
     //   print_r($item);
        $list2 = ModjoomlaNEWSHelper::getList2("#__tourismtour_turningpoint","id",$item->fld_points);
        $list3 = ModjoomlaNEWSHelper::getList2("#__tourismtour_tourfeature","id",$item->fld_tourfeature);
      //  print_r($list2);
      //  die;
        ?>
			<li class="page_item <?php echo ($P++ % 2 == 0 ? 'row1' : 'row0'); ?>">
            	<div class="photo span3" style="height:<?php echo $height; ?>px; ">
                    <a href="<?php echo JRoute::_("index.php?option=$option&view=tours&id=" . $item->id); ?>">

                    <img src="<?php echo  $item->fld_pic; ?>" alt="<?php echo ($item->fld_pic); ?>" title="<?php echo ($item->fld_title); ?>" width="<?php echo $width; ?>" height="<?php echo $height; ?>"  style="height:<?php echo $height; ?>px;"  />
                    </a>
                </div>
            	<div class="text span4" style="height:<?php echo $height; ?>px; overflow: auto;">
            	<div class="small">امکانات تور</div>
                    <?php foreach ($list3 as $item3) :?>
                    <div class="pagetitle">
                        <div class="category">
                            <a href="<?php echo JRoute::_("index.php?option=$option&view=tourfeatures&id=" . $item3->id); ?>">
                        <span>  <?php echo $item3->fld_title ; ?></span>
                            </a>
                        </div></div>
                    <?PHP endforeach; ?>
                </div>
                <div class="info span3" style="height:<?php echo $height; ?>px; overflow: auto;">
                    <div class="id">
                        <span2>نقاط مورد گردش </span2>
                    </div>
                    <?php foreach ($list2 as $item2) :?>
                        <div class="category">

                            <a href="<?php echo JRoute::_("index.php?option=$option&view=turningpoints&id=" . $item2->id); ?>">

                    <span> <?php echo $item2->fld_name ; ?></span>
                            </a>
                        </div>
                    <?PHP endforeach; ?>
                </div>

            	<div class="nicons span2" style="height:<?php echo $height; ?>px;">
                    <a href="<?php echo JRoute::_("index.php?option=$option&view=tours&id=" . $item->id); ?>">
                	<div class="comment">
                    	<span><?php echo $item->fld_title ; ?> </span>
                    </div>
                    </a>
                	<div class="author">
                    	<span><?php echo $item->fld_title ; ?></span>
                    </div>
                	<div class="date">
                    	<span><?php echo (JHTML::_('date',$item->fld_start_time,'h : m')) ; ?></span>
                    </div>
                </div>
			</li>
	<?php endforeach; ?>
   </ul>
<div class="holder<?php // echo $module->id ?> pagina">
</div>
<?php endif; ?>
