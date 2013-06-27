<?php
 class	Api_Addr
{
	/*
	 * 获取用户收货信息
	 */
	public function getAddrs($args)
	{
		if(isset($_POST['userId']))
		{
			$criteria = new CDbCriteria();
			$criteria ->addColumnCondition(array('member_id'=>strip_tags(trim($_POST['userId']))));
			$addrs = Addr::model()->findAll($criteria);
			echo count($addrs).'count';
			$array = array();
			if($addrs[0]['addr_id'])
			{
				foreach($addrs as $k=>$v)
				{
					$array[$k]['addrId'] = $v['addr_id'];
					$array[$k]['area']   = $v['area'];
					$array[$k]['addr']	 = $v['addr'];
					$array[$k]['zip']	 = $v['zip'];
					$array[$k]['mobile']	 = $v['mobile'];
					$array[$k]['name'] = $v['name'];
				}
				$data = array('errorCode' => ApiError::SUCCESS, 'errorMessage'=>'success', 'result'=>array($array));
				return $data;
			}
		}
	}
	
	/*
	 *  添加用户收货信息
	 */
	public function addAddrs($args)
	{
		if(isset($_POST['userId']))
		{
			$addr = new Addr();
			$addr['member_id'] = strip_tags(trim($_POST['userId']));
			//这种格式的数据：mainland:湖北/武汉市/洪山区:1328
			$addr['area'] =  strip_tags(trim($_POST['area']));
			//这种格式的数据：广东省深圳市南山区蛇口渔二村21栋704室
			$addr['addr'] =  strip_tags(trim($_POST['addr']));
			$addr['zip'] =  strip_tags(trim($_POST['zip']));
			$addr['mobile'] = strip_tags(trim($_POST['mobile']));
			$addr['name'] = strip_tags(trim($_POST['name']));
			if($addr->save())
			{
				$array = array();
				$data = array('errorCode' => ApiError::SUCCESS, 'errorMessage'=>'success', 'result'=>array($array));
				return $data;
			}else{
				throw new CException('添加失败',ApiError::METHOD_INVALID);
			}	
		}
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
}