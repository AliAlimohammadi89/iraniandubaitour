<?php
// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );
$document->addStyleSheet('modules/mod_joomla_news/assets/filterimage.css');
?>
<?php if (!empty($list)) :?>
<?php if($description >''): ?>
<h4><?php echo $description; ?></h4>
<?php endif; ?>

<div id="container-<?php echo $module->id ?>">
	<ul class="filter">
		<li class="selected"><a  rel="all">کل آثار</a></li>
			<?php
			$catid = $params->get('catid','0');
			foreach ((array) $catid as $singleFile) : 
				?>
                <li><a href="#" rel="<?php echo $singleFile; ?>"><?php echo getJoomlaCategoryName($singleFile)->title; ?></a></li>
				<?php
			endforeach;
			?>
	</ul>
	
	<ul class="items">
	<?php foreach ($list as $item) : ?>
		<li rel="<?php echo $item->catid; ?>" class="port wow <?php echo $animation; ?>" style="height:<?php echo $height; ?>px; width:<?php echo $width; ?>px;">
            <a data-toggle="modal" href="#" data-target="#myModal<?php echo ($item->id); ?>">
                <img src="<?php echo  $item->thumb; ?>" title="<?php echo ($item->text); ?>" width="<?php echo $width; ?>" height="<?php echo $height; ?>" />
                <div class="linfo">
                <h4><?php echo ($item->text); ?></h4>
                <div><?php echo (strip_tags (mb_substr($item->desc,0,$maxcontent,'UTF-8'))); ?></div>
                </div>
            </a>
        </li>
            <!-- Modal -->
            <div class="modal fade" id="myModal<?php echo ($item->id); ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                             <h4 class="modal-title"><?php echo ($item->text); ?></h4>
                        </div>
                        <div class="modal-body">
                        <div class="te">
                        <img src="<?php echo $item->photo; ?>" />
                        <h5><?php echo ($item->text); ?></h5>
                        <div><?php echo (strip_tags (mb_substr($item->desc,0,$maxcontent,'UTF-8'))); ?></div>
                        </div>
                        </div>
                        <div class="modal-footer">
                        تمامی حقوق محفوظ است.
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!-- /.modal --> 
	<?php endforeach; ?>
	</ul>
	
	<div class="cleaner"></div>
</div>
<script>
jQuery(document).ready(function() {
				
				jQuery('.filter li a').click(function() {
					
					
					jQuery('.filter li').removeClass('selected');
					jQuery(this).parent('li').addClass('selected');
					
					thisItem 	= jQuery(this).attr('rel');
					
					if(thisItem != "all") {
					
						jQuery('.items li[rel='+thisItem+']').stop()
																.animate({'width' : '<?php echo $width; ?>px', 
																			 'opacity' : 1, 
																			 'marginBottom' : '1px', 
																			 'marginLeft' : '1px'
																			});
																			
						jQuery('.items li[rel!='+thisItem+']').stop()
																.animate({'width' : 0, 
																			 'opacity' : 0,
																			 'marginBottom' : '1px', 
																			 'marginLeft' : '1px'
																			});
					} else {
						
						jQuery('.items li').stop()
										.animate({'opacity' : 1, 
													 'width' : '<?php echo $width; ?>px', 
													 'marginBottom' : '1px', 
													 'marginLeft' : '1px'
													});
					}
				})
				
				jQuery('.item li img').animate({'opacity' : 1}).hover(function() {
					jQuery(this).animate({'opacity' : 1});
				}, function() {
					jQuery(this).animate({'opacity' : 1});
				});
				
			});
</script>
<?php endif; ?>
