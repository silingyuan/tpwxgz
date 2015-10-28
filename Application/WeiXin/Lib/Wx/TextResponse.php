<?php
namespace Home\Lib\Wx;
/**
 * 
 */
class TextResponse{
	
	function __construct($argument) {
		
	}
	private function jokeApi() {
		$url = "http://api.laifudao.com/open/xiaohua.json";
		$contentJson = file_get_contents ( $url );
		$contentObj = json_decode ( $contentJson );
		$rand = rand ( 0, 49 );
		$content = $contentObj [$rand]->title . "\n" . $contentObj [$rand]->content;
		$content = rtrim ( $content );
		$content = str_replace ( "<br/>", "\n", $content );
		$content = strip_tags ( $content );
		$content = htmlspecialchars_decode ( $content );
		$content = html_entity_decode ( $content );
		return $content;
	}
	private function weatherApi($keyword) {
		$url = "http://api.map.baidu.com/telematics/v3/weather?location={$keyword}&ak=XS8Wu04NxHbWfQzCfqag9cqQ";
		$apistr = file_get_contents ( $url );
		$apiobj = simplexml_load_string ( $apistr );
		$place = $apiobj->results->currentCity;
		$today = $apiobj->results->weather_data->date [0];
		$weather = $apiobj->results->weather_data->weather [0];
		$wind = $apiobj->results->weather_data->wind [0];
		;
		$temperature = $apiobj->results->weather_data->temperature [0];
		$picUrl = $apiobj->results->weather_data->dayPictureUrl [0];
		$content = "{$place}\n{$today}\n天气：{$weather}\n风力：{$wind}\n温度：{$temperature}";
		if ($place == "")
			$content = "您输入的地区有误,请您重新输入";
		return $content;
	}
	private function chatterbotApi($keyword) {
		$url = "http://www.tuling123.com/openapi/api?key=b679af8f4266e28bf9f600126500d287&info={$keyword}";
		$contentJson = file_get_contents ( $url );
		$contentObj = json_decode ( $contentJson );
		if ($contentObj->code == "100000") {
			$content = $contentObj->text;
			return $content;
		} else {
			return "呃(⊙o⊙)…，这个我不知道^_^";
		}
	}
	private function newsApi($keyword) {
		$url = "http://www.tuling123.com/openapi/api?key=b679af8f4266e28bf9f600126500d287&info={$keyword}新闻";
		$contentJson = file_get_contents ( $url );
		$contentObj = json_decode ( $contentJson );
		if ($contentObj->code == "302000" && $contentObj->list [0]->article != "") {
			$items = array (
					new NewsResponseItem ( $contentObj->list [0]->article, '', $contentObj->list [0]->icon, $contentObj->list [0]->detailurl ),
					new NewsResponseItem ( $contentObj->list [1]->article, '', $contentObj->list [1]->icon, $contentObj->list [1]->detailurl ),
					new NewsResponseItem ( $contentObj->list [2]->article, '', $contentObj->list [2]->icon, $contentObj->list [2]->detailurl ),
					new NewsResponseItem ( $contentObj->list [3]->article, '', $contentObj->list [3]->icon, $contentObj->list [3]->detailurl ),
					new NewsResponseItem ( $contentObj->list [4]->article, '', $contentObj->list [4]->icon, $contentObj->list [4]->detailurl ),
					new NewsResponseItem ( $contentObj->list [5]->article, '', $contentObj->list [5]->icon, $contentObj->list [5]->detailurl ),
					new NewsResponseItem ( $contentObj->list [6]->article, '', $contentObj->list [6]->icon, $contentObj->list [6]->detailurl ),
					new NewsResponseItem ( $contentObj->list [7]->article, '', $contentObj->list [7]->icon, $contentObj->list [7]->detailurl ) 
			);
			$this->responseNews ( $items );
		} else {
			$this->responseText ( "呃(⊙o⊙)…木有新闻，请换个词试试吧！^_^" );
		}
	}
}

