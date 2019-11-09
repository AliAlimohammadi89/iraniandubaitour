<?php
// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );
$document = JFactory::getDocument();
$document->addStyleSheet('modules/mod_joomla_news/assets/mislider.css');
$document->addStyleSheet('modules/mod_joomla_news/assets/mislider-skin-cameo.css');
$document->addScript('modules/mod_joomla_news/assets/modernizr.min.js');
$document->addScript('modules/mod_joomla_news/assets/mislider.js');
$document->addScriptDeclaration('
        jQuery(function ($) {
            var slider = $(\'.mis-stage\').miSlider({
                //  The height of the stage in px. Options: false or positive integer. false = height is calculated using maximum slide heights. Default: false
                //stageHeight: 380,
                //  Number of slides visible at one time. Options: false or positive integer. false = Fit as many as possible.  Default: 1
                slidesOnStage: false,
                //  The location of the current slide on the stage. Options: \'left\', \'right\', \'center\'. Defualt: \'left\'
                slidePosition: \'center\',
                //  The slide to start on. Options: \'beg\', \'mid\', \'end\' or slide number starting at 1 - \'1\',\'2\',\'3\', etc. Defualt: \'beg\'
                slideStart: \'mid\',
                //  The relative percentage scaling factor of the current slide - other slides are scaled down. Options: positive number 100 or higher. 100 = No scaling. Defualt: 100
                slideScaling: 150,
                //  The vertical offset of the slide center as a percentage of slide height. Options:  positive or negative number. Neg value = up. Pos value = down. 0 = No offset. Default: 0
                offsetV: -5,
                //  Center slide contents vertically - Boolean. Default: false
                centerV: true,
                //  Opacity of the prev and next button navigation when not transitioning. Options: Number between 0 and 1. 0 (transparent) - 1 (opaque). Default: .5
                navButtonsOpacity: 1
            });
        });
');
?>
<?php if (!empty($list)) :?>
<?php if($description >''): ?>
<h4><?php echo $description; ?></h4>
<?php endif; ?>

<div class="mis-stage">
        <ol class="mis-slider">
        	<?php foreach ($list as $item) : ?>
            <li class="mis-slide wow <?php echo $animation; ?>">
                <a href="#" class="mis-container">
                    <figure>
                        <img src="<?php echo  $item->thumb; ?>" alt="<?php echo (strip_tags (mb_substr($item->text,0,$maxcontent,'UTF-8'))); ?>">
                        <figcaption><?php echo (strip_tags (mb_substr($item->text,0,$maxcontent,'UTF-8'))); ?></figcaption>
                    </figure>
                </a>
            </li>
            <?php endforeach; ?>
        </ol>
    </div>
<?php endif; ?>
