 <?php
// print_r($_REQUEST);

 $status = isset($_REQUEST['Status'])?$_REQUEST['Status']:null;
 $Authority = isset($_REQUEST['Authority'])?$_REQUEST['Authority']:null;
 global $config,$option;

 if($status=="OK"){
     $db = JFactory::getDbo();
     $query = $db->getQuery(true);
// Fields to update.
     $fields = array(
         $db->quoteName('fld_payment_status') . ' = 1'
     );
// ثی for which records should be updated.
     $conditions = array(
         $db->quoteName('fld_payment_number') . ' = ' . $db->quote($Authority)
     );
     $query->update($db->quoteName('#__tourismtour_tourorder'))->set($fields)->where($conditions);
     $db->setQuery($query);
     $result = $db->execute();
   //  print_r($result);
     //die;

     $user = JFactory::getUser();
     $customFields = FieldsHelper::getFields('com_users.user', JFactory::getUser(), true);
// In my case there where only one additional field, so a took the 0-indexed value, you shall see in which index is the field you are searching for
     var_dump($customFields[1]->value);

     //die;
     $aa=(int)$Authority;
     $p="$user->name;
 عزیز تور شما با موفقیت ثبت شد 
 شماره ترکنش:
  $aa
";


      sendsms($customFields[1]->value,$p);
      sendsms('09383650130','یک تور ثبت شد');

     // die;
    $orderid=select($Authority);
     $pp=  JRoute::_("index.php?option=$option&view=tourorders&id=" . $orderid->id) ;
    // print $pp;
      header("Location:". $pp);
       die();
 }

 $pp=JRoute::_("index.php?option=$option&view=tours&id=" . $id."&error=not_okpayment");
   header("Location:". $pp);
       die();


 function sendsms ($toMobileNum, $message, $where = '1', $wherev = '1')
 {
     //die;
//			$data=this->select('nl26a_coffee_configuration',$select,1,'1');
//			$Version_Server=$data[0][$select];

     $db = JFactory::getDbo();
     $query = $db->getQuery(true);
//$featured = $params->get('featured','0');
//$catid = $params->get('catid','0');
//$catid = is_array($catid)?implode(',',$catid):(int)$catid;
     $query->select('*')
         ->from("#__tourismtour_sms")
         // ->where("`$filde`  = '$value'")
         ->order('id','DESC');
     $db->setQuery($query);
     $rows = (array) $db->loadObjectList();
     // echo "<P>".$db->replacePrefix( $query )."</P>";
     // print_r($rows);
     $sms=$rows[0];
     $toMobileNum = str_replace("+", "", $toMobileNum);
     if (substr($toMobileNum, 0, 4) == "0098")
         $toMobileNum = substr($toMobileNum, 4);
     if (substr($toMobileNum, 0, 2) == "98")
         $toMobileNum = substr($toMobileNum, 2);
     //include_once(TPATH_ROOT . DS . 'sms' . DS . $sms['fldname'] . ".php");
     include_once ("components/com_tourismtour/sms/".$sms->fldname . ".php");
     // die;
     $panel  = new $sms->fldname;
     $status = $panel->LoadSmsPanelDorCab('send', $sms->fldcode2, $sms->fldcode3, $sms->fldcode4, $sms->fldcode5, $toMobileNum, $message);
     //var_dump($status);
     if (!is_numeric($status))
         $status = 0;
     //  print $status.$message;
     return $status;
 }
 function select ($Authority)
 {
     $db = JFactory::getDbo();
     $query = $db->getQuery(true);
     $query->select('id')
         ->from("#__tourismtour_tourorder")
         ->where("`fld_payment_number`  = '$Authority'")
         ->order('id','DESC');
     $db->setQuery($query);
     $rows = (array) $db->loadObjectList();
     // echo "<P>".$db->replacePrefix( $query )."</P>";
     // print_r($rows);
     $sms=$rows[0];
     return $sms;
 }
?>