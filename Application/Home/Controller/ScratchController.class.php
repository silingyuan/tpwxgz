<?php
namespace Home\Controller;
use Think\Controller;
class ScratchController extends Controller{
	public function index(){
		$prizeDb=M('prize');
		$prize_arr=$prizeDb->where('id>0')->select();
		$this->assign('prize_arr',$prize_arr);
		if(session('?username')==false||session('?password')==false){ //判断session是否存在用户名和密码
			$this->assign('login',1);	  //用户名和密码中有一个不存在，显示登录页面
			$this->display('scratch');
		}
		else{//如果session中存储了用户名和密码，显示抽奖页面
			$scratchDb=M('scratch');
			$result=$scratchDb->where("username='%s'",session('username'))->find();
			if(is_array($result)){
				$scratch=$result;
				$prize=getPrize($prize_arr);					
				$refreshTime=mktime(0,0,0,date("m",$scratch['time']),date("d",$scratch['time'])+1,date("Y",$scratch['time']));
				$scratch['time']=time();
				if($scratch['time']>$refreshTime)
				{
					$scratch['times']=2;
				}
				if($scratch['times']>0)
				{
					$scratch['times']=$scratch['times']-1;
					$scratchDb->save($scratch);
					$this->assign('scratch',$scratch);
					$this->assign('prize',$prize);
					$this->display('scratch');
					$id=$prize['id'];
					if ($id<7) {
						$prize_arr[$id-1]['v']=$prize_arr[$id-1]['v']-1;
						$prizeDb->save($prize_arr[$id-1]);
						S($prize['sncode'],$prize['num']);
					}
				}
				else {
					$this->display('tomorrow');
				}
				
			}
			else{
				echo '很抱歉，网络有点累了！休息一下再重试吧。';
			}
		} 
	}
	/*public function loginHandle(){
		if(IS_POST)
		{
			$result=M('user')->where("username='%s' AND password='%s'",$_POST['username'],$_POST['password'])->find();
			if($result){
				session('username',$_POST['username']);
				session('password',$_POST['password']);
				$success=array(
					'content'=>'<p>恭喜您！登录成功！快快行动吧！大奖等着你</p>',
					'next'=>'抽奖页面'
				);
				$this->success($success,U('Home/Scratch/index'),3);
			}
			else{
				$error=array(
					'content'=>'<p>很抱歉！您的用户名或密码错误，请重新登录</p>',
					'back'=>'登录页面'
				);
				 $this->error($error,U('Home/Scratch/index'),3);
			}
		}
	}*/
	public function loginHandle(){
		if(IS_POST)
		{
			$result=M('user')->where("username='%s' AND password='%s'",$_POST['username'],$_POST['password'])->find();
			if(is_array($result)){
				session('username',$_POST['username']);
				session('password',$_POST['password']);
				$message=array(
						'content'=>'<p>恭喜您，登录成功！快快行动吧，大奖等着你！</p>',
						'next'=>'抽奖页面'
				);
				$this->assign('message',$message);
				$this->assign('waitSecond',3);
				$this->assign('jumpUrl',U('Home/Scratch/index'));
				$this->display('loginHandle');
			}
			else if(is_null($result)){
				$error=array(
						'content'=>'<p>很抱歉，您的用户名或密码错误！请核对后重新登录！</p>',
						'back'=>'登录页面'
				);
				$this->assign('error',$error);
				$this->assign('waitSecond',3);
				$this->assign('jumpUrl',U('Home/Scratch/login'));
				$this->display('loginHandle');
			}
			else {
				echo '很抱歉，网络有点累了！休息一下再重试吧。';
			}
		}
	}
	public function register(){
		//本地模式调试使用test作为$formusername
		if(APP_STATUS=='eznetonline'){
			$fromusername=$_GET['fromusername'];
		}
		else {
			$fromusername='test3';
		}
		if(is_null($fromusername)){
			echo '请用微信登录';
		}
		else{
			$userDb=M('user');
			$result=$userDb->where("fromusername='%s'",$fromusername)->find();
			if(is_array($result)) {
				session('username',$result['username']);
				session('password',$result['password']);
				$res=array(
						'content'=>"<p>恭喜您！您已经是我们的会员了，无需重复注册。 </p><p>您的用户名为：".$result['username']."</br>您的密码为：".$result['password']."</p>",
						'next'=>'抽奖页面',
				);
				$this->success($res,U('Home/Scratch/index'),3);
			}
			else if(is_null($result)) {
				$this->assign('fromusername',$fromusername);
				$this->display();
			}
			else {
				echo '很抱歉，网络有点累了！休息一下再重试吧。';
			}
		}
	}
	
