<?php
class Api_Sign
{
	/*
	 * 将客户端发送来的商品信息用商户私钥进行签名
	 */
	public function getAlipaySign($args)
	{
		$content = self::getData();
		$signData = sign($content);
		$returnContent = $content;
		$signNumber = urlencode($signData);
		$data =  array('errorCode' => ApiError::SUCCESS, 'errorMessage'=>'success', 'result'=>array('codeSign'=>$returnContent,'signData'=>$signNumber));
		return $data;
	}
 /*
   * 将客户端传来的支付结果签名进行验签
  */
	public function validateSign($args)
	{
		$signString = $_POST['signString'];
		
		$resultString = $_POST['resultString'];
		$result = verify($resultString,$signString);
		if($result)
		{
			$data =  array('errorCode' => ApiError::SUCCESS, 'errorMessage'=>'success', 'result'=>'true');
			return $data;
		}else{
			$data =  array('errorCode' => ApiError::SUCCESS, 'errorMessage'=>'success', 'result'=>'false');
			return $data;
		}

	}
	

	
	public static function getData()
	{
		if(!(isset($_POST['tradeNumber']))||!(isset($_POST['totalFee'])))
		{
			echo '缺少参数';
			throw new CException('缺少参数',ApiError::METHOD_INVALID);
		}
        //获取商品名称
        $subject = "买买茶商品";
        //获取商品描述
        $body = "买买茶商品";
        //获取商品金额
        $totalFee = $_POST["totalFee"];
        
        //组装待签名数据
        $signData = "partner=" . "\"" . param('partner') ."\"";
        $signData .= "&";
        $signData .= "seller=" . "\"" . param('seller'). "\"";
        $signData .= "&";
        $signData .= "out_trade_no=" . "\"" . strip_tags(trim($_POST['tradeNumber'])) ."\"";
        $signData .= "&";
        $signData .= "subject=" . "\"" . $subject ."\"";
        $signData .= "&";
        $signData .= "body=" . "\"" . $body ."\"";
        $signData .= "&";
        $signData .= "total_fee=" . "\"" . $totalFee ."\"";
        $signData .= "&";
        $signData .= "notify_url=" . "\"" . param('notify_url') ."\"";    
        return $signData;
	}

























}