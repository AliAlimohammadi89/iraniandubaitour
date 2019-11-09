<?php
// no direct access
$document->addStyleSheet('modules/mod_joomla_news/assets/thumb.css');
defined( '_JEXEC' ) or die( 'Restricted access' );
?>
<?php if (!empty($list)) :?>
<?php if($description >''): ?>
<h4><?php echo $description; ?></h4>
<?php endif; ?>

	<ul>
	<?php foreach ($list as $item) : ?>
      <li class="span<?php echo round(12/$inpage); ?> even">
        <div>
         <div class="moduleItemIntrotext">
            <a class="moduleItemImage" href="<?php echo $item->link; ?>" title="<?php echo (strip_tags (mb_substr($item->text,0,$maxcontent,'UTF-8'))); ?>">
            <img class="img-responsive" src="<?php echo $item->photo; ?>" alt="<?php echo (strip_tags (mb_substr($item->text,0,$maxcontent,'UTF-8'))); ?>"/>
            <span class="hover"></span>
            </a>
         </div>
         <h4><a class="moduleItemTitle" href="<?php echo $item->link; ?>"><?php echo (strip_tags (mb_substr($item->text,0,$maxcontent,'UTF-8'))); ?></a></h4>
         <?php if($newlead=='1'): ?>
                <div class="desc span12"><?php echo (strip_tags (mb_substr($item->desc,0,$maxcontent,'UTF-8'))); ?>...</div>
        <?php endif; ?>
        <?php if($newsreadon=='1'): ?>
                <div class="readon hidden-phone"><a href="<?php echo $item->link; ?>" title="<?php echo (strip_tags (mb_substr($item->text,0,$maxcontent,'UTF-8'))); ?>" class="btn"><?php echo JText::_('MOD_JOOMLA_NEWS_LABEL_READ_MORE') ?></a></div>
        <?php endif; ?>
		</div>		
      </li>
    <?php endforeach; ?>
    </ul>
<?php endif; ?>
