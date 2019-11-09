<?php

/**
* FileName: mod_popularstore.php
* Date: 09-08-2005
* License: DimaGroup License
* Script Version #: 1.0
* TemplateShop Version #: 1.0 beta 1 or above
* Author: K.J. Strickland - postbox@mambomates.com (http://www.mambomates.com)
**/

/** ensure this file is being included by a parent file */
defined('_JEXEC') or die('Restricted access');
$document = JFactory::getDocument();
$document->addStyleSheet('modules/mod_joomla_news/assets/category3.css');
$database= JFactory::getDBO();
$catid=$params->get('catid', '');
$catid = is_array($catid)?implode(',',$catid):(int)$catid;
$itemId = (int) $params->get('itemid', 0);
?>
<div class="cricle_category2">
<?php
    $query1 = "SELECT * FROM #__categories WHERE id = ".$catid;
    $database->setQuery($query1);
	//echo $query1;
    $rows = $database->loadObjectList();
    foreach($rows as $row1) {
?>
    <div class="category_info2 wow fadeInUp hidden-phone">
                    
    <div class="category_desc2">
    <?php echo $row1->description; ?>
    </div>
    </div>
     <ul class="menu_category2">
<?php
    $query1 = "SELECT * FROM #__categories WHERE extension = 'com_content' AND parent_id = ".$catid." ORDER BY id ASC";
    $database->setQuery($query1);
	//echo $query1;
    $rows = $database->loadObjectList();
	$data='';
    foreach($rows as $row2) {
		$data=$data+1;
?>
        <li class="span2 lines wow fadeInLeft"  data-wow-delay="0.<?php echo $data; ?>s">
                <a href="<?php echo JRoute::_('index.php?option=com_content&view=category&layout=blog&id='.$row2->id.'&Itemid='.$itemId); ?>" title="<?php echo $row2->title; ?>">
                    <?php
					$obj = json_decode($row2->params);
					if($obj->{'image'}>''){ print '<img src="'.$obj->{'image'}.'" />';} // 12345
					?>
                <span class="title"><?php echo $row2->title; ?></span>
                 </a>
        </li>
<?php
}
?>
        </ul>

<?php
}
?>
</div>

