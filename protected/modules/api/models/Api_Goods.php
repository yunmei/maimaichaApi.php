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
 	
 	/*
 	* 获取最新上架商品
 	*/
 	public function getRecommendList($args)
 	{
 		
 	}
 	
 	/*
 	 * 根据分类Id获取商品列表
 	 */
 	public function getListByCatId($args)
 	{
 		$criteria = new CDbCriteria();
 		$catId = strip_tags(trim($_POST['catId']));
 		// 按照价格排序
 		if(isset($_POST['priceOrder']))
 		{
 			$criteria->order = 'price'.' '.$_POST['priceOrder'];	
 		}
 		//按照浏览次数排序
 		if(isset($_POST['viewCount']))
 		{
 			$criteria->order = 'view_count'.' '.$_POST['viewCount'];
 		}
 		//按照销量排序
 		if(isset($_POST['buyCount']))
 		{
 			$criteria->order = 'buy_count'.' '.$_POST['buyCount'];
 		}
 		$criteria->addColumnCondition(array('cat_id'=>$catId));
 		$goods = Goods::model()->findAll($criteria);
 		echo 'count:'.count($goods);
 		$array = array();
 		if($goods[0])
 		{
 			foreach($goods as $k=>$v)
 			{
 				$array[$k]['goodsName']= $v['name'];
 				$array[$k]['goodsId'] = $v['goods_id'];
 				$array[$k]['goodsPrice'] = $v['price'];
 				$urlString = $v['thumbnail_pic'];
				$urlArray = explode('|',$urlString);
				$imgUrl = 'img.dev.maimaicha.com/'.trim($urlArray['0']);
				$array[$k]['imageUrl'] = $imgUrl;
 			}
 			$data = array('errorCode' => ApiError::SUCCESS, 'errorMessage'=>'success', 'result'=>$array);
 			return $data;
 		}else{
 			throw new CException('没有查询到数据', ApiError::FAIL);
 		}
 	}
 
 	/*
 	 * 根据商品ID获取商品详情
 	 */
 
 	public function getInfoByGoodsId($args)
 	{
 		if(isset($_POST['goodsId']))
 		{
 			$goodsId = strip_tags(trim($_POST['goodsId']));
 		}else{
 			throw new CException('缺少goodsId参数',ApiError::METHOD_INVALID);
 		}
 		$criteria = new CDbCriteria();
 		$criteria->addColumnCondition(array('goods_id'=>$goodsId));
 		$goods = Goods::model()->find($criteria);
 		$array = array();
 		if($goods)
 		{
 				$string = $goods['small_pic'];
 				$string_array = explode('|',$string);
 				$imageUrlArray = array();
 				for($i=0;$i<count($string_array)-1;$i++)
 				{
 					if($i===0)
 					{
 						$imageUrlArray[]= 'img.dev.maimaicha.com/'.$string_array[$i];
 					}else{
 						$imageUrlArray[]= 'img.dev.maimaicha.com/images'.$string_array[$i];
 					}
 				}
 				$array['imageUrls'] = $imageUrlArray;
 				$array['name'] = $goods['name'];
 				$array['price'] = $goods['price'];
 				$array['mktPrice'] = $goods['mktprice'];
 				$array['store'] = $goods['store'];
 				$array['property'] = array('goodsBn'=>$goods['bn'],'goodsWeight'=>$goods['weight'],'goodsBrand'=>$goods['brand'],'goodsUnit'=>$goods['unit']);
 			$data = array('errorCode' => ApiError::SUCCESS, 'errorMessage'=>'success', 'result'=>array($array));
 			return $data;
 		}else{
 			throw new CException('未查询到数据',ApiError::FAIL);
 		}
 	}
 
 	/*
 	 * 根据商品ID获取商品intro（详情）
 	 */
 public function getIntroByGoodsId($args)
 {
 		if(isset($_POST['goodsId']))
 		{
 			$goodsId = strip_tags(trim($_POST['goodsId']));
 		}else{
 			throw new CException('缺少goodsId参数',ApiError::METHOD_INVALID);
 		}
 		$criteria = new CDbCriteria();
 		$criteria->addColumnCondition(array('goods_id'=>$goodsId));
 		$goods = Goods::model()->find($criteria);
 		$array = array();
 		if($goods)
 		{
 			$array['intro'] = $goods['intro'];
 			$data = array('errorCode' => ApiError::SUCCESS, 'errorMessage'=>'success', 'result'=>array($array));
 			return $data;
 		}else{
 			throw new CException('未查询到数据',ApiError::FAIL);
 		}
 }
 
 
 
 
 
 
 
 
 
 	}