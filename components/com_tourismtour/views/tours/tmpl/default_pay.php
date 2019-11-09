 <?php
 	$phone2 = isset($_REQUEST['phone2'])?$_REQUEST['phone2']:0;
    $dateorder = isset($_REQUEST['dateorder'])?$_REQUEST['dateorder']:null;
    $counts1 = isset($_REQUEST['counts1'])?$_REQUEST['counts1']:null;
global $config,$option;

$id = $this->items[0]->id;
    $filde='fld_id_tour';
    $value=$id;
    $filde2='fld_datetor';
    $value2=$dateorder;

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
$count_order=$rows[0]->count1;
$hh=$rows2[0]->fld_count_person;
$fld_price=$rows2[0]->fld_price;
//print " $hh 777 $count_order    $counts";
if( ($rows2[0]->fld_count_person-$count_order) >= $counts1){
    $user = JFactory::getUser();
     if(empty($user->username)){
         $pp=JRoute::_("index.php?option=$option&view=tours&error=notloginuser&id=" . $id);
          header("Location:". $pp);
         die();
print 0;
//die;
    }
    
    
    $json = file_get_contents('http://www.tgju.org/?act=sanarateservice&client=tgju&noview&type=json');
    $obj = json_decode($json);
    $p0=$obj->sana_buy_aed->price;
    $p0=str_replace(",","",$p0);
   // $h=10;
    //print_r($p0 );
    $fld_price=$fld_price*$p0;
    $Amount=$fld_price/10;
    
        //    print_r( $Amount);    
    
    //die;
    
    
    
    //pay ok
   // $MerchantID = 'f5799106-22a1-11e8-b9d6-000c295eb8fc';  //Required
     $MerchantID = '46a0cb74-be2b-11e8-b381-000c295eb8fc';  //Required
   // $Amount = 100; //Amount will be based on Toman  - Required
    $Description = 'توضیحات تراکنش تستی';  // Required
    $Email = 'UserEmail@Mail.Com'; // Optional
    $Mobile = $phone2; // Optional
    //$CallbackURL = JRoute::_("index.php?option=$option&view=tours&pay=2");  // Required
    $CallbackURL="http://iraniandubaitour.com/tours?pay=2tours?pay=2";
    $CallbackURL="".$CallbackURL;
       // print $CallbackURL;
    //die;

    // URL also can be ir.zarinpal.com or de.zarinpal.com
    $client = new SoapClient('https://www.zarinpal.com/pg/services/WebGate/wsdl', ['encoding' => 'UTF-8']);

    $result = $client->PaymentRequest([
        'MerchantID'     => $MerchantID,
        'Amount'         => $Amount,
        'Description'    => $Description,
        'Email'          => $Email,
        'Mobile'         => $Mobile,
        'CallbackURL'    => $CallbackURL,
    ]);


    $json = file_get_contents('http://www.tgju.org/?act=sanarateservice&client=tgju&noview&type=json');
    $obj = json_decode($json);
        $p1=str_replace(',','',$obj->sana_buy_aed->price);
 //   print_r( $rows2[0]->fld_price);
   // print '<br>';
    $p2=(int)($rows2[0]->fld_price);
    $pr=($p1)*($p2);
   //   print_r( $pr);
  //  die;
    //Redirect to URL You can do it also by creating a form

    print $result->Authority;



    $db = JFactory::getDbo();

// Create a new query object.
    $query = $db->getQuery(true);

// Insert columns.
    $columns = array('fld_id_user',
        'fld_countofpersons',
        'fld_phonenumber2',
        'fld_price_aed',
        'fld_price_irr',
        'fld_payment_number',
        'fld_id_tour',
        'fld_datetor');
    // Insert values.
    //
    $values = array($user->id,
        $counts1,
        $phone2,
        $rows2[0]->fld_price,
        $pr,
        "'". $result->Authority."'",
        $id,
        "'".$dateorder."'"
        );

  //  print ' <pre>';
   //  print_r($values);
     //die;
// Prepare the insert query.
    $query
        ->insert($db->quoteName('#__tourismtour_tourorder'))
        ->columns($db->quoteName($columns))
        ->values(implode(',', $values));

// Set the query using our newly populated query object and execute it.
    $db->setQuery($query);
    $db->execute();
    echo "<P>".$db->replacePrefix( $query )."</P>";
    if ($result->Status == 100) {
         header('Location: https://www.zarinpal.com/pg/StartPay/'.$result->Authority);
    } else {
        echo'ERR: '.$result->Status;
    }
 }
   else {
       $pp=JRoute::_("index.php?option=$option&view=tours&error=notinformation&id=" . $id);
       header("Location:" . $pp);
       // die();
       print "ok";
   }
die;
?>