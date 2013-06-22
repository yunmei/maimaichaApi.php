<?php
/**
* 用户API文件
*/

/**
 * 用户API类
 */
class Api_User
{
	/**
	 * 用户登录，返回用户ID和session
	 * @version 1.0
	 */
	public function login($args)
	{
		$criteria = new CDbCriteria();
		$criteria ->addColumnCondition(array('email'=>strip_tags(trim($_POST['email']))));
		$user = User::model()->find($criteria);
		if($user['member_id'])
		{
			$password = $user['password'];
			if($password == md5(strip_tags(trim($_POST['password']))))
			{
				$session = Session::model()->find("member_id = '".$user['member_id']."'");
				if($session['id'])
				{
					$session['session']= md5(time().rand(1,99));
					$session->save();
					$data = array('userId'=>$user['member_id'],'session'=>$session['session']);
				}else{
					$session = new Session();
					$session['session']= md5(time().rand(1,99));
					$session['member_id'] = $user['member_id'];
					$session->save();
					$data = array('userId'=>$user['member_id'],'session'=>$session['session']);
				}
				return array('errorCode' => ApiError::SUCCESS, 'errorMessage'=>'success', 'result'=>array($data));
			}
		}else{
			throw new CException('该邮箱不存在',ApiError::METHOD_INVALID);
		}
	}
	
	/**
	 * 用户注册
	 * @version 1.0
	 */
	public function register($args, $format)
	{
		if(isset($_POST['email']))
		{
			$user = User::model()->find("email = '".strip_tags(trim($_POST['email']."'")));
			if($user['member_id'])
			{
				throw new CException('该邮箱已经存在',ApiError::METHOD_INVALID);
			}
			$user = new User();
			$nameStr = 'mobilephoneUser'.time();
			$user['email'] = strip_tags(trim($_POST['email']));
			$user['uname'] = $nameStr;
			$user['password'] = md5(strip_tags(trim($_POST['password'])));
			$array = array();
			if($user->save())
			{
				$session = new Session();
				$session['member_id'] = $user['member_id'];
				$session['session'] = md5(time().rand(1,99));
				if($session->save())
				{
					$array = array('userId'=>$user['member_id'],'session'=>$session['session']);
					$data = array('errorCode' => ApiError::SUCCESS, 'errorMessage'=>'success', 'result'=>array($array));
					return $data;
				}	
			}
		}
	}

	/**
	 * 获取用户数据
	 * @version 1.0
	 */
	public function getUserData($args, $format)
	{
		$uid = ApiBase::checkSid($format);
		$url = param('RequestDataUrl') . $uid;
		$content = GlobalTools::curl($url);
		$array = json_decode($content);
		$data = array('errorCode' => ApiError::SUCCESS, 'errorMessage'=> '', 'result'=>array(
			'score' => intval($array->score) . '',
			'point' => intval($array->point) . '',
			'diamond' => intval($array->diamond) . ''
		));
		return $data;
	}
}