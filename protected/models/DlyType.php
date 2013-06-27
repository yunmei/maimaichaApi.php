<?php

/**
 * This is the model class for table "{{dly_type}}".
 *
 * The followings are the available columns in table '{{dly_type}}':
 * @property integer $dt_id
 * @property string $dt_name
 * @property string $dt_config
 * @property string $dt_expressions
 * @property string $detail
 * @property string $price
 * @property string $type
 * @property integer $gateway
 * @property string $protect
 * @property double $protect_rate
 * @property integer $ordernum
 * @property string $has_cod
 * @property double $minprice
 * @property string $disabled
 * @property string $corp_id
 * @property string $dt_status
 */
class DlyType extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return DlyType the static model class
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
		return '{{dly_type}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('price', 'required'),
			array('gateway, ordernum', 'numerical', 'integerOnly'=>true),
			array('protect_rate, minprice', 'numerical'),
			array('dt_name', 'length', 'max'=>50),
			array('type, protect, has_cod, dt_status', 'length', 'max'=>1),
			array('disabled', 'length', 'max'=>5),
			array('corp_id', 'length', 'max'=>10),
			array('dt_config, dt_expressions, detail', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('dt_id, dt_name, dt_config, dt_expressions, detail, price, type, gateway, protect, protect_rate, ordernum, has_cod, minprice, disabled, corp_id, dt_status', 'safe', 'on'=>'search'),
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
			'dt_id' => 'Dt',
			'dt_name' => 'Dt Name',
			'dt_config' => 'Dt Config',
			'dt_expressions' => 'Dt Expressions',
			'detail' => 'Detail',
			'price' => 'Price',
			'type' => 'Type',
			'gateway' => 'Gateway',
			'protect' => 'Protect',
			'protect_rate' => 'Protect Rate',
			'ordernum' => 'Ordernum',
			'has_cod' => 'Has Cod',
			'minprice' => 'Minprice',
			'disabled' => 'Disabled',
			'corp_id' => 'Corp',
			'dt_status' => 'Dt Status',
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

		$criteria->compare('dt_id',$this->dt_id);
		$criteria->compare('dt_name',$this->dt_name,true);
		$criteria->compare('dt_config',$this->dt_config,true);
		$criteria->compare('dt_expressions',$this->dt_expressions,true);
		$criteria->compare('detail',$this->detail,true);
		$criteria->compare('price',$this->price,true);
		$criteria->compare('type',$this->type,true);
		$criteria->compare('gateway',$this->gateway);
		$criteria->compare('protect',$this->protect,true);
		$criteria->compare('protect_rate',$this->protect_rate);
		$criteria->compare('ordernum',$this->ordernum);
		$criteria->compare('has_cod',$this->has_cod,true);
		$criteria->compare('minprice',$this->minprice);
		$criteria->compare('disabled',$this->disabled,true);
		$criteria->compare('corp_id',$this->corp_id,true);
		$criteria->compare('dt_status',$this->dt_status,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}