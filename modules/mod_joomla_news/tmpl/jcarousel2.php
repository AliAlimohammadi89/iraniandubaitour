<?php
// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );
$document = JFactory::getDocument();
$document->addStyleSheet('modules/mod_joomla_news/assets/jcarousel.connected-carousels.css');
$document->addScript('modules/mod_joomla_news/assets/jquery.jcarousel.min.js');
$document->addScript('modules/mod_joomla_news/assets/jcarousel.connected-carousels.js');
$document->addScriptDeclaration('

');
$data	='0';
?>
<?php if (!empty($list)) :?>
<?php if($description >''): ?>
<h4><?php echo $description; ?></h4>
<?php endif; ?>

<div class="connected-carousels">
                <div class="stage">
                    <div class="carousel carousel-stage">
                        <ul>
                        	<?php foreach( $list as $item ): ?>
                            <li class=" wow <?php echo $animation; ?>">
                            <a href="<?php echo $item->link; ?>" title="<?php echo (strip_tags (mb_substr($item->text,0,$maxcontent,'UTF-8'))); ?>">
                            <img src="<?php echo $item->photo; ?>" alt="<?php echo ($item->text); ?>" title="<?php echo ($item->text); ?>" style="width:<?php echo $nwidth; ?>px; height:<?php echo $nheight; ?>px;"  />
                            </a>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <a href="#" class="prev prev-stage"><span>&lsaquo;</span></a>
                    <a href="#" class="next next-stage"><span>&rsaquo;</span></a>
                </div>

                <div class="navigation">
                    <a href="#" class="prev prev-navigation">&lsaquo;</a>
                    <a href="#" class="next next-navigation">&rsaquo;</a>
                    <div class="carousel carousel-navigation" style="height:<?php echo $height+10; ?>px;">
                        <ul>
                        	<?php foreach( $list as $item ): ?>
							<?php
                                if($item->photo > '0' and file_exists($item->photo)){
                                         $item->thumb='cache/dima/'.$module->id.'jc2_'.str_replace('/','_',$item->photo);
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
                           <li style="width:<?php echo $width; ?>px; height:<?php echo $height+20; ?>px;">
							<?php if($item->photo > '0' and file_exists($item->photo)){ ?>
                            <img src="<?php echo $item->thumb; ?>" alt="<?php echo ($item->text);?>" title="<?php echo ($item->text);?>" style="width:<?php echo $width; ?>px; height:<?php echo $height; ?>px;" />
                            <?php }else{ ?>
                            <img src="<?php echo 'modules/mod_joomla_news/assets/images/nophoto.png'; ?>" alt="<?php echo ($item->text);?>" title="<?php echo ($item->text);?>" style="width:<?php echo $width; ?>px; height:<?php echo $height; ?>px;" />
                            <?php } ?>
                           </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
<?php endif; ?>
