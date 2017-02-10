<?php
class GeneralMgr 
{
    public $dbmgr = null;
    public function __construct($dbmgr) {
	    $this->dbmgr=$dbmgr;	
    }
//获取页面文字列表，传入对应的搜索条件
public function _list($search_param,$orderby){

    $sql_where="";


    if(isset($search_param["keycode"]))
    {
        $sql_where.=" and r_main.keycode like '%".$search_param["keycode"]."%'";
    }
  
    if(isset($search_param["name"]))
    {
        $sql_where.=" and r_main.name like '%".$search_param["name"]."%'";
    }
  
    if(isset($search_param["position"]))
    {
        $sql_where.=" and r_main.position like '%".$search_param["position"]."%'";
    }
  
    if(isset($search_param["content_en"]))
    {
        $sql_where.=" and r_main.content_en like '%".$search_param["content_en"]."%'";
    }
  
    if(isset($search_param["content_cn"]))
    {
        $sql_where.=" and r_main.content_cn like '%".$search_param["content_cn"]."%'";
    }
  
    $sql="select  r_main.id  ,r_main.keycode ,r_main.name ,r_main.position ,r_main.content_en ,r_main.content_cn  from  tb_general r_main  where 1=1 $sql_where  and 1=1
    $orderby";
                $query = $this->dbmgr->query($sql);
                $result = $this->dbmgr->fetch_array_all($query);

                return $result;

}
//获取页面文字详情, 传入对应的id
public function get($id){

  
    $sql="select  r_main.id  ,r_main.keycode ,r_main.name ,r_main.position ,r_main.content_en ,r_main.content_cn  from  tb_general r_main  where r_main.id=$id ";
                $query = $this->dbmgr->query($sql);
                $result = $this->dbmgr->fetch_array($query);

                


                return $result;

}

}

?>