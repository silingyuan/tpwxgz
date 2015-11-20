<?php
namespace WeiXin\Controller;
class QcxmmController extends Wechat{
	function index() {
		$this->run('wxl',true);
	}
	/**
	 * 用户关注时触发，回复「欢迎关注」
	 * 用户关注
	 * @return void
	 */
	
	protected function onSubscribe() {
		$content = "《主菜单》\n输入数字进入对应的功能\n1 刮刮卡抽奖\n3 注册成为会员";
		$welcom="欢迎关注\n";
		$content=$welcom.$content;
		$this->responseText ($content);
	}

	/**
	 * 用户取消关注时触发
	 *
	 * @return void
	 */
	protected function onUnsubscribe() {
		// 「悄悄的我走了，正如我悄悄的来；我挥一挥衣袖，不带走一片云彩。」
	}

	/**
	 * 收到文本消息时触发，回复收到的文本消息内容
	 *
	 * @return void
	 */
	protected function onText() {
		$content = "《主菜单》\n输入数字进入对应的功能\n1 刮刮卡抽奖\n3 注册成为会员";
		$keyword = $this->getRequest ('content');
		$fromusername=$this->getRequest('fromusername');
		switch ($keyword) {
			case "1";
			$items= array(
					new NewsResponseItem("机不可失！免费送Q币啦！进来看看没啥损失！","","http://www.ptwop.xyz/tpwxgzh/Image/ggk.png",U('Home/Scratch/index',array('wxid'=>'qcxmm'),'',TRUE))
			);
			$this->responseNews($items);
			return;
			break;
			case "3":
				$content='<a href="'.U('Home/Scratch/register',array('wxid'=>'qcxmm','fromusername'=>$fromusername),'',TRUE).'">点击我注册成为会员</a>';
			break;
			case "4":
				$content='<a href="'.U('Home/Scratch/test',array('wxid'=>'qcxmm'),'',TRUE).'">test</a>';
				break;
			case "2000":
				$content='<a href="'.U('Home/Scratch/set',array('wxid'=>'qcxmm','fromusername'=>$fromusername),'',TRUE).'">scratch-set</a>';
			break;
			default :
				$content = "《主菜单》\n输入数字进入对应的功能\n1 刮刮卡抽奖\n3 注册成为会员";
			break;
		}
		$this->responseText ( $content );
	}

	/**
	 * 收到图片消息时触发，回复由收到的图片组成的图文消息
	 *
	 * @return void
	 */
	protected function onImage() {
		$items = array (
				new NewsResponseItem ( '标题一', '描述一', $this->getRequest ( 'picurl' ), $this->getRequest ( 'picurl' ) ),
				new NewsResponseItem ( '标题二', '描述二', $this->getRequest ( 'picurl' ), $this->getRequest ( 'picurl' ) )
		);

		$this->responseNews ( $items );
	}

	/**
	 * 收到地理位置消息时触发，回复收到的地理位置
	 *
	 * @return void
	 */
	protected function onLocation() {
		$location_x = $this->getRequest ( 'location_x' );
		$location_y = $this->getRequest ( 'location_y' );
		$url ="http://api.map.baidu.com/telematics/v3/reverseGeocoding?location={$location_y},{$location_x}&coord_type=gcj02&ak=XS8Wu04NxHbWfQzCfqag9cqQ";
		$apistr = file_get_contents ( $url );
		$apiobj = simplexml_load_string ( $apistr );
		$addstr = $apiobj->results->result [0]->name;
		$this->responseText ( "已经成功捕获你的位置，我知道你在{$addstr}附近" );
	}

	/**
	 * 收到链接消息时触发，回复收到的链接地址
	 *
	 * @return void
	 */
	protected function onLink() {
		$this->responseText ( '收到了链接：' . $this->getRequest ( 'url' ) );
	}

	/**
	 * 收到未知类型消息时触发，回复收到的消息类型
	 *
	 * @return void
	 */
	protected function onUnknown() {
		$this->responseText ( '收到了未知类型消息：' . $this->getRequest ( 'msgtype' ) );
	}
}