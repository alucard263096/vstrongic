<?php
class IndexbannerMgr 
{
    public $dbmgr = null;
    public function __construct($dbmgr) {
	    $this->dbmgr=$dbmgr;	
    }
//获取横幅广告列表，传入对应的搜索条件
public function _list($search_param,$orderby){

    $sql_where="";


    if(isset($search_param["seq"]))
    {
        $sql_where.=" and r_main.seq like '%".$search_param["seq"]."%'";
    }
  
    if(isset($search_param["link"]))
    {
        $sql_where.=" and r_main.link like '%".$search_param["link"]."%'";
    }
  
    if(isset($search_param["pic_en"]))
    {
        $sql_where.=" and r_main.pic_en like '%".$search_param["pic_en"]."%'";
    }
  
    if(isset($search_param["pic_cn"]))
    {
        $sql_where.=" and r_main.pic_cn like '%".$search_param["pic_cn"]."%'";
    }
  
    if(isset($search_param["status"]))
    {
        $sql_where.=" and r_main.status like '%".$search_param["status"]."%'";
    }
  
    $sql="select  r_main.id  ,r_main.seq ,r_main.link ,r_main.pic_en ,r_main.pic_cn ,case   r_main.status  when 'A' then '启用' when 'I' then '禁用' else 'unknow'  end as status  from  tb_index_banner r_main  where 1=1 $sql_where  and r_main.status<>'D'
    $orderby";
                $query = $this->dbmgr->query($sql);
                $result = $this->dbmgr->fetch_array_all($query);

                return $result;

}
//获取横幅广告详情, 传入对应的id
public function get($id){

  
    $sql="select  r_main.id  ,r_main.seq ,r_main.link ,r_main.pic_en ,r_main.pic_cn ,case   r_main.status  when 'A' then '启用' when 'I' then '禁用' else 'unknow'  end as status  from  tb_index_banner r_main  where r_main.id=$id ";
                $query = $this->dbmgr->query($sql);
                $result = $this->dbmgr->fetch_array($query);

                


                return $result;

}

}

?>