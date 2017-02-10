<?php
include 'include/common.inc.php';

include ROOT.'/model/indexbanner.php';


$bannerMgr=new IndexbannerMgr($dbmgr);
$bannerlist=$bannerMgr->_list(array("status"=>"A")," order by seq");

$bannerimgarr=array();
$bannerlinkarr=array();

foreach($bannerlist as $val){
    $bannerimgarr[]=$uploadpath."indexbanner/".$val["pic".$lang];
    $bannerlinkarr[]=$val["link"];
}

$smarty->assign("bannerimg",join("|",$bannerimgarr));
$smarty->assign("bannerlink",join("|",$bannerlinkarr));



$smarty->display(ROOT."/templates/index.html");



?>