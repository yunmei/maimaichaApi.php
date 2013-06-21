<?php
/*
 * Api_cat
 * wanghong 
 */
class Api_Cat
{
	
	/*
	 * 获取一级分类
	 */
	public function getList($args)
	{
		$criteria = new CDbCriteria();
		$criteria->addColumnCondition(array('parent_id'=>0,'disabled'=>'false'));
		$criteria->addCondition("`cat_name` != '礼品专区'");
		$cats = GoodsCat::model()->findAll($criteria);
		$array = array();
		if($cats[0])
		{
			foreach($cats as $k=>$v)
			{
				$array[$k]['catId'] = $v['cat_id'];
				$array[$k]['catName'] = $v['cat_name'];
			}
			$data = array('errorCode' => ApiError::SUCCESS, 'errorMessage'=>'success', 'result'=>$array);
			return $data;
		}else{
			throw new CException('没有查询到数据', ApiError::FAIL);
		}
	}
	
	/*
	 * 获取二级分类
	 */
	public function getSubList($args)
	{
		$criteria = new CDbCriteria();
		$parentId = strip_tags(trim($_POST['parentCatId']));
		$criteria->addColumnCondition(array('parent_id'=>$parentId,'disabled'=>'false'));
		$subCats = GoodsCat::model()->findAll($criteria);
		$array = array();
		if($subCats[0])
		{
			foreach($subCats as $k=>$v)
			{
				$array[$k]['catId'] = $v['cat_id'];
				$array[$k]['catName'] = $v['cat_name'];
			}
			$data = array('errorCode' => ApiError::SUCCESS,'errorMessage'=>'success','result'=>$array);
			return $data;
		}else{
			throw new CException('没有查询到数据',ApiError::FALL);
		}
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
}