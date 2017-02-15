<?php
include 'include/common.inc.php';

include ROOT.'/model/indexbanner.php';
include ROOT.'/model/general.php';
include ROOT.'/model/service.php';
include ROOT.'/model/news.php';
include ROOT.'/model/joinusposition.php';
include ROOT.'/model/product.php';


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


$generalMgr=new GeneralMgr($dbmgr);
$index_aboutus=$generalMgr->_list(array("keycode"=>"index_aboutus"));
$smarty->assign("index_aboutus",htmlspecialchars_decode($index_aboutus[0]["content".$lang]));


$serviceMgr=new ServiceMgr($dbmgr);
$services=$serviceMgr->_list(array("status"=>'A'),"order by seq limit 0,2");
$serv=array();
$services=htmlDecodeList($services,array("name"=>"name".$lang,"content"=>"content".$lang));
$smarty->assign("service",$services);


$newsMgr=new NewsMgr($dbmgr);
$productNews=$newsMgr->_list(array("news_type_id"=>"3","status"=>'A'),"order by published_date desc limit 0,5");
$productNews=htmlDecodeList($productNews,array("title"=>"title".$lang,"content"=>"content".$lang));
$smarty->assign("product_news",$productNews);

$industryNews=$newsMgr->_list(array("news_type_id"=>"2","status"=>'A'),"order by published_date desc limit 0,5");
$industryNews=htmlDecodeList($industryNews,array("title"=>"title".$lang,"content"=>"content".$lang));
$smarty->assign("industry_news",$industryNews);

$jMgr=new JoinuspositionMgr($dbmgr);
$joinUsList=$jMgr->_list(array("status"=>'A'),"order by published_date desc limit 0,5");
$joinUsList=htmlDecodeList($joinUsList,array("name"=>"name".$lang,"content"=>"content".$lang));
$smarty->assign("joinuslist",$joinUsList);


$productMgr=new ProductMgr($dbmgr);
$productlist=$productMgr->_list(array("status"=>'A',"is_index"=>'Y'),"order by seq");
$productlist=htmlDecodeList($productlist,array("name"=>"name".$lang,"content"=>"content".$lang));
$smarty->assign("productlist",$productlist);

$smarty->display(ROOT."/templates/index.html");



?>