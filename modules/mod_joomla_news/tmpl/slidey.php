<?php
// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );
$document = JFactory::getDocument();
$document->addStyleSheet('modules/mod_joomla_news/assets/jquery.slidey.css');
$document->addStyleSheet('modules/mod_joomla_news/assets/bootstrap.css');
$document->addScript('modules/mod_joomla_news/assets/jquery.slidey.js');
$document->addScript('modules/mod_joomla_news/assets/jquery.dotdotdot.min.js');
$document->addScriptDeclaration('
');
$data	='0';
?>
<?php if (!empty($list)) :?>
<?php if($description >''): ?>
<h4><?php echo $description; ?></h4>
<?php endif; ?>

<div class="slidey">
    <div id="slidey" style="display:none;">
        <ul>
            <?php foreach( $list as $no => $item ): ?>
            <li>
             <?php
            if($item->photo > '0' and file_exists($item->photo)){
            }else{
                $item->photo='modules/mod_joomla_news/assets/images/nophoto.png';
            }
            ?>
               <img src="<?php echo $item->photo; ?>">
                <p class='title'><?php echo ($item->text);?></p>
                <p class='description'><?php echo (strip_tags (mb_substr($item->desc,0,$maxcontent,'UTF-8'))); ?></p>
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
            showList: false,
            showNodes: false,
            nodeContainer: "#nodes"
        });
        jQuery(".slidey-list-description").dotdotdot();
</script>
<?php endif; ?>
