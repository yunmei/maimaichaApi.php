<?php

/**
 * This is the model class for table "{{payment_cfg}}".
 *
 * The followings are the available columns in table '{{payment_cfg}}':
 * @property integer $id
 * @property string $custom_name
 * @property string $pay_type
 * @property string $config
 * @property string $fee
 * @property string $des
 * @property integer $order_num
 * @property string $disabled
 * @property integer $orderlist
 */
class PayType extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return PayType the static model class
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
		return '{{payment_cfg}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('order_num, orderlist', 'numerical', 'integerOnly'=>true),
			array('custom_name', 'length', 'max'=>100),
			array('pay_type', 'length', 'max'=>30),
			array('fee', 'length', 'max'=>9),
			array('disabled', 'length', 'max'=>5),
			array('config, des', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, custom_name, pay_type, config, fee, des, order_num, disabled, orderlist', 'safe', 'on'=>'search'),
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
			'id' => 'ID',
			'custom_name' => 'Custom Name',
			'pay_type' => 'Pay Type',
			'config' => 'Config',
			'fee' => 'Fee',
			'des' => 'Des',
			'order_num' => 'Order Num',
			'disabled' => 'Disabled',
			'orderlist' => 'Orderlist',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('custom_name',$this->custom_name,true);
		$criteria->compare('pay_type',$this->pay_type,true);
		$criteria->compare('config',$this->config,true);
		$criteria->compare('fee',$this->fee,true);
		$criteria->compare('des',$this->des,true);
		$criteria->compare('order_num',$this->order_num);
		$criteria->compare('disabled',$this->disabled,true);
		$criteria->compare('orderlist',$this->orderlist);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}