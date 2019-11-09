<?php
// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );
$document = JFactory::getDocument();
$document->addStyleSheet('modules/mod_joomla_news/assets/simpleslider.css');
$document->addScript('modules/mod_joomla_news/assets/simpleslider.js');
?>
<?php if (!empty($list)) :?>
<?php if($description >''): ?>
<h4><?php echo $description; ?></h4>
<?php endif; ?>

<div class="containers">
		<div class="slide-wrap">
		  <div class="slide-mask" style="height:<?php echo $height; ?>px">
		    <ul class="slide-group">
              <?php foreach ($list as $item) : ?>
		      <li class="slide" style="height:<?php echo $height; ?>px">
                  <a href="<?php echo $item->link; ?>" title="<?php echo (strip_tags (mb_substr($item->text,0,$maxcontent,'UTF-8'))); ?>">
					  <h4><?php echo (strip_tags (mb_substr($item->text,0,$maxcontent,'UTF-8'))); ?></h4>
                      <?php if($newlead=='1'): ?>
					<div class="desc span12"><?php echo (strip_tags (mb_substr($item->desc,0,$maxcontent,'UTF-8'))); ?>...</div>
					<?php endif; ?>
					<?php if($newsreadon=='1'): ?>
					<div class="readon hidden-phone"><a href="<?php echo $item->link; ?>" title="<?php echo (strip_tags (mb_substr($item->text,0,$maxcontent,'UTF-8'))); ?>" class="btn"><?php echo JText::_('MOD_JOOMLA_NEWS_LABEL_READ_MORE') ?></a></div>
					<?php endif; ?>
                  </a>
              </li>
              <?php endforeach; ?>
		    </ul>
		  </div>
		  <div class="slide-nav">
		    <ul>
              <?php foreach ($list as $item) : ?>
		      <li class="bullet"></li>
			  <?php endforeach; ?>
		    </ul>
		  </div>
		</div>
	</div>
<?php endif; ?>
