<?php
	// no direct access
	defined('_JEXEC') or die;
	global $config,$option;
	$item = $this->items[0];
	$app = JFactory::getApplication();
	$pathway = $app->getPathway();
	$pathway->addItem ( $item->fld_title);
	$this->document->setTitle($item->fld_title);
JHtml::_('behavior.modal','.modal');

//==========================================
    $css = "components/$option/css/detailuser.css";
     JHtml::_("stylesheet",$css);
    $css = "components/$option/css/kamadatepicker.min.css";
          JHtml::_("stylesheet",$css);
     $js = "components/$option/js/kamadatepicker.min.js";
      //   JHtml::_("stylesheet",$js);

    $document = JFactory::getDocument();
    $document->addScript($js);
    print "</pre>";
    print_r($this);
    die;

 //==========================================
?>
<div class="panel panel-default">
	<div class="panel-heading">
		<div class="row-fluid">
			<div class="span12">
				<div class="h3 panel-title"><?php echo $item->fld_title; ?></div>
			</div>
		</div>
	</div>
	<div class="panel-body">
		<div class="row-fluid">
						<div class="span6 margin5">
                            <a  href="<?php echo JURI::root().$item->fld_pic;?>" class="modal22" rel="{handler: 'image'}"><img     src="<?php echo strlen($item->fld_pic)?JURI::root().$item->fld_pic:JURI::root()."components/$option/images/icon/nopic.png";?>" /></a>
                        </div>
            <div class="span5 margin5">
                <div id="map" class="gmap3" style="width: 100% ;height: 400px"></div>
            </div>
			<div class="span6">
				<div class="margin5">
					<div><?php echo JText::_("tour_fld_title");?> : <?php echo $item->fld_title;?></div>
					<div><?php echo JText::_("tour_fld_price");?> : <?php echo $item->fld_price;?></div>
 					<div><?php echo JText::_("tour_fld_start_time");?> : <?php echo $item->fld_start_time;?></div>
					<div><?php echo JText::_("tour_fld_start_address");?> : <?php echo $item->fld_start_address;?></div>
  					<div><?php echo JText::_("tour_fld_points");?> : <?php echo $item->fld_points;?></div>
					<div><?php echo JText::_("tour_fld_tourfeature");?> : <?php echo $item->fld_tourfeature;?></div>
				</div>
			</div>
            <div class="span6">
                <form action="#" name="aa" >
                <select id="jform_params_editor" name="jform[params][editor]" >
                    <option value="" selected="selected">تعداد افراد </option>
                    <?PHP for($i=1 ; $i<30 ;$i++):?>
                    <option value="<?PHP print $i; ?>"><?PHP print $i ?></option>
                    <?PHP endfor; ?>
                </select>
                    <input type="text" id="test-date-id"  >
                 <input type="submit" value="ok" name="ok" class="btn btn-success">
                </form>
        </div>

            <div class="span12">
                <div><?php echo JText::_("tour_fld_info");?> : <?php echo $item->fld_info;?></div>
                </div>
	</div>
</div>
     <script>

         jQuery( document ).ready(function() {
              kamaDatepicker('test-date-id');
         });

          function myMap() {
        var mapCanvas = document.getElementById("map");
        var myCenter = new google.maps.LatLng( <?php echo $item->fld_locationstart;?>);
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
<!--    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAfUKNIuS8-VG18JgL3Z25h2k3IJqGBS4g&callback=myMap"></script>-->