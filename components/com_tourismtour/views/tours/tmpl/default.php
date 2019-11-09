<?php
/**
 * @version     1.0.0
 * @package     com_mywork
 * @copyright   Copyright (C) 2013. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Alireza Balvardi <a.balvardi@gmail.com> - http://dima.ir
echo "<pre>";
print_r();
echo "</pre>";
die();
 */

// no direct access
defined('_JEXEC') or die;
global $app,$option;
//==========================================
$css = "components/$option/css/user.css";
//JHtml::_("stylesheet",$css);
//$Rand = rand(11111,99999);
//==========================================
$error = JRequest::getVar('error');
if($error=="not_okpayment"){
  ?>

    <div id="product_view">
        <div class="grid-layout3">
        <div class="btn btn-danger">پرداخت موفقیت امیز نبود!
            <br />
            <br />
            لطفا تور خود را دوباره ثبت کنید
        </div>
        </div>
    </div>

<?PHP
}
?>