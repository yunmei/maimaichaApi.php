<?php
class Api_Regions
{
	/*
	 * 获取一级区域列表
	 */
	public function getFirstGradeRegions($args)
	{
		$criteria = new CDbCriteria();
		$criteria->addColumnCondition(array('region_grade'=>1));
		$firstRegions = Regions::model()->findAll($criteria);
		$array = array();
		if($firstRegions['0'])
		{
			foreach($firstRegions as $k=>$v)
			{
				$array[$k]['regionId'] = $v['region_id'];
				$array[$k]['localName'] = $v['local_name'];
			}
			$data = array('errorCode' => ApiError::SUCCESS, 'errorMessage'=>'success', 'result'=>$array);
			return $data;
		}else{
			throw new CException('缺少goodsId参数',ApiError::METHOD_INVALID);
		}	
	}
	
	/*
	 * 获取二级区域列表
	 */
	public function getSecondGradeRegions($args)
	{
		if($_POST['firstRegionId'])
		{
			$reginId = strip_tags(trim($_POST['firstRegionId']));
			$criteria = new CDbCriteria();
			$criteria->addColumnCondition(array('p_region_id'=>$reginId));
			$secondRegions = Regions::model()->findAll($criteria);
			$array = array();
			if($secondRegions[0])
			{
				foreach($secondRegions as $k=>$v)
				{
					$array[$k]['regionId'] = $v['region_id'];
					$array[$k]['localName'] = $v['local_name'];
				}
				$data = array('errorCode' => ApiError::SUCCESS, 'errorMessage'=>'success', 'result'=>$array);
				return $data;
			}else{
				throw new CException('缺少goodsId参数',ApiError::METHOD_INVALID);
			}
		}
	}
	
	/*
	 * 获取三级区域列表
	 */
	public function getThirdGradeRegions($args)
	{
		if($_POST['secondRegionId'])
		{
			$reginId = strip_tags(trim($_POST['secondRegionId']));
			$criteria = new CDbCriteria();
			$criteria->addColumnCondition(array('p_region_id'=>$reginId));
			$secondRegions = Regions::model()->findAll($criteria);
			$array = array();
			if($secondRegions[0])
			{
				foreach($secondRegions as $k=>$v)
				{
					$array[$k]['regionId'] = $v['region_id'];
					$array[$k]['localName'] = $v['local_name'];
				}
				$data = array('errorCode' => ApiError::SUCCESS, 'errorMessage'=>'success', 'result'=>$array);
				return $data;
			}else{
				throw new CException('缺少goodsId参数',ApiError::METHOD_INVALID);
			}
		}
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
}