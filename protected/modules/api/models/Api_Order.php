<?php
class Api_Order
{
	/* 提交order的必填项
	 * userId
	 * session
	 * order_id 订单流水
	 * pay_status
	 *
	 */
	public function orderSubmit($args)
	{
		$order = new Order();
		$order ->order_id = self::get_id();
		$userId = strip_tags(trim($_POST['userId']));
		
		$session = Session::model()->find('member_id ='.$userId);
		if($session&&($session['session']==strip_tags(trim($_POST['session']))))
		{
			
		}else{
			throw new CException('用户验证失败',ApiError::FAIL);
		}
		$order ->member_id = $userId;
			
		$order ->createtime = time();
		//以下这些数据加入sdb_orders表中		
		$order ->ship_area = strip_tags(trim($_POST['shipArea']));
		$order ->ship_addr = strip_tags(trim($_POST['shipAddr']));
		$order ->ship_time = strip_tags(trim($_POST['shipTime']));
		$order ->ship_zip = strip_tags(trim($_POST['shipZip']));
		$order ->ship_mobile = strip_tags(trim($_POST['shipMobile']));
		$order ->memo      =  strip_tags(trim($_POST['memo']));
		$order ->total_amount = strip_tags(trim($_POST['totalAmount']));
		$order ->ship_name = strip_tags(trim($_POST['shipName']));
		$payType = strip_tags(trim($_POST['payType']));
		$order->itemnum = strip_tags(trim($_POST['itemNums']));
		$order->cost_freight = '8';
		$order ->total_amount = strip_tags(trim($_POST['totalAmount']));
		$order ->final_amount = strip_tags(trim($_POST['finalAmount']));
		$order->pay_status = '0';
		if($payType == '货到付款')
		{
			$order->payment = '-1';
			$order->shipping_id = '9';
			$order->shipping = '货到付款';
		}else{
			$alipay = PayType::model()->find('custom_name = '.'支付宝');
			$order->payment = $alipay ? $alipay['id']:'3000';
			$order->shipping_id = '14';
			$order->shipping = '买买茶配送';
		}
		//以下这些数据加入到sdb_orders_items当中，包含所有购物车中的商品信息(商品ID，和所购买商品数量)
		$goodsIds = strip_tags(trim($_POST['goodsIds']));
		$goodsNums = strip_tags(trim($_POST['goodsNums']));
		if($order->save())
		{
			$array = array('orderId'=>$order ->order_id);			
			$goodsIdArray = explode(',',$goodsIds);
			$goodsNums = explode(',',$goodsNums);
			foreach($goodsIdArray as $k=>$v)
			{
				$goods = Goods::model()->findByPk($v);
				if($goods)
				{
					$orderItem = new OrderItems();
					$orderItem->order_id = $order ->order_id;
					$orderItem->product_id = $v;
					$orderItem->dly_status = 'storage';
					$orderItem->type_id = '2';
					$orderItem->bn = $goods['bn'];
					$orderItem->name = $goods['name'];
					$orderItem->price = $goods['price'];
					$orderItem->cost = '0';
					$orderItem->amount = $goods['price']*$goodsNums[$k];
					$orderItem->nums = $goodsNums[$k];
					$orderItem->score = '1';
					$orderItem->is_type = 'goods';
					$orderItem->save();
				}else{
					throw new CException('在添加购买商品到订单类目的时候出现问题导致订单生成失败',ApiError::FAIL);
				}		
			}
			$data = array('errorCode' => ApiError::SUCCESS, 'errorMessage'=>'success', 'result'=>$array);
			return $data;
		}else{
			throw new CException('添加到数据库失败',ApiError::FAIL);
		}
	}

	
	
	/*
	 * 产生订单号
	 */
    public static function get_id(){
        $i = rand(0,9999);
        do{
            if(9999==$i){
                $i=0;
            }
            $i++;
            $order_id = date("YmdH").str_pad($i,4,'0',STR_PAD_LEFT);
            $row = Order::model()->find('order_id ='.$order_id);
        }while($row);
        return $order_id;
    }
    
    /*
     * 获取支付方式
     */
    public function getPayType($args)
    {
    	$payTypes = PayType::model()->findAll();
    	if($payTypes)
    	{
    		$array = array();
    		foreach($payTypes as $k=>$v)
    		{
    			$array[$k]['payId'] = $v['id'];
    			$array[$k]['customName'] = $v['custom_name'];
    		}
    		$data = array('errorCode' => ApiError::SUCCESS, 'errorMessage'=>'success', 'result'=>$array);
    		return $data;
    	}else{
    		throw new CException('没有查询到数据',ApiError::FAIL);
    	}
    }
    
    /*
     * 获取配送方式
     */
    public function getDeliveryType($args)
    {
    	$dlyTypes = DlyType::model()->findAll();
    	if($dlyTypes)
    	{
    		$array = array();
    		foreach($dlyTypes as $k=>$v)
    		{
    			$array[$k]['dlyId'] = $v['dt_id'];
    			$array[$k]['dlyName'] = $v['dt_name'];
    		}
    		$data = array('errorCode' => ApiError::SUCCESS, 'errorMessage'=>'success', 'result'=>$array);
    		return $data;
    	}else{
    		throw new CException('没有查询到数据',ApiError::FAIL);
    	}
    }
	























}