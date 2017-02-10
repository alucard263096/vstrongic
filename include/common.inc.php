<?php
/*
 * Created on 2010-5-6
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
//set include path and config


define('ROOT', str_replace("\\", '/', substr(dirname(__FILE__), 0, -8)));	// -9 = 0-strlen('includes')-1;


//~ set php global variable to NULL, for security
unset($HTTP_ENV_VARS, $HTTP_POST_VARS, $HTTP_GET_VARS, $HTTP_POST_FILES, $HTTP_COOKIE_VARS);



//~ session start
session_start();



include ROOT.'/classes/mgr/smarty.cls.php';

include ROOT.'/core/common.inc.php';
include ROOT.'/model/setting.php';
//$setting=$_SESSION["setting"];
if(empty($setting)){
    $setting=new SettingMgr($dbmgr);
    $setting=$setting->get(0);
    //$_SESSION["setting"]=$setting;
}
$smarty->assign("setting",$setting);

$lang="_en";
$uploadpath="http://cmsdev.app-link.org/alucard263096/companywebsite/upload/";
$smarty->assign("uploadpath",$uploadpath);

?>