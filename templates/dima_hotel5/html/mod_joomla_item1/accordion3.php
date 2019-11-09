<?php
// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );
$document = JFactory::getDocument();
$document->addStyleSheet('modules/mod_joomla_item1/assets/raccordion3.css');
$document->addScriptDeclaration('
');
$data	='0';
$option='com_tourismtour';
?>
<?php if (!empty($list)) :?>
<?php if($description >''): ?>
<h4><?php echo $description; ?></h4>
<?php endif; ?>

<div class="accordion">
  <ul>
  	<?php foreach( $list as $item ): ?>
    <li style="background:url(<?php echo $item->fld_pic; ?>) no-repeat top right; background-size:auto 100%;">
      <div> <a href="<?php echo JRoute::_("index.php?option=$option&view=turningpoints&id=" . $item->id); ?>">

          <h2>"<?php echo ($item->fld_name);?>"</h2>
        <p><?php echo (strip_tags (mb_substr($item->fld_info,0,200,'UTF-8'))); ?></p>
        </a> </div>
    </li>
	<?php endforeach; ?>
  </ul>
</div>
<?php endif; ?>
