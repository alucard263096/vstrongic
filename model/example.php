<?php
class ExampleMgr 
{
    public $dbmgr = null;
    public function __construct($dbmgr) {
	    $this->dbmgr=$dbmgr;	
    }
//传参数，获取我的名字，请注意这个范例
public function hello($param){
}

}

?>