<?php
namespace Home\Controller;
use Think\Controller;
use Home\Lib\Wx\MyWechat;
class IndexController extends Controller {
	public function _initialize(){
		echo $_GET['from'];
	}
    public function index(){
    	echo '<a href='.U('Index/test',array('from'=>'dksfjerj'),'',TRUE).'>test</a>';
     } 
     public function test(){
     	//echo I('from');
     }   
}