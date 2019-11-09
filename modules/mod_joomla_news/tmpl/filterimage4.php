<?php
// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );
//$document->addStyleSheet('modules/mod_joomla_news/assets/demo2.css');
$document->addStyleSheet('modules/mod_joomla_news/assets/elastic_grid.css');
$document->addScript('modules/mod_joomla_news/assets/modernizr.custom.js');
$document->addScript('modules/mod_joomla_news/assets/jquery.hoverdir.js');
$document->addScript('modules/mod_joomla_news/assets/classie.js');
$document->addScript('modules/mod_joomla_news/assets/elastic_grid.js');
?>
<div id="elastic_grid_demo"></div>
<script type="text/javascript">
    jQuery(function(){
        jQuery("#elastic_grid_demo").elastic_grid({
            'showAllText' : 'All',
            'filterEffect': 'popup', // moveup, scaleup, fallperspective, fly, flip, helix , popup
            'hoverDirection': true,
            'hoverDelay': 0,
            'hoverInverse': false,
            'expandingSpeed': 500,
            'expandingHeight': 500,
            'items' :
            [
			<?php foreach ($list as $item) : ?>
                    <?php
					//An example piece of text that
					//contains (invisible) newline characters.
					$text = strip_tags(mb_substr($item->desc,0,$maxcontent,'UTF-8'));
					
					//Before
					//echo nl2br($text);
					
					//Replace the newline and carriage return characters
					//using str_replace.
					$text = str_replace(array("\n", "\r"), '', $text);
					
					//After
					//echo nl2br($text);					
                    ?>
                {
                    'title'         : '<?php echo ($item->text); ?>',
                    'description'   : '<?php echo nl2br($text); ?>',
                    'thumbnail'     : ['<?php echo  $item->thumb; ?>', '<?php echo  $item->thumb; ?>', '<?php echo  $item->thumb; ?>', '<?php echo  $item->thumb; ?>', '<?php echo  $item->thumb; ?>'],
                    'large'         : ['<?php echo $item->photo; ?>', '<?php echo $item->photo; ?>', '<?php echo $item->photo; ?>', '<?php echo $item->photo; ?>', '<?php echo $item->photo; ?>'],
                    'button_list'   :
                    [
                        { 'title':'Read More', 'url' : '<?php echo ($item->link); ?>', 'new_window' : true }
                    ],
                    'tags'          : ['<?php echo ($item->category); ?>']
                },
			<?php endforeach; ?>
            ]
        });
    });
</script>
