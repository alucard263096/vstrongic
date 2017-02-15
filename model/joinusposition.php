<?php
class JoinuspositionMgr 
{
    public $dbmgr = null;
    public function __construct($dbmgr) {
	    $this->dbmgr=$dbmgr;	
    }
//获取招聘信息列表，传入对应的搜索条件
public function _list($search_param,$orderby){

    $sql_where="";


    if(isset($search_param["published_date"]))
    {
        
    }
  
    if(isset($search_param["published_date_from"]))
    {
        $sql_where.=" and r_main.published_date>='".$search_param["published_date_from"]."'";
    }

    if(isset($search_param["published_date_to"]))
    {
        $sql_where.=" and r_main.published_date<='".$search_param["published_date_to"]."'";
    }
  
    if(isset($search_param["is_hot"]))
    {
        $sql_where.=" and r_main.is_hot like '%".$search_param["is_hot"]."%'";
    }
  
    if(isset($search_param["name_en"]))
    {
        $sql_where.=" and r_main.name_en like '%".$search_param["name_en"]."%'";
    }
  
    if(isset($search_param["name_cn"]))
    {
        $sql_where.=" and r_main.name_cn like '%".$search_param["name_cn"]."%'";
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
  
    if(isset($search_param["workspace"]))
    {
        $sql_where.=" and r_main.workspace like '%".$search_param["workspace"]."%'";
    }
  
    if(isset($search_param["needcount"]))
    {
        $sql_where.=" and r_main.needcount like '%".$search_param["needcount"]."%'";
    }
  
    $sql="select  r_main.id  ,r_main.published_date ,case   r_main.is_hot when 'Y' then '是' else '否'  end as is_hot ,r_main.name_en ,r_main.name_cn ,r_main.content_en ,r_main.content_cn ,case   r_main.status  when 'A' then '启用' when 'I' then '禁用' else 'unknow'  end as status ,r_main.workspace ,r_main.needcount  from  tb_recruitment r_main  where 1=1 $sql_where  and r_main.status<>'D' 
    $orderby";
                $query = $this->dbmgr->query($sql);
                $result = $this->dbmgr->fetch_array_all($query);

                return $result;

}
//获取招聘信息详情, 传入对应的id
public function get($id){

  
    $sql="select  r_main.id  ,r_main.published_date ,case   r_main.is_hot when 'Y' then '是' else '否'  end as is_hot ,r_main.name_en ,r_main.name_cn ,r_main.content_en ,r_main.content_cn ,case   r_main.status  when 'A' then '启用' when 'I' then '禁用' else 'unknow'  end as status ,r_main.workspace ,r_main.needcount  from  tb_recruitment r_main  where r_main.id=$id ";
                $query = $this->dbmgr->query($sql);
                $result = $this->dbmgr->fetch_array($query);

                


                return $result;

}

}

?>