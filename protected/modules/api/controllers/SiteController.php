<?php
/**
 * API入口Controller
 * @author Bevin
 */
class SiteController extends Controller
{
	/**
	 * IndexAction
	 */
	public function actionIndex()
	{
	    $args = $_POST;
	    $method = strip_tags(trim($args['act']));
	   // $apikey = strip_tags(trim($args['apikey']));
	    //$format = ApiBase::checkFormat($args['format']);
	    $format = 'json';
//	    try {
//	        ApiBase::checkApiKey($apikey);
//	    } catch (CException $e) {
//	        $data = array('errorCode'=>$e->getCode(), 'errorMessage'=>$e->getMessage());
//	        ApiBase::renderData($data, $format);
//	        exit(0);
//	    }
	    
	    try {
            list($class, $method) = ApiBase::checkMethod($method);
	    } catch (CException $e) {
	        $data = array('errorCode'=>$e->getCode(), 'errorMessage'=>$e->getMessage());
	        //ApiBase::renderData($data, $format);
	        exit(0);
	    }
	    
		try {
	    	$object = new $class;
	    	$data = $object->$method($args, $format);
	        ApiBase::renderData($data, $format);
	    }  catch (CException $e) {
	        $data = array('errorCode'=>$e->getCode(), 'errorMessage'=>$e->getMessage());
	       // ApiBase::renderData($data, $format);
	        exit(0);
	    }
	}
	
	public function actionAlipay()
	{
		$notify_data = "notify_data=" . $_POST["notify_data"];
		$sign = $_POST["sign"];
		$isVerify = verify($notify_data, $sign);
	    if(!$isVerify)
	    {
	    	echo "fail";
	    	return;
	    }else{
	    	echo 'true';
	    }
		//获取交易状态
	    $trade_status = getDataForXML($_POST["notify_data"] , '/notify/trade_status');
	    
	    //判断交易是否完成
	    if($trade_status == "TRADE_FINISHED"){
	    	echo "success";
			//支付宝交易号
			//为改订单创建支付记录
			$payments = new Payments();
			//$payments['']
	    	$aliTradNo = getDataForXML($_POST["notify_data"] , '/notify/trade_no');
	    	//订单号
	    	$orderId = getDataForXML($_POST["notify_data"] , '/notify/out_trade_no');
	    	if($orderId)
	    	{
	    		$order = Order::model()->find("order_id = '".$orderId."'");
	    		if($order)
	    		{
	    			$memberId = $order['member_id'];
	    		}
	    	} 
	    	//开始时间
	    	$beginTime = getDataForXML($_POST["notify_data"] , '/notify/gmt_create');
	    	//结束时间
	    	$endTime = getDataForXML($_POST["notify_data"] , '/notify/gmt_payment');
	    	$totalFee = getDataForXML($_POST["notify_data"] , '/notify/total_fee');
	    }
	    else{
	    	echo "fail";
	    }	
	}

}