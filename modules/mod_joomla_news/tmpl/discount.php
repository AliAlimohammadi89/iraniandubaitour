<?php
// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );
$config = JComponentHelper::getParams('com_dima_theme_shop');
$document = JFactory::getDocument();
?>
<?php if (!empty($list)) :?>
   <script src="media/com_dima_theme_shop/js/jquery.countdown.js"></script>
   <script type="text/javascript">
        window.alert = function(){};
        var defaultCSS = document.getElementById('bootstrap-css');
        function changeCSS(css){
            if(css) jQuery('head > link').filter(':first').replaceWith('<link rel="stylesheet" href="'+ css +'" type="text/css" />'); 
            else jQuery('head > link').filter(':first').replaceWith(defaultCSS); 
        }
    </script>
<div class="container-fluid">
    <div id="custom_carousel2" class="carousel2 slide" data-ride="carousel2" data-interval="3500">
        <!-- Wrapper for slides -->
        <div class="carousel2-inner">
        	<?php $n=''; ?>
        	<?php foreach ($list as $item) : ?>
			<?php
            $config = JComponentHelper::getParams('com_dima_theme_shop');
            if($item->discount > '0' and date("Y-m-d") < $item->discount_date):
                $percent = $item->discount; // without %
            else:
                $percent = $config->get('discount'); // without %
            endif;
            ?>            
            <?php if($item->discount > '0' and date("Y-m-d") < $item->discount_date): ?>
            <?php $n=$n+1; ?>
            <div class="item <?php if($n=='1'):?>active<?php endif; ?>">
                <div class="container-fluid">
                    <div class="rows">
                    	<div class="span3">
                        	<div class="img">
							<?php if($item->discount > '0' and date("Y-m-d") < $item->discount_date): ?>
                            <div class="disc1">
                                <div>
                               <h2><?php echo $item->discount; ?>%</h2>
                               <h3>تخفیف</h3>
                               <small> تا تاریخ <?php echo JHTML::_('date',$item->discount_date,'d/m/y'); ?></small>
                               </div>
                            </div>
                            <?php endif; ?>
							<?php
                                if (!empty($item->photo)) :
                                    $photoArr = (array) explode(',', $item->photo);
                                    foreach ($photoArr as $singleFile) : 
                                        if (!is_array($singleFile)) :
                                            $uploadPath = 'images/template/'  . $singleFile;
                                            $thb_photo='images/template/resize/thb1_'.$item->id.'_'  . $singleFile;
                                            if (file_exists($thb_photo)) {
                                            }else{
                                            list($current_width, $current_height) = getimagesize($uploadPath);
                                            $image = new ResizeTemplate();
                                            $image->load($uploadPath);
                                            $image->fit_to_width($width);
                                            $image->save($thb_photo);
                                            }
                                            break;
                                        endif;
                                    endforeach;
                                else:
                                        $thb_photo='images/template/resize/thb1_'.$item->id.'_'. $item->photo;
                                        if (file_exists($thb_photo)) {
                                        }else{
                                        list($current_width, $current_height) = getimagesize('images/template/'.$item->photo);
                                        $image = new ResizeTemplate();
                                        $image->load('images/template/'.$item->photo);
                                        $image->fit_to_width($width);
                                        $image->save($thb_photo);
                                        }
                                endif; ?>
                            <a href="<?php echo $item->link; ?>" title="<?php echo englishdigit($item->text); ?>" class="expand"><i class="icon-basket"></i></a>
                            <?php if($item->photo > '0' ){ ?>
                            <?php $uploadPath = $thb_photo; ?>
                            <img src="<?php echo JRoute::_(JUri::base() . $uploadPath, false); ?>" alt="<?php echo englishdigit($item->text); ?>" title="<?php echo englishdigit($item->text); ?>" />
                            <?php }else{ ?>
                            <?php $uploadPath = 'media/com_dima_theme_shop/images/nophoto.png'; ?>
                            <img src="<?php echo JRoute::_(JUri::base() . $uploadPath, false); ?>" alt="<?php echo englishdigit($item->text); ?>" title="<?php echo englishdigit($item->text); ?>" />
                            <?php } ?>
                            </div>
                        </div>
                        <div class="span9">
                            <div class="itemtitle"><a href="<?php echo $item->link; ?>" title="<?php echo englishdigit($item->text); ?>"><h2><?php echo englishdigit($item->text); ?></h2></a></div>
                            <div class="desc"><?php echo englishdigit(strip_tags (mb_substr($item->desc,0,$maxcontent,'UTF-8'))); ?>...</div>
                            <?php if($item->mainprice >'0'): ?>
                            <div class="prc">
                            <?php if($item->discount > '0' and date("Y-m-d") < $item->discount_date): ?>
                            <div class="price2"><?php echo englishdigit(number_format($item->mainprice)); ?> <?php echo $currency; ?></div>
                            <?php endif; ?>
                            <div class="price"><?php echo englishdigit(number_format($item->price)); ?> <?php echo $currency; ?></div>
                            <?php else: ?>
                            <div class="price" style="color:red;">رایگان</div>
                            <?php endif; ?>
                            </div>
                            <ul class="cmstag">
                                <?php
                                $cms = explode(",",$item->cms);
                                $n = count($cms);
                                $i=1;
                                foreach($cms as $v){
                                ?>
                                <li class="<?php echo $v; ?>">
                                <a href="<?php echo JRoute::_('index.php?option=com_dima_theme_shop&view=themelist&cms='.$v); ?>" class="cms" title="<?php echo JText::_('COM_DIMA_THEME_SHOP_THEMELIST_CMS_OPTION_' . strtoupper($v)); ?>">
                                    <?php echo JText::_('COM_DIMA_THEME_SHOP_THEMELIST_CMS_OPTION_' . strtoupper($v)); ?>
                                </a>
                                </li>
                                <?php 
                                if($i<$n)
                                    echo " ";
                                    $i++;
                                } ?>
                            </ul>
							<?php if($item->discount > '0' and date("Y-m-d") < $item->discount_date): ?>
                            <div class="discounts">
                        <div id="counter<?php echo $item->id; ?>" class="cf">
                            <span>0<em>days</em></span> 
                            <span>0<em>hours</em></span>
                            <span>0<em>minutes</em></span>
                            <span>0<em>seconds</em></span> 
                        </div>                
                       <script type="text/javascript">
                        jQuery(document).ready(function($) {
                            var finalDate = '<?php echo $item->discount_date; ?>';
                        
                            jQuery('div#counter<?php echo $item->id; ?>').countdown(finalDate)
                            .on('update.countdown', function(event) {
                        
                                jQuery(this).html(event.strftime('<span>%D <em>روز</em></span>' + 
                                                                     '<span>%H <em>ساعت</em></span>' + 
                                                                     '<span>%M <em>دقیقه</em></span>' +
                                                                     '<span>%S <em>ثانیه</em></span>'));
                        
                           });  
                        /*----------------------------------------------------*/
                        /*	Make sure that #intro height is
                        /* equal to the browser height.
                        ------------------------------------------------------ */
                        });   
                       </script>                
                        </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>            
            </div> 
            <?php endif; ?>
            <?php endforeach; ?>
        <!-- End Item -->
        </div>
        <!-- End Carousel Inner -->
        <div class="controls">
            <ul class="nav">
            	<?php $n='-1'; ?>
            	<?php foreach ($list as $item) : ?>
                <?php if($item->discount > '0' and date("Y-m-d") < $item->discount_date): ?>
                <?php $n=$n+1; ?>
                <li data-target="#custom_carousel2" data-slide-to="<?php echo $n; ?>" <?php if($n=='0'):?>class="active"<?php endif; ?>>
                <a href="#" title="<?php echo englishdigit($item->text); ?>"><?php echo englishdigit($item->text); ?></a>
                </li>
                <?php endif; ?>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
    <!-- End Carousel -->
</div>
	<script type="text/javascript">
	jQuery(document).ready(function(ev){
    jQuery('#custom_carousel2').on('slide.bs.carousel2', function (evt) {
      jQuery('#custom_carousel2 .controls li.active').removeClass('active');
      jQuery('#custom_carousel2 .controls li:eq('+jQuery(evt.relatedTarget).index()+')').addClass('active');
    })
});
	</script>


<?php endif; ?>
