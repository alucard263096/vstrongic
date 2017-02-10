<?php
class NewsMgr 
{
    public $dbmgr = null;
    public function __construct($dbmgr) {
	    $this->dbmgr=$dbmgr;	
    }
//获取新闻列表，传入对应的搜索条件
public function _list($search_param,$orderby){

    $sql_where="";


    if(isset($search_param["news_type_id"]))
    {
        $sql_where.=" and r_main.news_type_id='".$search_param["news_type_id"]."'";
    }
  
    if(isset($search_param["title_en"]))
    {
        $sql_where.=" and r_main.title_en like '%".$search_param["title_en"]."%'";
    }
  
    if(isset($search_param["title_cn"]))
    {
        $sql_where.=" and r_main.title_cn like '%".$search_param["title_cn"]."%'";
    }
  
    if(isset($search_param["content_en"]))
    {
        $sql_where.=" and r_main.content_en like '%".$search_param["content_en"]."%'";
    }
  
    if(isset($search_param["content_cn"]))
    {
        $sql_where.=" and r_main.content_cn like '%".$search_param["content_cn"]."%'";
    }
  
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
  
    if(isset($search_param["status"]))
    {
        $sql_where.=" and r_main.status like '%".$search_param["status"]."%'";
    }
  
    $sql="select  r_main.id  ,news_type.name_cn news_type_id_name,r_main.news_type_id ,r_main.title_en ,r_main.title_cn ,r_main.content_en ,r_main.content_cn ,r_main.published_date ,case   r_main.status  when 'A' then '启用' when 'I' then '禁用' else 'unknow'  end as status  from  tb_news r_main  left join tb_news_type news_type on r_main.news_type_id=news_type.id  where 1=1 $sql_where  and r_main.status<>'D' 
    $orderby";
                $query = $this->dbmgr->query($sql);
                $result = $this->dbmgr->fetch_array_all($query);

                return $result;

}
//获取新闻详情, 传入对应的id
public function get($id){

  
    $sql="select  r_main.id  ,news_type.name_cn news_type_id_name,r_main.news_type_id ,r_main.title_en ,r_main.title_cn ,r_main.content_en ,r_main.content_cn ,r_main.published_date ,case   r_main.status  when 'A' then '启用' when 'I' then '禁用' else 'unknow'  end as status  from  tb_news r_main  left join tb_news_type news_type on r_main.news_type_id=news_type.id  where r_main.id=$id ";
                $query = $this->dbmgr->query($sql);
                $result = $this->dbmgr->fetch_array($query);

                


                return $result;

}

}

?>