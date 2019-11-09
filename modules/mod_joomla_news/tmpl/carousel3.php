<?php
// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );
$document = JFactory::getDocument();
$data	='0';
?>
<?php if (!empty($list)) :?>
<?php if($description >''): ?>
<h4><?php echo $description; ?></h4>
<?php endif; ?>

<script type="text/javascript">
jQuery(function(jQuery){
                   jQuery('#sp-smart-slider101 .maxima-slider').maximaSlider({
                   autoplay  : 1,
                   interval  : 5000,
                   fullWidth : false,
                   rWidth : 135,
                   rHeight : 58,
                   preloadImages:[
				   <?php foreach( $list as $no => $item ): ?>
				   '<?php echo $item->photo; ?>',
				   <?php endforeach; ?>
				   ],
               });
               var OldTime;
               jQuery('.layout-maxima .slider-controllers > ul li').on('click',function(event){
               event.stopPropagation();
               if( OldTime ){
               var DiffTime  = event.timeStamp-OldTime;
               if( DiffTime < 2000){
               return false;
               }
               } 
               OldTime=event.timeStamp;
               jQuery('#sp-smart-slider101 .maxima-slider').maximaSlider('goTo', jQuery(this).index() );
               jQuery(this).parent().find('>li').removeClass('active');
               jQuery(this).addClass('active');
               });
               jQuery('#sp-smart-slider101 .maxima-slider').maximaSlider('onSlide', function(index){
               		
               jQuery('.layout-maxima .slider-controllers > ul li').removeClass('active');
               //----jQuery('.layout-maxima .slider-controllers > ul li').get(index).addClass('active');
               jQuery('.layout-maxima .slider-controllers > ul li').eq(index).addClass('active');
               });
               });
</script>
<div id="sp-smart-slider101" class="sp-smart-slider layout-maxima  ">
                           <!-- Carousel items -->
                           <div class="maxima-slider">
                           <?php foreach( $list as $item ): ?>
                              <div class="slider-item odd animate-in">
                                 <div class="slider-item-inner">
                                    <div class="slider-content">
                                       <div class="slider-title">
                                          <p class="sp-smart-pretitle"><?php echo ($item->text);?></p>
                                          <h2 class="sp-smart-title"><?php echo ($item->text);?></h2>
                                       </div>
                                       <div class="slider-text hidden-phone">
                                       		<?php echo (strip_tags (mb_substr($item->desc,0,$maxcontent,'UTF-8'))); ?>
                                       </div>
                                    </div>
                                    <div  class="slider-image">
                                       <img src="images/001-banner--shabanifard.jpg" alt="دعاوی خانواده" title="دعاوی خانواده" />
                                    </div>
                                    <div class="clearfix"></div>
                                 </div>
                              </div>
                           <?php endforeach; ?>  
                           </div>
                           <div class="sp-preloader">
                              <i class="icon-cog icon-spin"></i>
                              <i class="icon-cog icon-spin"></i>
                              <i class="icon-cog icon-spin"></i>
                           </div>
                           <div class="slider-controllers">
                              <ul>
                              	<?php $data	='0'; ?>
                              	<?php foreach( $list as $no => $item ): ?>
                                <?php $data	=($data+1); ?>
                                 <li <?php if($data =='1'){ ?>class="active"<?php }else{ echo 'class=""';} ?> style="width:25%;">
                                    <h2><?php echo ($item->text);?></h2>
                                    <a href="javascript:;">
                                    </a>
                                 </li>
								<?php endforeach; ?>
                              </ul>
                           </div>
                        </div>
<?php endif; ?>
