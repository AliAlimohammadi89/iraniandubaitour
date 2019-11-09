<?php
/**
 * @copyright	Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */
defined("_JEXEC") or die;
/**
 * tourismtour component helper.
 *
 * @package		JoomlAdministrator
 * @subpackage	com_tourismtour
 */
class tourismtourHelper
{
    /**
     * Configure the Linkbar.
     *
     * @param	string	The name of the active view.
     *
     * @return	void
     */
    public static function addSubmenu($submenu)
    {
        global $app,$option,$compconfig;
        $option = "com_tourismtour";
        $db = JFactory::getDBO();
        JHtmlSidebar::addEntry(JText::_("PANEL"), "index.php?option=$option", $submenu == "tourismtour");
        $layout=JRequest::getVar("layout");
        $xsubmenu = $submenu;
        if($layout=="edit")
            $xsubmenu = $submenu."s";
        ?>
        <style>
            h1.page-title{
                padding-left:50px;
                padding-right:50px;
            }
            h1.page-title span.icon-<?php echo $submenu;?>{
                background-image:url(../components/<?php echo $option;?>/images/icon/<?php echo substr($xsubmenu,0,strlen($xsubmenu)-1);?>.png);
                background-size: 100% 100%;
                height: 40px;
                margin-top: -2px;
                width: 40px;
                position:absolute;
                margin-right: -50px;
                margin-left: -50px;
                background-color:#FFFFFF;
                border-radius:50px;
            }
        </style>
        <?php
        // set some global property
        $document = JFactory::getDocument();
        $document->setTitle(JText::_($submenu));
        JHtmlSidebar::addEntry(JText::_("tours"), "index.php?option=$option&view=tours", $submenu == "tours");
        JHtmlSidebar::addEntry(JText::_("tourorders"), "index.php?option=$option&view=tourorders", $submenu == "tourorders");
        JHtmlSidebar::addEntry(JText::_("coments"), "index.php?option=$option&view=coments", $submenu == "coments");
        JHtmlSidebar::addEntry(JText::_("turningpoints"), "index.php?option=$option&view=turningpoints", $submenu == "turningpoints");
        JHtmlSidebar::addEntry(JText::_("tourfeatures"), "index.php?option=$option&view=tourfeatures", $submenu == "tourfeatures");
        JHtmlSidebar::addEntry(JText::_("images"), "index.php?option=$option&view=images", $submenu == "images");
        JHtmlSidebar::addEntry(JText::_("users"), "index.php?option=$option&view=users", $submenu == "users");
        JHtmlSidebar::addEntry(JText::_("help"), "index.php?option=$option&view=help", $submenu == "help");
        JHtmlSidebar::addEntry(JText::_("about"), "index.php?option=$option&view=about", $submenu == "about");
    }
}
?>