	public function registerHandle(){
		if(IS_POST){
			$userDb=M('user');
			$result=$userDb->where("fromusername='%s'",$_POST['fromusername'])->find();
			if(is_array($result)) {
				session('username',$result['username']);
				session('password',$result['password']);
				$res=array(
						'content'=>"<p>恭喜您！您已经是我们的会员了，无需重复注册。 </p><p>您的用户名为：".$result['username']."</br>您的密码为：".$result['password']."</p>",
						'next'=>'抽奖页面',
				);
				$this->success($res,U('Home/Scratch/index'),3);
			}
			else if(is_null($result)) {
				$user=array(
					'fromusername'=>$_POST['fromusername'],
					'username'=>$_POST['username'],
					'password'=>$_POST['password'],
					'time'=>time()
				);
				$userNum=$userDb->data($user)->add();			
				$scratch=array('username'=>$_POST['username'],
						'times'=>2,
						'time'=>time(),
				);
				M('scratch')->data($scratch)->add();
				
				session('username',$user['username']);
				session('password',$user['password']);
				$res=array(
						'content'=>"<p>恭喜您！您已经注册成功！欢迎您加入我们，您是我们的第".$userNum."位会员。</p>",
						'next'=>'抽奖页面',
				);
				$this->success($res,U('Home/Scratch/index'),3);
			}
			else {
				echo '很抱歉，网络有点累了！休息一下再重试吧。';
			}
		}
		if(IS_GET){
			$result=M('user')->where("username='%s'",I('username'))->find();
			if($result){
				$this->ajaxReturn(false);
			}
			else{
				$this->ajaxReturn(true);
			}
		}			
	}
	public function getAward(){	
		$this->display();
	}
	public function awardHandle(){
		if(IS_POST)
		{
			$sncode=preg_replace('/-/','',$_POST['sncode']);
			$sncode=preg_replace('/\s+/','',$sncode);
			$qb=S($sncode);
			S($sncode,NULL);
			$awardDb=M('award');
			$result=$awardDb->where("qq='%s'",$_POST['qq'])->find();
			if(is_array($result)){
				$data=$result;
				$data['qb']=$data['qb']+$qb;
				$awardDb->save($data);
			}
			else if(is_null($result)){
				$data=array('qq'=>$_POST['qq'],'qb'=>$qb);
				$awardDb->data($data)->add();
			}
			else{
				echo '很抱歉，网络有点累了！休息一下再重试吧。';
			}
			$res=array(
					'content'=>"<p>恭喜您！您已经兑换成功！QQ号".$data['qq']."已经获得的Q币总数为".$data['qb']."欢迎您继续抽奖</p>",
					'next'=>'抽奖页面',
			);
			$this->success($res,U('Home/Scratch/index'),3);
		}
		if(IS_GET){
			$sncode=preg_replace('/-/','',I('sncode'));
			$sncode=preg_replace('/\s+/','',$sncode);
			if(S($sncode)==false)
			{
				$this->ajaxReturn(false);
			}
			else {
				$this->ajaxReturn(true);
			}
		}
	}
	public function set(){
		/*$prize_arr = array(
		 '0' => array('id' =>1,'name' =>'一等奖','content'=>'10个Q币','num'=>10,'v' =>2),
		 '1' => array('id' =>2,'name' =>'二等奖','content'=>'8个Q币','num'=>8,'v' =>5),
		 '2' => array('id' =>3,'name' =>'三等奖','content'=>'5个Q币','num'=>5,'v' =>10),
		 '3' => array('id' =>4,'name' =>'四等奖','content'=>'3个Q币','num'=>3,'v' =>50),
		 '4' => array('id' =>5,'name' =>'五等奖','content'=>'2个Q币','num'=>2,'v' =>100),
		 '5' => array('id' =>6,'name' =>'六等奖','content'=>'1个Q币','num'=>1,'v' =>490),
		 '6' => array('id' =>7,'name' =>'七等奖','content'=>'谢谢参与','num'=>0,'v' =>600)
		);
		foreach ($prize_arr as $key => $value) {
		M('prize')->data($value)->add();
		}*/
		//测试username数据库
		$formusername=$_GET['fromusername']?$_GET['fromusername']:'test';
		$data=M('user')->where("fromusername='%s'",$formusername)->find();
		$scratchDb=M('scratch');
		$result=$scratchDb->where("username='%s'",$data['username'])->find();
		if(!$result){
			$scratch=array('username'=>$data('username'),
					'times'=>2000,
					'time'=>time(),
			);
			$scratchDb->data($scratch)->add();
		}else{
			$result['times']=2000;
			$result['time']=time();
			$scratchDb->save($result);
		}
		echo $formusername."抽奖次数2000";
	}
	public function test(){
		$this->display();
	}
}
