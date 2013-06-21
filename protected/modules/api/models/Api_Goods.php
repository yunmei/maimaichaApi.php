<?php

/*
 * goods api class
 * @wanghong
 */
 class Api_Goods
 {
 	
 	/*
 	 * 获取热卖商品
 	 */
 	public function getHotList($args)
 	{
 		$criteria = new CDbCriteria();
		$criteria->limit = 7;
		$criteria->order = 'buy_count desc';
		$criteria->addColumnCondition(array('disabled'=>'false'));
		$goods = Goods::model()->findAll($criteria);
		
		$array = array();
		if($goods[0])
		{
			foreach($goods as $k=>$v)
			{
				$array[$k]['goodsId']   = $v['goods_id'];
				$array[$k]['goodsName'] = $v['name'];
				$array[$k]['goodsPrice']= $v['price'];
				$urlString = $v['thumbnail_pic'];
				$urlArray = explode('|',$urlString);
				$imgUrl = 'img.dev.maimaicha.com/'.trim($urlArray['0']);
				$array[$k]['imageUrl']  = $imgUrl;
			}
			$data = array('errorCode' => ApiError::SUCCESS, 'errorMessage'=>'success', 'result'=>$array);
			return $data;
		}else{
			 throw new CException('没有查询到数据', ApiError::FAIL);
		}
 	}
 	
  /*
 	* 获取最新上架商品
 	*/
  	public function getNewList($args)
 	{
 		$criteria = new CDbCriteria();
		$criteria->limit = 7;
		$criteria->order = 'uptime desc';
		$criteria->addColumnCondition(array('disabled'=>'false'));
		$goods = Goods::model()->findAll($criteria);
		
		$array = array();
		if($goods[0])
		{
			foreach($goods as $k=>$v)
			{
				$array[$k]['goodsId']   = $v['goods_id'];
				$array[$k]['goodsName'] = $v['name'];
				$array[$k]['goodsPrice']= $v['price'];
				$urlString = $v['thumbnail_pic'];
				$urlArray = explode('|',$urlString);
				$imgUrl = 'img.dev.maimaicha.com/'.trim($urlArray['0']);
				$array[$k]['imageUrl']  = $imgUrl;
			}
			$data = array('errorCode' => ApiError::SUCCESS, 'errorMessage'=>'success', 'result'=>$array);
			return $data;
		}else{
			 throw new CException('没有查询到数据', ApiError::FAIL);
		}
 	}
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 	}