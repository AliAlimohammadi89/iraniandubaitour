<?php
// no direct access
$document->addStyleSheet('modules/mod_joomla_news/assets/thumb.css');
defined( '_JEXEC' ) or die( 'Restricted access' );
?>
<?php if (!empty($list)) :?>
<?php if($description >''): ?>
<h4><?php echo $description; ?></h4>
<?php endif; ?>

<link rel="stylesheet" href="modules/mod_joomla_news/assets/wall.css"> <!-- Resource style -->
<script src="modules/mod_joomla_news/assets/modernizr_wall.js"></script> <!-- Modernizr -->
<section id="cd-timeline" class="cd-container">
		<?php foreach ($list as $item) : ?>
		<div class="cd-timeline-block">
			<div class="cd-timeline-img cd-picture">
				<img src="<?php echo  $item->thumb; ?>" alt="<?php echo (strip_tags (mb_substr($item->text,0,$maxcontent,'UTF-8'))); ?>">
			</div> <!-- cd-timeline-img -->

			<div class="cd-timeline-content">
				<h2><?php echo (strip_tags (mb_substr($item->text,0,$maxcontent,'UTF-8'))); ?></h2>
				<p>
            	<?php if($newlead=='1'): ?>
                <?php echo (strip_tags (mb_substr($item->desc,0,$maxcontent,'UTF-8'))); ?>
                <?php endif; ?>
                </p>
                <?php if($newsreadon=='1'): ?>
				<a href="<?php echo $item->link; ?>" class="cd-read-more"><?php echo JText::_('MOD_JOOMLA_NEWS_LABEL_READ_MORE') ?></a>
                <?php endif; ?>
				<span class="cd-date"><?php echo (JHTML::_('date',$item->date,'Y')) ; ?></span>
			</div> <!-- cd-timeline-content -->
		</div> <!-- cd-timeline-block -->
		<?php endforeach; ?>
	</section>
<script src="modules/mod_joomla_news/assets/wall.js"></script> <!-- Resource jQuery -->
<?php endif; ?>
