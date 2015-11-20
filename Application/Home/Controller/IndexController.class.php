<?php
namespace Home\Controller;
use Think\Controller;
use Home\Lib\Wx\MyWechat;
class IndexController extends Controller {
    public function index(){
    	echo "sdf";
     }
     public function wxAddress(){
     	$address=U('Home/Scratch/index',array('wxid'=>'zqb'),'',TRUE)."<br>"
     			.U('Home/Scratch/index',array('wxid'=>'qcxmm'),'',TRUE)."<br>"
     		    .U('Home/Scratch/index',array('wxid'=>'shenshi'),'',TRUE);
     	echo $address;
     }
}