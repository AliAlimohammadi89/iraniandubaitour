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
    $css = "components/$option/calender/datepicker.css";
          JHtml::_("stylesheet",$css);
     $js = "components/$option/calender/datepicker.js";
        JHtml::_("stylesheet",$js);

    $document = JFactory::getDocument();
    $document->addScript($js);



    $db = JFactory::getDbo();
    $query = $db->getQuery(true);
    $query->select('id,fld_location,fld_name')
        ->from("#__tourismtour_turningpoint")
        ->where('`published` = 1')
        ->where("`id` in  ($item->fld_points)")
        ->order('id','DESC');
     $db->setQuery($query);
    $rows1 = (array) $db->loadObjectList();



    $db = JFactory::getDbo();
    $query = $db->getQuery(true);
    $query->select('id,fld_title')
        ->from("#__tourismtour_tourfeature")
        ->where('`published` = 1')
        ->where("`id` in  ($item->fld_tourfeature)")
        ->order('id','DESC');
     $db->setQuery($query);
    $rows2 = (array) $db->loadObjectList();

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
            <div class="span5 margin5">
                <a  href="<?php echo JURI::root().$item->fld_pic;?>" class="modal22" rel="{handler: 'image'}"><img     src="<?php echo strlen($item->fld_pic)?JURI::root().$item->fld_pic:JURI::root()."components/$option/images/icon/nopic.png";?>" /></a>
            </div>
            <div class="span7 margin5">
                <div id="map" class="gmap3" style="width: 100% ;height: 400px"></div>
            </div>
            <div class="span6">
                <div class="margin5">
                    <div><?php echo JText::_("tour_fld_title");?> : <?php echo $item->fld_title;?></div>
                    <div><?php echo JText::_("tour_fld_price_total");?> : <?php echo $item->fld_price_total;?></div>
                    <div><?php echo JText::_("tour_fld_price");?> : <?php echo $item->fld_price;?></div>
                    <div><?php echo JText::_("tour_fld_start_time");?> : <?php echo $item->fld_start_time;?></div>
                    <div><?php echo JText::_("tour_fld_start_address");?> : <?php echo $item->fld_start_address;?></div>
                    <div><?php echo JText::_("tour_fld_points");?> :
                        <?PHP foreach ($rows1 as $rows) :?>
                           <span>
                              <a class="btn btn-success " style="margin: 1%" href='<?php echo JRoute::_("index.php?option=$option&view=turningpoints&id=" . $rows->id); ?>'><?PHP print $rows->fld_name?></a>
                        </span>
                             <?PHP endforeach; ?>

                    </div>



                    <div><?php echo JText::_("tour_fld_tourfeature");?> :
                        <?PHP foreach ($rows2 as $rows) :?>
                           <span>
                              <a class="btn btn-success " style="margin: 1%" href='<?php echo JRoute::_("index.php?option=$option&view=tourfeatures&id=" . $rows->id); ?>'><?PHP print $rows->fld_title?></a>
                        </span>
                             <?PHP endforeach; ?>

                    </div>



                    <!--<div><?php // echo JText::_("tour_fld_tourfeature");?> : <?php // echo $item->fld_tourfeature;?></div>-->
                </div>
            </div>
            <div class="span6">
                <form action="<?php echo JRoute::_("index.php?option=$option&view=tours"); ?>" name="aa" method="get"  >
                    <div class="span6">
                        <div class="control-group">
                            <div class="control-label " style="width: 40%">تعداد افراد</div>
                            <div class="controls"  style="width: 60%">
                    <select  class="selected" name="counts1" id="counts"  onchange="check2(1)" >
                         <?PHP for($i=1 ; $i<30 ;$i++):?>
                            <option value="<?PHP print $i; ?>"><?PHP print $i ?></option>
                        <?PHP endfor; ?>
                    </select>
                        </div>
                        </div>
                        <div class="control-group">
                            <div class="control-label"  style="width: 40%">شماره تماس</div>
                            <div class="controls"  style="width: 60%"> <input type="text" name="phone2" required="1"></div>
                        </div>
                        <div id="ajax">
                            <div id="ajaxloading" style="display:none">
                                <img src="<?php echo JURI::root()."images/ajax.gif";?>">
                            </div>
                        </div>
                    </div>
                    <div class="span6">
                    <div class="calender"></div>
                    <div class="gap"></div>
                    <input type="text"  id="calenderSelector" readonly="1" >
                     <input type="text" name="dateorder" id="calenderSecondarySelector" readonly="1">
                    </div>
                    <a class="btn btn-success"   id="ok"  onclick="check1(1)">جستوجوی تور</a>
                    <div>
                        <p>

