<?php

/**
 * This is the model class for table "{{payments}}".
 *
 * The followings are the available columns in table '{{payments}}':
 * @property string $payment_id
 * @property string $order_id
 * @property integer $member_id
 * @property string $account
 * @property string $bank
 * @property string $pay_account
 * @property string $currency
 * @property string $money
 * @property string $paycost
 * @property string $cur_money
 * @property string $pay_type
 * @property integer $payment
 * @property string $paymethod
 * @property integer $op_id
 * @property string $ip
 * @property string $t_begin
 * @property string $t_end
 * @property string $status
 * @property string $memo
 * @property string $disabled
 * @property string $trade_no
 */
class Payments extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Payments the static model class
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
		return '{{payments}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('member_id, payment, op_id', 'numerical', 'integerOnly'=>true),
			array('payment_id, order_id, money, paycost, cur_money, ip', 'length', 'max'=>20),
			array('account, bank, pay_account', 'length', 'max'=>50),
			array('currency, t_begin, t_end', 'length', 'max'=>10),
			array('pay_type, status', 'length', 'max'=>8),
			array('paymethod', 'length', 'max'=>100),
			array('disabled', 'length', 'max'=>5),
			array('trade_no', 'length', 'max'=>30),
			array('memo', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('payment_id, order_id, member_id, account, bank, pay_account, currency, money, paycost, cur_money, pay_type, payment, paymethod, op_id, ip, t_begin, t_end, status, memo, disabled, trade_no', 'safe', 'on'=>'search'),
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
			'payment_id' => 'Payment',
			'order_id' => 'Order',
			'member_id' => 'Member',
			'account' => 'Account',
			'bank' => 'Bank',
			'pay_account' => 'Pay Account',
			'currency' => 'Currency',
			'money' => 'Money',
			'paycost' => 'Paycost',
			'cur_money' => 'Cur Money',
			'pay_type' => 'Pay Type',
			'payment' => 'Payment',
			'paymethod' => 'Paymethod',
			'op_id' => 'Op',
			'ip' => 'Ip',
			't_begin' => 'T Begin',
			't_end' => 'T End',
			'status' => 'Status',
			'memo' => 'Memo',
			'disabled' => 'Disabled',
			'trade_no' => 'Trade No',
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

		$criteria->compare('payment_id',$this->payment_id,true);
		$criteria->compare('order_id',$this->order_id,true);
		$criteria->compare('member_id',$this->member_id);
		$criteria->compare('account',$this->account,true);
		$criteria->compare('bank',$this->bank,true);
		$criteria->compare('pay_account',$this->pay_account,true);
		$criteria->compare('currency',$this->currency,true);
		$criteria->compare('money',$this->money,true);
		$criteria->compare('paycost',$this->paycost,true);
		$criteria->compare('cur_money',$this->cur_money,true);
		$criteria->compare('pay_type',$this->pay_type,true);
		$criteria->compare('payment',$this->payment);
		$criteria->compare('paymethod',$this->paymethod,true);
		$criteria->compare('op_id',$this->op_id);
		$criteria->compare('ip',$this->ip,true);
		$criteria->compare('t_begin',$this->t_begin,true);
		$criteria->compare('t_end',$this->t_end,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('memo',$this->memo,true);
		$criteria->compare('disabled',$this->disabled,true);
		$criteria->compare('trade_no',$this->trade_no,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}