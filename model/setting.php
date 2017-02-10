<?php
class SettingMgr 
{
    public $dbmgr = null;
    public function __construct($dbmgr) {
	    $this->dbmgr=$dbmgr;	
    }
//获取系统参数详情
public function get($id){

  
    $sql="select  r_main.id  ,r_main.website_name ,r_main.head_logo ,r_main.contacter ,r_main.favfile ,r_main.shortname ,r_main.qq ,r_main.email ,r_main.mobile ,r_main.phone ,r_main.sales_email ,r_main.info_mail ,r_main.cnzz_id ,r_main.icp_no ,r_main.foot_right  from  tb_setting r_main  where r_main.id=$id ";
                $query = $this->dbmgr->query($sql);
                $result = $this->dbmgr->fetch_array($query);

                


                return $result;

}

}

?>