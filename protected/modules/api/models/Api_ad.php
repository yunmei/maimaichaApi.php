<?php

/**
 * ad API类
 */
class Api_add
{
	/**
	 * 获取广告列表
	 * @version 1.0
	 */
	public function getAdList($args, $format)
	{
		$array = array(
			array('id'=>'1', 'image'=>'http://teaplaza.maimaicha.com/upload/ad/1.png'),
			array('id'=>'2', 'image'=>'http://teaplaza.maimaicha.com/upload/ad/2.png'),
			array('id'=>'3', 'image'=>'http://teaplaza.maimaicha.com/upload/ad/3.png'),
			array('id'=>'4', 'image'=>'http://teaplaza.maimaicha.com/upload/ad/4.png')
		);
		$data = array('errorCode' => ApiError::SUCCESS, 'errorMessage'=>'', 'result'=>$array);
		return $data;
	}
	
}