<?php
// no direct access
defined('_JEXEC') or die;
global $config,$option;
$item = $this->items[0];
$app = JFactory::getApplication();
$pathway = $app->getPathway();
$pathway->addItem ( $item->fld_id_user);
$this->document->setTitle($item->fld_id_user);
JHtml::_('behavior.modal','.modal');
//==========================================
$css = "components/$option/css/detailuser.css";
JHtml::_("stylesheet",$css);
//==========================================
$body = "Here is the body of your message.";
$user = JFactory::getUser();
$from_email=$reply_to_name=$from_name= $to_email=$email_body=$sendas=$cc_emails=$bcc_emails=$email_attachments=$reply_to_email= "info@iraniandubaitour.com.com";
$from = array("info@iraniandubaitour.com.com", "ثبت سفارش");
$subject="title";
$mail = JFactory::getMailer();
$email_sent = $mail->sendMail(
    '',
    $from_name,
    $to_email,
    $subject,
    $email_body,
    $sendas,
    $cc_emails,
    $bcc_emails,
    $email_attachments,
    $reply_to_email,
    $reply_to_name );
if($email_sent) {
    echo "Mail sent.";
} else {
    echo "Mail NOT sent.";
}
$user = JFactory::getUser();
$customFields = FieldsHelper::getFields('com_users.user', JFactory::getUser(), true);
// In my case there where only one additional field, so a took the 0-indexed value, you shall see in which index is the field you are searching for
$phone=$customFields[1]->value;
?>
<div class="panel panel-default">
    <div class="panel-heading">
        <div class="row-fluid">
            <div class="span12">
                <div class="h3 panel-title"><?php echo $item->fld_id_user; ?></div>
            </div>
        </div>
    </div>
    <div class="panel-body">
        <div class="row-fluid">
        <div class="printing" id="printing">
            <table width="200" border="1" style=" direction:ltr ;background-color: #e4e4e4;background-repeat:no-repeat;">
                <tr>
                    <td><table width="800" height="479" border="0" >
                            <tr>
                                <td height="82" colspan="10" align="center"><table width="39%" border="0">
                                        <tr>
                                            <th width="25%" rowspan="2">CK</th>
                                            <td width="75%"> Golden Rain</td>
                                        </tr>
                                        <tr>
                                            <td>Tourism L.L.C.</td>
                                        </tr>
                                    </table></td>
                            </tr>
                            <tr>
                                <td height="49" colspan="10" align="center"><table width="90%" border="0">
                                        <tr>
                                            <td width="4%">Tel</td>
                                            <hr align="center" />
                                            <td width="15%">09383650130<hr ></td>
                                            <td width="5%">Fax</td>
                                            <td width="15%">09383650130<hr ></td>
                                            <td width="9%">P.O.Box</td>
                                            <td width="11%">12344567<hr ></td>
                                            <td width="8%">Email</td>
                                            <td width="33%">info@iraniandubaitour.com<hr ></td>
                                        </tr>
                                    </table></td>
                            </tr>
                            <tr>
                                <td height="77" colspan="3"><table width="100%" border="0">
                                        <tr>
                                            <td width="26%">Dhs</td>
                                            <td width="32%">درهم</td>
                                            <td width="20%" align="right">Fils</td>
                                            <td width="22%" align="right">فلس</td>
                                        </tr>
                                        <tr>
                                            <td colspan="4"><table width="100%" border="1">
                                                    <tr>
                                                        <td width="68%">330</td>
                                                        <td width="32%" align="center">DHS</td>
                                                    </tr>
                                                </table></td>
                                        </tr>
                                    </table></td>
                                <td colspan="4"><table width="100%" border="0">
                                        <tr>
                                            <td align="center">سند قبض</td>
                                        </tr>
                                        <tr>
                                            <td align="center">RECEIPT VOUCHER</td>
                                        </tr>
                                    </table></td>
                                <td colspan="3"><table width="100%" border="0">
                                        <tr>
                                            <td width="20%"><p>No</p>
                                                <p>&nbsp;</p></td>
                                            <td colspan="2" align="center"><p><?PHP print $item->id ?></p>
                                                <p><br />
                                                </p></td>
                                        </tr>
                                        <tr>
                                            <td>Date</td>
                                            <td width="54%" align="center"><?PHP print $item->fld_price_date  ?></td>
                                            <td width="26%">التاریخ</td>
                                        </tr>
                                    </table></td>
                            </tr>
                            <tr>
                                <td height="37" colspan="2">Received from Mr/Ms</td>
                                <td colspan="6"><?PHP print $user->name ?> <bh   />
                                    <hr /></td>
                                <td colspan="2" align="right">استلمنا من السید/الساده</td>
                            </tr>
                            <tr>
                                <td height="37" colspan="2">The sum of Dhs.</td>
                                <td colspan="6"><?PHP print $item->fld_price_aed ." AED , ".$item->fld_price_irr ."  IRR " ?>
                                    <hr /></td>
                                <td colspan="2" align="right">مبلغ و قدره درهم</td>
                            </tr>
                            <tr>
                                <td colspan="2">Cash/Cheque No</td>
                                <td width="163"><?PHP print $item->fld_price_irr; ?>
                                    <hr /></td>
                                <td width="110">نقدا/شیک رقم</td>
                                <td width="85">Bank</td>
                                <td width="126">pass
                                    <hr /></td>
                                <td width="82" align="right">البنک</td>
                                <td width="139">Date</td>
                                <td width="53"><?php  print $item->fld_datetor;  ?>
                                    <hr /></td>
                                <td width="115" align="right">التاریخ</td>
                            </tr>
                            <tr>
                                <td width="172">Being</td>
                                <td colspan="8">pass
                                    <hr /></td>
                                <td align="right">وذالک عن</td>
                            </tr>
                            <tr>
                                <td colspan="10" align="right">کنسلی 24 ساعت قبل اجرای تور شامل  %50 و در روز تور شمال %100 جریمه خواهد شد</td>
                            </tr>
                            <tr>
                                <td>Receivers Sig</td>
                                <td colspan="2"><?PHP $user->name; ?>
                                    <hr /></td>
                                <td align="right">توقیع المستلم</td>
                                <td colspan="2">&nbsp;</td>
                                <td>Signature</td>
                                <td colspan="2">
                                    <hr /></td>
                                <td align="right">التو قیع</td>
                            </tr>
                        </table></td>
                </tr>
            </table>        </div>

               <input class="btn btn-success" type="button" onclick="printDiv('printing')" value="چاپ فاکتور" />
    </div>
</div>
<script>
    function printDiv(divName) {
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;

        window.print();

        document.body.innerHTML = originalContents;
    }
</script>