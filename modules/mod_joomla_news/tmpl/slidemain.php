<?php
// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );
$document = JFactory::getDocument();
$document->addStyleSheet('modules/mod_joomla_news/assets/slidemain.css');
//$document->addStyleSheet('http://netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
$document->addScript('modules/mod_joomla_news/assets/slidemain.js');
$document->addScriptDeclaration('
');
$n='';
?>
<?php if (!empty($list)) :?>
<?php if($description >''): ?>
<h4><?php echo $description; ?></h4>
<?php endif; ?>

<div class="slider_container">
      <ul>
      	<?php foreach ($list as $item) : ?>
        <?php $n=$n+1; ?>
        <li <?php if($n=='1'):?>class="current_slide"<?php endif; ?>>
                <div class="overslide hidden-phone">
                <h2><?php echo $item->text; ?></h2>
                <?php echo $item->desc; ?>
                </div>	
				<img src="<?php echo $item->photo; ?>" class="wow fadeInUp" alt="<?php echo ($item->text); ?>" title="<?php echo ($item->text); ?>"  />
        </li>
        <?php endforeach; ?>
      </ul>
      
      <span class="prev_slide"><i class="fa fa-angle-left" aria-hidden="true"></i></span>
      <span class="next_slide"><i class="fa fa-angle-right" aria-hidden="true"></i></span>
      
      <div class="buttons"></div>
      
      <span class="play_pause"><i class="fa fa-pause"></i></span>
    </div>
<?php endif; ?>
