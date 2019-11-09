<?php
// no direct access
$document->addStyleSheet('modules/mod_joomla_news/assets/event.css');
defined( '_JEXEC' ) or die( 'Restricted access' );
?>
<?php if (!empty($list)) :?>
<?php if($description >''): ?>
<h4><?php echo $description; ?></h4>
<?php endif; ?>

	<ul class="eventlist">
	<?php foreach ($list as $item) : ?>
      <li class="event">
        <div class="event">
            <a href="<?php echo $item->link; ?>" title="<?php echo (strip_tags (mb_substr($item->text,0,$maxcontent,'UTF-8'))); ?>">
            <img class="img" src="<?php echo $item->thumb; ?>" alt="<?php echo (strip_tags (mb_substr($item->text,0,$maxcontent,'UTF-8'))); ?>"/>
            <?php echo (strip_tags (mb_substr($item->text,0,$maxcontent,'UTF-8'))); ?>
         <?php if($newlead=='1'): ?>
                <div class="desc"><?php echo (strip_tags (mb_substr($item->desc,0,$maxcontent,'UTF-8'))); ?>...</div>
        <?php endif; ?>
        <?php if($newsdate=='1'): ?>
                <div class="date"><?php echo (JHTML::_('date',$item->date,'D d M Y')) ; ?></div>
        <?php endif; ?>
        </a>
		</div>		
      </li>
    <?php endforeach; ?>
    </ul>
<?php endif; ?>
