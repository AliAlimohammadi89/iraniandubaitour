<?php
 	$calender = isset($_REQUEST['calender'])?$_REQUEST['calender']:null;
    $counts = isset($_REQUEST['counts'])?$_REQUEST['counts']:null;
    $id = isset($_REQUEST['id'])?$_REQUEST['id']:null;

    $filde='fld_id_tour';
    $value=$id;

    $filde2='fld_datetor';
    $value2=$calender;

 $db = JFactory::getDbo();
$query = $db->getQuery(true);
//$featured = $params->get('featured','0');
//$catid = $params->get('catid','0');
//$catid = is_array($catid)?implode(',',$catid):(int)$catid;
$query->select('*')
    ->select("SUM(fld_id_tour)AS 'count1'")
    ->from("#__tourismtour_tourorder")
    ->where('`published` = 1')
    ->where("`$filde`  = '$value'")
    ->where("`$filde2` = '$value2'")
    ->order('id','DESC');
$db->setQuery($query);
$rows = (array) $db->loadObjectList();
  // echo "<P>".$db->replacePrefix( $query )."</P>";
//////////////////////////////////////////////////////////////
///
$db2 = JFactory::getDbo();
$query2 = $db->getQuery(true);

$query2->select('*')
    ->from("#__tourismtour_tour")
    ->where('`published` = 1')
    ->where("`id`  = '$value'")
    //->where("`$filde2` = '$value2'")
    ->order('id','DESC');
$db2->setQuery($query2);
$rows2 = (array) $db2->loadObjectList();
 //echo "<P>".$db->replacePrefix( $query2 )."</P>";

$p=JHtml::_("date",$calender,"D");
switch ($p) {
    case "شنبه":
        $day=1;
        break;
    case "یکشنبه":
        $day=2;
        break;
    case "دوشنبه":
        $day=3;
        break;
    case "سه شنبه":
        $day=4;
        break;
    case "چهارشنبه":
        $day=5;
        break;
    case "پنج شنبه":
        $day=6;
        break;
    case "جمعه":
        $day=7;
        break;

    default:
        $day= 0;
}
//print $rows[0]->count1;
$mystring = $rows2[0]->fld_weekday;
$findme   =$day;
$pieces = explode(",", $mystring);
$se=0;
if (in_array($findme, $pieces))
    $se=1;
if($se==0){
?>
    <div class="btn btn-danger" >در روز هفته انتخابی تور فعال نمیباشد</div>
<?php
    die;
}
$count_order=$rows[0]->count1;
$hh=$rows2[0]->fld_count_person;
//print " $hh 777 $count_order    $counts";
if( ($rows2[0]->fld_count_person-$count_order) >= $counts){
    $user = JFactory::getUser();

    if(empty($user->name)){

    ?>
    <div class="btn btn-danger" >تور شما در دسترس میباشد برای ادامه با کاربری خود لاگین کنید</div>
<?PHP
         die;
    } ?>
    <div class="control-group">
        <div class="control-label"  style="width: 50%">نام شما </div>
        <div class="controls"  style="width: 50%"> <input readonly="1" type="text" name="user_name" value="<?PHP print $user->name ?>"></div>
    </div>
    <div class="control-group">
        <div class="control-label"  style="width: 50%">ایمیل شما  </div>
        <div class="controls"  style="width: 50%"> <input readonly="1" type="text" name="user_name" value="<?PHP print $user->email ?>"></div>
    </div>
    <div class="btn btn-activated ">
       تور شما در دسترس میباشد برای پرداخت نهایی روی کلید پرداخت بزنید
    </div>
    <br>

    <div class="submit">
    <input type="submit" value="پرداخت" name="pay" class="btn btn-success" style="width: 100%">
    </div>
    </br>
    </br>

    <?php
 }
   else {
       ?>
       <div class="btn btn-danger" >
           <?PHP
           if($rows2[0]->fld_count_person==$count_order)
               print "در تاریخ انتخابی ظرفیت تور پر شده!";
           else
               print "تعداد افراد وارد شده بیش از ظرفیت تور است!";
           ?>
       </div>
       <?PHP
   }
die;

?>