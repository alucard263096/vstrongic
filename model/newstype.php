<?php
class NewstypeMgr 
{
    public $dbmgr = null;
    public function __construct($dbmgr) {
	    $this->dbmgr=$dbmgr;	
    }
//获取新闻类型列表，传入对应的搜索条件
public function _list($search_param,$orderby){

    $sql_where="";


    if(isset($search_param["name_en"]))
    {
        $sql_where.=" and r_main.name_en like '%".$search_param["name_en"]."%'";
    }
  
    if(isset($search_param["name_cn"]))
    {
        $sql_where.=" and r_main.name_cn like '%".$search_param["name_cn"]."%'";
    }
  
    if(isset($search_param["status"]))
    {
        $sql_where.=" and r_main.status like '%".$search_param["status"]."%'";
    }
  
    $sql="select  r_main.id  ,r_main.name_en ,r_main.name_cn ,case   r_main.status  when 'A' then '启用' when 'I' then '禁用' else 'unknow'  end as status  from  tb_news_type r_main  where 1=1 $sql_where  and r_main.status<>'D' 
    $orderby";
                $query = $this->dbmgr->query($sql);
                $result = $this->dbmgr->fetch_array_all($query);

                return $result;

}
//获取新闻类型详情, 传入对应的id
public function get($id){

  
    $sql="select  r_main.id  ,r_main.name_en ,r_main.name_cn ,case   r_main.status  when 'A' then '启用' when 'I' then '禁用' else 'unknow'  end as status  from  tb_news_type r_main  where r_main.id=$id ";
                $query = $this->dbmgr->query($sql);
                $result = $this->dbmgr->fetch_array($query);

                


                return $result;

}

}

?>