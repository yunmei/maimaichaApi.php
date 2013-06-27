<?php

/**
 * This is the model class for table "{{orders}}".
 *
 * The followings are the available columns in table '{{orders}}':
 * @property string $order_id
 * @property integer $member_id
 * @property string $api_id
 * @property string $confirm
 * @property string $status
 * @property integer $is_keep
 * @property string $pay_status
 * @property string $ship_status
 * @property string $user_status
 * @property string $is_delivery
 * @property integer $shipping_id
 * @property string $shipping
 * @property string $shipping_area
 * @property integer $payment
 * @property string $weight
 * @property string $tostr
 * @property integer $itemnum
 * @property string $acttime
 * @property string $createtime
 * @property string $refer_id
 * @property string $refer_url
 * @property string $refer_time
 * @property string $c_refer_id
 * @property string $c_refer_url
 * @property string $c_refer_time
 * @property string $ip
 * @property string $ship_name
 * @property string $ship_area
 * @property string $ship_addr
 * @property string $ship_zip
 * @property string $ship_tel
 * @property string $ship_email
 * @property string $ship_time
 * @property string $ship_mobile
 * @property string $cost_item
 * @property string $is_tax
 * @property string $cost_tax
 * @property string $tax_company
 * @property string $cost_freight
 * @property string $is_protect
 * @property string $cost_protect
 * @property string $cost_payment
 * @property string $currency
 * @property string $cur_rate
 * @property string $score_u
 * @property string $score_g
 * @property string $score_e
 * @property string $advance
 * @property string $discount
 * @property string $use_pmt
 * @property string $total_amount
 * @property string $final_amount
 * @property string $pmt_amount
 * @property string $payed
 * @property string $markstar
 * @property string $memo
 * @property integer $print_status
 * @property string $mark_text
 * @property string $disabled
 * @property integer $last_change_time
 * @property string $use_registerinfo
 * @property string $mark_type
 * @property string $extend
 * @property string $is_has_remote_pdts
 * @property string $order_refer
 * @property string $print_id
 * @property integer $U8
 * @property string $member_name
 * @property integer $event
 * @property string $order_source
 * @property integer $tax_type
 * @property string $tax_content
 */
