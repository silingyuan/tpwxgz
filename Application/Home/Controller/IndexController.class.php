<?php
namespace Home\Controller;
use Think\Controller;
use Org\Net\Http;
use Think\Verify;
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
     /**
	  * 测试功能：测试http类的下载功能
	  */
     public function testDownload(){
     	Http::download("Image/ggk.png","图片");
     }
     /**
      * 测试功能：测试http类的下载功能
      */
     public function testVerify(){
     	$verify=new Verify();
     	$verify->entry();
     }
     public function test(){
     	$this->display();
     }
     
}