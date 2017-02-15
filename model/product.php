<?php
class ProductMgr 
{
    public $dbmgr = null;
    public function __construct($dbmgr) {
	    $this->dbmgr=$dbmgr;	
    }
//获取产品列表，传入对应的搜索条件
public function _list($search_param,$orderby){

    $sql_where="";


    if(isset($search_param["seq"]))
    {
        $sql_where.=" and r_main.seq like '%".$search_param["seq"]."%'";
    }
  
    if(isset($search_param["is_index"]))
    {
        $sql_where.=" and r_main.is_index like '%".$search_param["is_index"]."%'";
    }
  
    if(isset($search_param["logo"]))
    {
        $sql_where.=" and r_main.logo like '%".$search_param["logo"]."%'";
    }
  
    if(isset($search_param["name_en"]))
    {
        $sql_where.=" and r_main.name_en like '%".$search_param["name_en"]."%'";
    }
  
    if(isset($search_param["shortname_en"]))
    {
        $sql_where.=" and r_main.shortname_en like '%".$search_param["shortname_en"]."%'";
    }
  
    if(isset($search_param["name_cn"]))
    {
        $sql_where.=" and r_main.name_cn like '%".$search_param["name_cn"]."%'";
    }
  
    if(isset($search_param["shortname_cn"]))
    {
        $sql_where.=" and r_main.shortname_cn like '%".$search_param["shortname_cn"]."%'";
    }
  
    if(isset($search_param["content_en"]))
    {
        $sql_where.=" and r_main.content_en like '%".$search_param["content_en"]."%'";
    }
  
    if(isset($search_param["content_cn"]))
    {
        $sql_where.=" and r_main.content_cn like '%".$search_param["content_cn"]."%'";
    }
  
    if(isset($search_param["status"]))
    {
        $sql_where.=" and r_main.status like '%".$search_param["status"]."%'";
    }
  
    $sql="select  r_main.id  ,r_main.seq ,case   r_main.is_index when 'Y' then '是' else '否'  end as is_index ,r_main.logo ,r_main.name_en ,r_main.shortname_en ,r_main.name_cn ,r_main.shortname_cn ,r_main.content_en ,r_main.content_cn ,case   r_main.status  when 'A' then '启用' when 'I' then '禁用' else 'unknow'  end as status  from  tb_product r_main  where 1=1 $sql_where  and r_main.status<>'D' 
    $orderby";
                $query = $this->dbmgr->query($sql);
                $result = $this->dbmgr->fetch_array_all($query);

                return $result;

}
//获取产品详情, 传入对应的id
public function get($id){

  
    $sql="select  r_main.id  ,r_main.seq ,case   r_main.is_index when 'Y' then '是' else '否'  end as is_index ,r_main.logo ,r_main.name_en ,r_main.shortname_en ,r_main.name_cn ,r_main.shortname_cn ,r_main.content_en ,r_main.content_cn ,case   r_main.status  when 'A' then '启用' when 'I' then '禁用' else 'unknow'  end as status  from  tb_product r_main  where r_main.id=$id ";
                $query = $this->dbmgr->query($sql);
                $result = $this->dbmgr->fetch_array($query);

                


                return $result;

}

}

?>