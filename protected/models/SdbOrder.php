<?php

/**
 * This is the model class for table "{{order_pmt}}".
 *
 * The followings are the available columns in table '{{order_pmt}}':
 * @property string $pmt_id
 * @property string $order_id
 * @property string $pmt_amount
 * @property string $pmt_memo
 * @property string $pmt_describe
 */
class SdbOrder extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return SdbOrder the static model class
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
		return '{{order_pmt}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('pmt_id, order_id, pmt_amount', 'length', 'max'=>20),
			array('pmt_memo, pmt_describe', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('pmt_id, order_id, pmt_amount, pmt_memo, pmt_describe', 'safe', 'on'=>'search'),
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
			'pmt_id' => 'Pmt',
			'order_id' => 'Order',
			'pmt_amount' => 'Pmt Amount',
			'pmt_memo' => 'Pmt Memo',
			'pmt_describe' => 'Pmt Describe',
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

		$criteria->compare('pmt_id',$this->pmt_id,true);
		$criteria->compare('order_id',$this->order_id,true);
		$criteria->compare('pmt_amount',$this->pmt_amount,true);
		$criteria->compare('pmt_memo',$this->pmt_memo,true);
		$criteria->compare('pmt_describe',$this->pmt_describe,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}