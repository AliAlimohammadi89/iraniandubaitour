<?php
// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );
$document = JFactory::getDocument();
$document->addStyleSheet('modules/mod_joomla_item2/assets/jquery.slidey.css');
$document->addStyleSheet('modules/mod_joomla_item2/assets/bootstrap.css');
$document->addScript('modules/mod_joomla_item2/assets/jquery.slidey.js');
$document->addScript('modules/mod_joomla_item2/assets/jquery.dotdotdot.min.js');
$document->addScriptDeclaration('
');
$data	='0';
$option='com_tourismtour';

?>
<?php if (!empty($lista2)) :?>
<?php if($description >''): ?>
<h4><?php echo $description; ?></h4>
<?php endif; ?>

<div class="slidey">
    <div id="slidey" style="display:none;">
        <ul>
            <?php foreach( $lista2 as $no => $item ):  ?>
            <li>
             <?php
            if($item->fld_pic > '0' and file_exists($item->fld_pic)){
            }else{
                $item->photo='modules/mod_joomla_item2/assets/images/nophoto.png';
            }
            ?>
               <img src="<?php echo $item->fld_pic; ?>">

                    <p class='title'><?php echo ($item->fld_title);?></p>

                 <p class='description'>
                <?PHP $lista22 = Modjoomlaitem2Helper::getLista22("#__tourismtour_turningpoint","id",$item->fld_points);
                ?>
                     <a href="<?php echo JRoute::_("index.php?option=$option&view=tours&id=" . $item->id); ?>" ><span>--رزرو تور--</span></a></br>
                <?php foreach ($lista22 as $item2) :?>
                    بازدید از : <a href="<?php echo JRoute::_("index.php?option=$option&view=turningpoints&id=" . $item2->id); ?>">
                            <span>  <?php echo $item2->fld_name ; ?></span>
                        </a><br>

                <?PHP  endforeach; ?>
                 <?php  echo (strip_tags (mb_substr($item->fld_info,0,200,'UTF-8'))); ?>
                </p>
<!--                -->
            </li>

            <?php endforeach; ?>
        </ul>                    
    </div>
</div>
<div id="nodes"></div>
<script type="text/javascript">
jQuery("#slidey").slidey({
	interval: <?php echo $fdoration; ?>,
	listCount: <?php echo $inpage; ?>,
	showList: true
});
jQuery(".slidey-list-description").dotdotdot();
</script>
<?php endif; ?>
