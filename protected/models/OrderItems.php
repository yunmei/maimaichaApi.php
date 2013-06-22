<?php

/**
 * This is the model class for table "{{order_items}}".
 *
 * The followings are the available columns in table '{{order_items}}':
 * @property integer $item_id
 * @property string $order_id
 * @property integer $product_id
 * @property string $dly_status
 * @property integer $type_id
 * @property string $bn
 * @property string $name
 * @property string $cost
 * @property string $price
 * @property string $amount
 * @property integer $score
 * @property integer $nums
 * @property string $minfo
 * @property integer $sendnum
 * @property string $addon
 * @property string $is_type
 * @property integer $point
 * @property string $supplier_id
 * @property integer $shaidan_point
 * @property string $source
 * @property string $is_discuss
 * @property string $is_shaidan
 */
class OrderItems extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return OrderItems the static model class
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
		return '{{order_items}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('product_id, type_id, score, nums, sendnum, point, shaidan_point', 'numerical', 'integerOnly'=>true),
			array('order_id, cost, price, amount, source', 'length', 'max'=>20),
			array('dly_status', 'length', 'max'=>8),
			array('bn', 'length', 'max'=>40),
			array('name', 'length', 'max'=>200),
			array('is_type, is_discuss, is_shaidan', 'length', 'max'=>5),
			array('supplier_id', 'length', 'max'=>10),
			array('minfo, addon', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('item_id, order_id, product_id, dly_status, type_id, bn, name, cost, price, amount, score, nums, minfo, sendnum, addon, is_type, point, supplier_id, shaidan_point, source, is_discuss, is_shaidan', 'safe', 'on'=>'search'),
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
			'item_id' => 'Item',
			'order_id' => 'Order',
			'product_id' => 'Product',
			'dly_status' => 'Dly Status',
			'type_id' => 'Type',
			'bn' => 'Bn',
			'name' => 'Name',
			'cost' => 'Cost',
			'price' => 'Price',
			'amount' => 'Amount',
			'score' => 'Score',
			'nums' => 'Nums',
			'minfo' => 'Minfo',
			'sendnum' => 'Sendnum',
			'addon' => 'Addon',
			'is_type' => 'Is Type',
			'point' => 'Point',
			'supplier_id' => 'Supplier',
			'shaidan_point' => 'Shaidan Point',
			'source' => 'Source',
			'is_discuss' => 'Is Discuss',
			'is_shaidan' => 'Is Shaidan',
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

		$criteria->compare('item_id',$this->item_id);
		$criteria->compare('order_id',$this->order_id,true);
		$criteria->compare('product_id',$this->product_id);
		$criteria->compare('dly_status',$this->dly_status,true);
		$criteria->compare('type_id',$this->type_id);
		$criteria->compare('bn',$this->bn,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('cost',$this->cost,true);
		$criteria->compare('price',$this->price,true);
		$criteria->compare('amount',$this->amount,true);
		$criteria->compare('score',$this->score);
		$criteria->compare('nums',$this->nums);
		$criteria->compare('minfo',$this->minfo,true);
		$criteria->compare('sendnum',$this->sendnum);
		$criteria->compare('addon',$this->addon,true);
		$criteria->compare('is_type',$this->is_type,true);
		$criteria->compare('point',$this->point);
		$criteria->compare('supplier_id',$this->supplier_id,true);
		$criteria->compare('shaidan_point',$this->shaidan_point);
		$criteria->compare('source',$this->source,true);
		$criteria->compare('is_discuss',$this->is_discuss,true);
		$criteria->compare('is_shaidan',$this->is_shaidan,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}