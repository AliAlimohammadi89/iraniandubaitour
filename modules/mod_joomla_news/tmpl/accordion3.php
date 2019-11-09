<?php
// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );
$document = JFactory::getDocument();
$document->addStyleSheet('modules/mod_joomla_news/assets/raccordion3.css');
$document->addScriptDeclaration('
');
$data	='0';
?>
<?php if (!empty($list)) :?>
<?php if($description >''): ?>
<h4><?php echo $description; ?></h4>
<?php endif; ?>

<div class="accordion">
  <ul>
  	<?php foreach( $list as $item ): ?>
    <li style="background:url(<?php echo $item->photo; ?>) no-repeat top right; background-size:auto 100%;">
      <div> <a href="#">
        <h2>"<?php echo ($item->text);?>"</h2>
        <p><?php echo (strip_tags (mb_substr($item->desc,0,$maxcontent,'UTF-8'))); ?></p>
        </a> </div>
    </li>
	<?php endforeach; ?>
  </ul>
</div>
<?php endif; ?>
