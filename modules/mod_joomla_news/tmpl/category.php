<?php
// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );
$document = JFactory::getDocument();
$document->addStyleSheet('modules/mod_joomla_news/assets/category.css');
$database= JFactory::getDBO();
$itemId = (int) $params->get('itemid', 0);
$catid=$params->get('catid', '');
$catid = is_array($catid)?implode(',',$catid):(int)$catid;
?>
<?php if (!empty($list)) :?>
<?php if($description >''): ?>
<h4><?php echo $description; ?></h4>
<?php endif; ?>

<div class="row-fluid content_category">
	<div class="span6 detailes_category">
<?php
    $query1 = "SELECT * FROM #__categories WHERE id = ".$catid;
    $database->setQuery($query1);
	//echo $query1;
    $rows = $database->loadObjectList();
    foreach($rows as $row1) {
?>
    <h4 class="title">
    <?php echo $row1->title; ?>
    <ul class="menu_category">
<?php
    $query1 = "SELECT * FROM #__categories WHERE extension = 'com_content' AND parent_id = ".$catid." ORDER BY id ASC";
    $database->setQuery($query1);
	//echo $query1;
    $rows = $database->loadObjectList();
    foreach($rows as $row2) {
?>
        <li>
                <a href="<?php echo JRoute::_('index.php?option=com_content&view=category&layout=blog&id='.$row2->id.'&Itemid='.$itemId); ?>" title="<?php echo $row2->title; ?>">
					<?php
						$query2="SELECT COUNT( id ) AS count_content". "\n FROM #__content WHERE catid =".$row2->id;
						$database->setQuery($query2);
						$usercount=$database->loadResult();
						echo $usercount;
					?>                    
                 </a>
        </li>
<?php
}
?>
        </ul>
    </h4>
    <div class="category_image">
                    <?php
					$obj = json_decode($row1->params);
					if($obj->{'image'}>''){ print '<img src="'.$obj->{'image'}.'" />';} // 12345
					?>
    </div>
    <div class="category_desc">
    <?php echo $row1->description; ?>
    </div>
<?php
}
?>
    
    </div>
	<div class="span6 content_category">
    <div class="newsitems">
    <div class="items_list row-fluid">
	<?php foreach ($list as $item) : ?>
                    <?php
                    if($item->photo > '0' and file_exists($item->photo)){
                             $item->thumb='cache/dima/'.$module->id.'thb1_'.str_replace('/','_',$item->photo);
							if (file_exists($item->thumb)) {
							}else{
                            list($current_width, $current_height) = getimagesize(''. $item->photo);
                            $image = new SimpleImages();
                            $image->load(''. $item->photo);
                            $image->resize($width, $height);
                            $image->save($item->thumb);
							}
                    }
                    ?>
			<div class="news_category span<?php echo round(12/$inpage); ?> <?php echo $animation; ?> wow">
            <div class="span7">
				<?php if($item->subtitle >'0'): ?>
                <div class="small"><?php echo $item->subtitle; ?></div>
                <?php endif; ?>
                <div><a href="<?php echo $item->link; ?>" title="<?php echo (strip_tags (mb_substr($item->text,0,$maxcontent,'UTF-8'))); ?>"><?php echo (strip_tags (mb_substr($item->text,0,$maxcontent,'UTF-8'))); ?><?php if($newscat=='1'): ?> <small>(<?php echo $item->category ; ?>)</small><?php endif; ?></a></div>
                <div class="link1">
				<?php echo $item->urls->urlatext; ?>
                </div>
                <div class="link2">
				<?php echo $item->urls->urlbtext; ?>
                </div>
			</div>
			<div class="itemintro span5">
			<?php if($item->photo > '0' and file_exists($item->photo)){ ?>
			<a href="<?php echo $item->link; ?>" title="<?php echo (strip_tags (mb_substr($item->text,0,$maxcontent,'UTF-8'))); ?>">
			<?php $item->thumb = $item->thumb; ?>
			<img src="<?php echo  $item->thumb; ?>" alt="<?php echo (strip_tags (mb_substr($item->text,0,$maxcontent,'UTF-8'))); ?>" title="<?php echo (strip_tags (mb_substr($item->text,0,$maxcontent,'UTF-8'))); ?>" width="<?php echo $width; ?>" height="<?php echo $height; ?>" />
			<?php }else{ ?>
						<?php
			if($item->photo > '0'){
				$item->thumb=$item->photo;
			}else{
				$item->thumb = JRoute::_(JUri::base() .'modules/mod_joomla_news/assets/images/nophoto.png');
			}
			?>

			<img src="<?php echo  $item->thumb; ?>" alt="<?php echo (strip_tags (mb_substr($item->text,0,$maxcontent,'UTF-8'))); ?>" title="<?php echo (strip_tags (mb_substr($item->text,0,$maxcontent,'UTF-8'))); ?>" width="<?php echo $width; ?>" height="<?php echo $height; ?>" />
			<?php } ?>
			</a>
			</div>
			</div>
	<?php endforeach; ?>
   </div>
</div>
    </div>
</div>
<?php endif; ?>
