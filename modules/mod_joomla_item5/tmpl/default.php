<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_joomla_ITEM5
 *
 * @copyright   Copyright (C) 2005 - 2013 Dima Group, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */
defined('_JEXEC') or die;
$document = JFactory::getDocument();
$document->addStyleSheet('modules/mod_joomla_ITEM5/assets/list.css');
	$clrCounter='';
?>
<?php if (!empty($list)) :?>
<?php if($description >''): ?>
<h4><?php echo $description; ?></h4>
<?php endif; ?>

	<ul class="latestITEM5<?php echo $moduleclass_sfx; ?>">
	<?php foreach ($list as $item) : ?>
	<li <?php echo ($clrCounter++ % 2 == 0 ? 'class="row1"' : 'class="row0"'); ?>>
		<a href="<?php echo $item->link; ?>" title="<?php echo (strip_tags (mb_substr($item->text,0,$maxcontent,'UTF-8'))); ?>">
			<?php echo (strip_tags (mb_substr($item->text,0,$maxcontent,'UTF-8'))); ?>
		</a>
	</li>
	<?php endforeach; ?>
</ul>
<?php endif; ?>
