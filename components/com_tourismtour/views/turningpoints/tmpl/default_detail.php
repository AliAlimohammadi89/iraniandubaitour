<?php
	// no direct access
	defined('_JEXEC') or die;
	global $config,$option,$doc;
	$item = $this->items[0];
	$app = JFactory::getApplication();
	$pathway = $app->getPathway();
	$pathway->addItem ( $item->fld_name);
	$this->document->setTitle($item->fld_name);
	JHtml::_('behavior.modal','.modal');
//==========================================
    $css = "components/$option/css/detailuser.css";
    JHtml::_("stylesheet",$css);
    $css = "components/$option/css/style.css";
     JHtml::_("stylesheet",$css);
JHtml::_('jquery.framework');

	//gmap3.min.js
     $js = "components/$option/js/gmap3.min.js";
JHtml::_("stylesheet",$js);


 //   $doc->addScript("components/$option/js/gmap3.min.js");
 //==========================================
?>
<script type="text/javaScript" src="<?PHP print $js; ?>"></script>



<div class="panel panel-default">
	<div class="panel-heading">
		<div class="row-fluid">
			<div class="span12">
				<div class="h3 panel-title"><?php echo $item->fld_name; ?></div>
			</div>
		</div>
	</div>
	<div class="panel-body">
		<div class="row-fluid">

			<div class="span5">
				<div class="margin5">
					<div><?php echo JText::_("turningpoint_fld_name");?> : <?php echo $item->fld_name;?></div>
 					<div><?php echo JText::_("turningpoint_fld_metadata");?> : <?php echo $item->fld_metadata;?></div>
 				</div>
			</div>
            <div class="span7">
                <div id="map" class="gmap3" style="width: 100% ;height: 300px">
                </div>
            </div>
            <div class="span9">
            <div><?php echo JText::_("turningpoint_fld_info");?> : <?php echo $item->fld_info;?></div>
            </div>
        </div>
	</div>
</div>
<script>
    function myMap() {
        var mapCanvas = document.getElementById("map");
        var myCenter = new google.maps.LatLng( <?php echo $item->fld_location;?>);
        var mapOptions = {center: myCenter, zoom:12,
            mapTypeId:google.maps.MapTypeId.HYBRID};
        var map = new google.maps.Map(mapCanvas,mapOptions);
        var marker = new google.maps.Marker({
            position: myCenter,
            animation: google.maps.Animation.BOUNCE
        });
        marker.setMap(map);
    }
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAfUKNIuS8-VG18JgL3Z25h2k3IJqGBS4g&callback=myMap"></script>