<input type="checkbox" id="ghavanin" name="ghavanin" onclick="ghavanin(1)"   />
        <label for="horns">با
        <a style="color: blue" href="http://iraniandubaitour.com/fa/about/13-3">قوانین ومقررات </a>
        موافقم

        </label>


        </p>
                    </div>





                </form>
            </div>

            <div class="span12">
                <div><?php echo JText::_("tour_fld_info");?> : <?php echo $item->fld_info;?></div>
            </div>
        </div>
    </div>


    <script type="text/javascript">


        jQuery(document).ready(function () {
             document.getElementById("ok").disabled = true;
            var locations = [
                <?PHP foreach ($rows1 as $rows) :?>
                ["<a href='<?php echo JRoute::_("index.php?option=$option&view=turningpoints&id=" . $rows->id); ?>'><?PHP print $rows->fld_name?></a>",<?PHP print $rows->fld_location?>],
                <?PHP endforeach; ?>
                ['نقطه شروع', <?PHP print $item->fld_locationstart; ?>]
            ];


            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 13,
                center: new google.maps.LatLng(<?PHP print $item->fld_locationstart; ?>),
                //mapTypeId: google.maps.MapTypeId.HYBRID
                mapTypeId: google.maps.MapTypeId.SATELLITE

            });

            var infowindow = new google.maps.InfoWindow();

            var marker, i;

            for (i = 0; i < locations.length; i++) {
                marker = new google.maps.Marker({
                    animation: google.maps.Animation.BOUNCE,
                    position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                map: map
                });

                google.maps.event.addListener(marker, 'click', (function(marker, i) {
                    return function() {
                        infowindow.setContent(locations[i][0]);
                        infowindow.open(map, marker);
                    }
                })(marker, i));
            }
        });

    </script>

         <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA5_wspfJxccSsTUzxpmkiPAu-6zbQBlgY&callback=myMap"></script>


   <script>

    jQuery(document).ready(function(){
        jQuery(".calender").click(function(){
            jQuery("#ajax").html("");
        });
        var d = new Date();
        var strDate = d.getFullYear() + "-" + (d.getMonth()+1) + "-" + d.getDate();
        jQuery(".calender").datepicker({
            altField : "#calenderSelector",
            altSecondaryField : "#calenderSecondarySelector",
            format : "long",
            date   : strDate,
        });
    });
    function check2(reg) {
        jQuery("#ajax").html("");


    }




     function check1(reg)
    {



          var checkBox = document.getElementById("ghavanin");

    if (checkBox.checked == true){







        calender=jQuery("#calenderSecondarySelector").val();
         counts=jQuery("#counts").val();
          //alert(reg);

        var ajax_image = "<img src='<?php echo JURI::root()."images/ajax.gif";?>' alt='Loading...' />";
        jQuery('#ajax').html(ajax_image);

        var request = jQuery.ajax({

            type: "POST",
            url: '<?php echo JRoute::_("index.php?option=$option&view=tours&ajax=" . $item->id); ?>',
             data: {'calender':calender,
                'counts':counts,
                'id':<?PHP print $item->id; ?>
            },
            success: function (data)
            {
                jQuery("#ajax").html(data);
                jQuery("#ajax").val(data);
             }
        });


          } else {
            alert("لطفا با قوانین و مقررات سایت موافقت کنید");
    }
    }

</script>