class Order extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Order the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{orders}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('member_id, is_keep, shipping_id, payment, itemnum, print_status, last_change_time, U8, event, tax_type', 'numerical', 'integerOnly'=>true),
			array('order_id, weight, ship_zip, cost_item, cost_tax, cost_freight, cost_protect, cost_payment, score_u, score_g, score_e, advance, discount, total_amount, final_amount, pmt_amount, payed, order_refer, print_id, member_name, order_source', 'length', 'max'=>20),
			array('api_id, ship_area, tax_company, extend', 'length', 'max'=>255),
			array('confirm, pay_status, ship_status, is_delivery, markstar', 'length', 'max'=>1),
			array('status', 'length', 'max'=>6),
			array('user_status', 'length', 'max'=>7),
			array('shipping, ship_addr', 'length', 'max'=>100),
			array('shipping_area, refer_id, c_refer_id, ship_name, ship_time, ship_mobile', 'length', 'max'=>50),
			array('acttime, createtime, refer_time, c_refer_time, cur_rate', 'length', 'max'=>10),
			array('refer_url, c_refer_url, tax_content', 'length', 'max'=>200),
			array('ip', 'length', 'max'=>15),
			array('ship_tel, use_pmt', 'length', 'max'=>30),
			array('ship_email', 'length', 'max'=>150),
			array('is_tax, is_protect, disabled, use_registerinfo, is_has_remote_pdts', 'length', 'max'=>5),
			array('currency', 'length', 'max'=>8),
			array('mark_type', 'length', 'max'=>2),
			array('tostr, memo, mark_text', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('order_id, member_id, api_id, confirm, status, is_keep, pay_status, ship_status, user_status, is_delivery, shipping_id, shipping, shipping_area, payment, weight, tostr, itemnum, acttime, createtime, refer_id, refer_url, refer_time, c_refer_id, c_refer_url, c_refer_time, ip, ship_name, ship_area, ship_addr, ship_zip, ship_tel, ship_email, ship_time, ship_mobile, cost_item, is_tax, cost_tax, tax_company, cost_freight, is_protect, cost_protect, cost_payment, currency, cur_rate, score_u, score_g, score_e, advance, discount, use_pmt, total_amount, final_amount, pmt_amount, payed, markstar, memo, print_status, mark_text, disabled, last_change_time, use_registerinfo, mark_type, extend, is_has_remote_pdts, order_refer, print_id, U8, member_name, event, order_source, tax_type, tax_content', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'order_id' => 'Order',
			'member_id' => 'Member',
			'api_id' => 'Api',
			'confirm' => 'Confirm',
			'status' => 'Status',
			'is_keep' => 'Is Keep',
			'pay_status' => 'Pay Status',
			'ship_status' => 'Ship Status',
			'user_status' => 'User Status',
			'is_delivery' => 'Is Delivery',
			'shipping_id' => 'Shipping',
			'shipping' => 'Shipping',
			'shipping_area' => 'Shipping Area',
			'payment' => 'Payment',
			'weight' => 'Weight',
			'tostr' => 'Tostr',
			'itemnum' => 'Itemnum',
			'acttime' => 'Acttime',
			'createtime' => 'Createtime',
			'refer_id' => 'Refer',
			'refer_url' => 'Refer Url',
			'refer_time' => 'Refer Time',
			'c_refer_id' => 'C Refer',
			'c_refer_url' => 'C Refer Url',
			'c_refer_time' => 'C Refer Time',
			'ip' => 'Ip',
			'ship_name' => 'Ship Name',
			'ship_area' => 'Ship Area',
			'ship_addr' => 'Ship Addr',
			'ship_zip' => 'Ship Zip',
			'ship_tel' => 'Ship Tel',
			'ship_email' => 'Ship Email',
			'ship_time' => 'Ship Time',
			'ship_mobile' => 'Ship Mobile',
			'cost_item' => 'Cost Item',
			'is_tax' => 'Is Tax',
			'cost_tax' => 'Cost Tax',
			'tax_company' => 'Tax Company',
			'cost_freight' => 'Cost Freight',
			'is_protect' => 'Is Protect',
			'cost_protect' => 'Cost Protect',
			'cost_payment' => 'Cost Payment',
			'currency' => 'Currency',
			'cur_rate' => 'Cur Rate',
			'score_u' => 'Score U',
			'score_g' => 'Score G',
			'score_e' => 'Score E',
			'advance' => 'Advance',
			'discount' => 'Discount',
			'use_pmt' => 'Use Pmt',
			'total_amount' => 'Total Amount',
			'final_amount' => 'Final Amount',
			'pmt_amount' => 'Pmt Amount',
			'payed' => 'Payed',
			'markstar' => 'Markstar',
			'memo' => 'Memo',
			'print_status' => 'Print Status',
			'mark_text' => 'Mark Text',
			'disabled' => 'Disabled',
			'last_change_time' => 'Last Change Time',
			'use_registerinfo' => 'Use Registerinfo',
			'mark_type' => 'Mark Type',
			'extend' => 'Extend',
			'is_has_remote_pdts' => 'Is Has Remote Pdts',
			'order_refer' => 'Order Refer',
			'print_id' => 'Print',
			'U8' => 'U8',
			'member_name' => 'Member Name',
			'event' => 'Event',
			'order_source' => 'Order Source',
			'tax_type' => 'Tax Type',
			'tax_content' => 'Tax Content',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('order_id',$this->order_id,true);
		$criteria->compare('member_id',$this->member_id);
		$criteria->compare('api_id',$this->api_id,true);
		$criteria->compare('confirm',$this->confirm,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('is_keep',$this->is_keep);
		$criteria->compare('pay_status',$this->pay_status,true);
		$criteria->compare('ship_status',$this->ship_status,true);
		$criteria->compare('user_status',$this->user_status,true);
		$criteria->compare('is_delivery',$this->is_delivery,true);
		$criteria->compare('shipping_id',$this->shipping_id);
		$criteria->compare('shipping',$this->shipping,true);
		$criteria->compare('shipping_area',$this->shipping_area,true);
		$criteria->compare('payment',$this->payment);
		$criteria->compare('weight',$this->weight,true);
		$criteria->compare('tostr',$this->tostr,true);
		$criteria->compare('itemnum',$this->itemnum);
		$criteria->compare('acttime',$this->acttime,true);
		$criteria->compare('createtime',$this->createtime,true);
		$criteria->compare('refer_id',$this->refer_id,true);
		$criteria->compare('refer_url',$this->refer_url,true);
		$criteria->compare('refer_time',$this->refer_time,true);
		$criteria->compare('c_refer_id',$this->c_refer_id,true);
		$criteria->compare('c_refer_url',$this->c_refer_url,true);
		$criteria->compare('c_refer_time',$this->c_refer_time,true);
		$criteria->compare('ip',$this->ip,true);
		$criteria->compare('ship_name',$this->ship_name,true);
		$criteria->compare('ship_area',$this->ship_area,true);
		$criteria->compare('ship_addr',$this->ship_addr,true);
		$criteria->compare('ship_zip',$this->ship_zip,true);
		$criteria->compare('ship_tel',$this->ship_tel,true);
		$criteria->compare('ship_email',$this->ship_email,true);
		$criteria->compare('ship_time',$this->ship_time,true);
		$criteria->compare('ship_mobile',$this->ship_mobile,true);
		$criteria->compare('cost_item',$this->cost_item,true);
		$criteria->compare('is_tax',$this->is_tax,true);
		$criteria->compare('cost_tax',$this->cost_tax,true);
		$criteria->compare('tax_company',$this->tax_company,true);
		$criteria->compare('cost_freight',$this->cost_freight,true);
		$criteria->compare('is_protect',$this->is_protect,true);
		$criteria->compare('cost_protect',$this->cost_protect,true);
		$criteria->compare('cost_payment',$this->cost_payment,true);
		$criteria->compare('currency',$this->currency,true);
		$criteria->compare('cur_rate',$this->cur_rate,true);
		$criteria->compare('score_u',$this->score_u,true);
		$criteria->compare('score_g',$this->score_g,true);
		$criteria->compare('score_e',$this->score_e,true);
		$criteria->compare('advance',$this->advance,true);
		$criteria->compare('discount',$this->discount,true);
		$criteria->compare('use_pmt',$this->use_pmt,true);
		$criteria->compare('total_amount',$this->total_amount,true);
		$criteria->compare('final_amount',$this->final_amount,true);
		$criteria->compare('pmt_amount',$this->pmt_amount,true);
		$criteria->compare('payed',$this->payed,true);
		$criteria->compare('markstar',$this->markstar,true);
		$criteria->compare('memo',$this->memo,true);
		$criteria->compare('print_status',$this->print_status);
		$criteria->compare('mark_text',$this->mark_text,true);
		$criteria->compare('disabled',$this->disabled,true);
		$criteria->compare('last_change_time',$this->last_change_time);
		$criteria->compare('use_registerinfo',$this->use_registerinfo,true);
		$criteria->compare('mark_type',$this->mark_type,true);
		$criteria->compare('extend',$this->extend,true);
		$criteria->compare('is_has_remote_pdts',$this->is_has_remote_pdts,true);
		$criteria->compare('order_refer',$this->order_refer,true);
		$criteria->compare('print_id',$this->print_id,true);
		$criteria->compare('U8',$this->U8);
		$criteria->compare('member_name',$this->member_name,true);
		$criteria->compare('event',$this->event);
		$criteria->compare('order_source',$this->order_source,true);
		$criteria->compare('tax_type',$this->tax_type);
		$criteria->compare('tax_content',$this->tax_content,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}