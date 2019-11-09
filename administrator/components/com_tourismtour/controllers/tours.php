<?php
// No direct access.
defined('_JEXEC') or die;
/**
* tourismtour list controller class.
*/
class tourismtourControllertours extends JControllerAdmin{
	protected $text_prefix = 'tour';
	/**
	* Constructor.
	*
	* @param	array An optional associative array of configuration settings.
	* @see		JController
	* @since	1.6
	*/
	public function __construct($config = array())
	{
	parent::__construct($config);
	}
	/**
	* Proxy for getModel.
	* @since	1.6
	*/
	public function getModel($name = 'tour', $prefix = 'tourismtourModel', $config = array('ignore_request' => true))
	{
	$model = parent::getModel($name, $prefix, $config);
	return $model;
	}
	/**
	 * Method to save the submitted ordering values for records via AJAX.
	 *
	 * @return  void
	 *
	 * @since   3.0
	 */





	public function saveOrderAjax()
	{
		// Get the input
		$pks = $this->input->post->get('cid', array(), 'array');
		$order = $this->input->post->get('order', array(), 'array');
		// Sanitize the input
		JArrayHelper::toInteger($pks);
		JArrayHelper::toInteger($order);
		// Get the model
		$model = $this->getModel();
		// Save the ordering
		$return = $model->saveorder($pks, $order);
		if ($return)
		{
			echo "1";
		}
		// Close the application
		JFactory::getApplication()->close();
	}
	///////////////////////////////////////////////////////////
    public function ali (){
        $id=$_REQUEST['id'];
        $date=$_REQUEST['date'];
        $totalprice=$_REQUEST['totalprice'];
        $db = JFactory::getDbo();
        $query = $db->getQuery(true);
        $query
            ->select(array('tourorder.*','touristor.id AS touristorID ' ))
            -> from ($db->quoteName('#__tourismtour_tourorder', 'tourorder'))
            ->join('INNER', $db->quoteName('#__tourismtour_tour', 'touristor') . ' ON (' . $db->quoteName('touristor.id') . ' = ' . $db->quoteName('tourorder.fld_id_tour') . ')')
            ->where($db->quoteName('tourorder.fld_id_user') . " LIKE  $id ")
            ->order($db->quoteName('tourorder.id') . ' DESC');
        // Reset the query using our newly populated query object.
        $db->setQuery($query);
        // Load the results as a list of stdClass objects (see later for more options on retrieving data).
        $results = $db->loadObjectList();
          print_r( $results);
          die;

        ?>
        <div id="ali123">
            <a  onclick="myclick()" class="btn btn-larg button-print btn-success">
                <span class="icon-print icon-white" aria-hidden="true"></span>
                چاپ</a>
            <div id="j-main-container123" class="span6 mycontainer" id="subfactor">
                <?php
                // Search tools bar
                ?>
                <div class="clearfix"> </div>
                <table class="table table-striped" id="articleList" style="border: 5px;float: right; direction: rtl ">
                    <thead>
                    <tr>
                        <th>نام غذا </th>
                        <th class="center"> قیمت </th>
                        <th class="center"> تعداد </th>
                        <th class="center"> قیمت کل  </th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <td colspan="10">
                        </td>
                    </tr>
                    </tfoot>
                    <tbody>
                    <?php $fldprice=0;$fldcount=0;$fldcountall=0;   foreach ($results as $i => $item) :
                        $fldprice += $item->fldprice;
                        $fldcount += $item->fldcount;
                        $fldcountall += $item->fldcount * $item->fldprice;

                        ?>
                        <tr class="row<?php echo $i % 2; ?>">
                            <td>            <?php echo $item->fldname;?></td>
                            <td class="center"><?php echo number_format($item->fldprice);?></td>
                            <td class="center"><?php echo $item->fldcount;?></td>
                            <td class="center"><?php echo  number_format ($item->fldcount * $item->fldprice ) ; ?></td>
                        </tr>
                    <?php endforeach; ?>
                    <tr class="row1"  style="color: red">
                        <td>
                            جمع کل
                        </td>
                        <td class="center">

                        </td>
                        <td class="center" >
                            <?PHP print $fldcount;  ?>
                        </td>
                        <td class="center">
                            <?php print number_format($fldcountall);  ?>
                        </td>
                    </tr>

                    </tbody>

                </table>
                <?PHP $p=$date ;$i=number_format($totalprice);  ?>
                <?php //echo $p?JHtml::_("date",$p,"Y/m/d h:m:s"):"";
                $s=$p . "</br>";
                $s.= "مبلغ پرداختی  :   $i " ;
                $s.= "</br>";
                // $s.=$date; $s.= "</br>";
                $s .= "شماره فاکتور :   $id " ;
                print  $s;
                ?>
            </div>
        </div>

        <SCRIPT type="text/javascript">
            function myclick(){
                var mywindow = window.open('', 'PRINT', 'height=400,width=400');
                mywindow.document.write('<html><head><title>' + document.title  + '</title>');
                mywindow.document.write('</head><body >');
                mywindow.document.write('<h1>' + <?PHP print $id ?>  + '</h1>');
                mywindow.document.write(document.getElementById('j-main-container123').innerHTML);
                mywindow.document.write('</body></html>');
                mywindow.document.close(); // necessary for IE >= 10
                mywindow.focus(); // necessary for IE >= 10*/
                mywindow.print();
                mywindow.close();
            }
            //  return true;
        </SCRIPT>

        <?php
        die;
    }

    /// //////////////////////////////////////////////////////


}
?>