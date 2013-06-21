<?php

/**
 * This is the model class for table "{{goods_cat}}".
 *
 * The followings are the available columns in table '{{goods_cat}}':
 * @property integer $cat_id
 * @property integer $parent_id
 * @property string $supplier_id
 * @property integer $supplier_cat_id
 * @property string $cat_path
 * @property string $is_leaf
 * @property integer $type_id
 * @property string $cat_name
 * @property string $disabled
 * @property integer $p_order
 * @property integer $goods_count
 * @property string $tabs
 * @property string $finder
 * @property string $addon
 * @property integer $child_count
 * @property string $cat_enname
 * @property string $tuijian
 */
class GoodsCat extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return GoodsCat the static model class
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
		return '{{goods_cat}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('parent_id, supplier_cat_id, type_id, p_order, goods_count, child_count', 'numerical', 'integerOnly'=>true),
			array('supplier_id', 'length', 'max'=>10),
			array('cat_path, cat_name, cat_enname, tuijian', 'length', 'max'=>100),
			array('is_leaf, disabled', 'length', 'max'=>5),
			array('tabs, finder, addon', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('cat_id, parent_id, supplier_id, supplier_cat_id, cat_path, is_leaf, type_id, cat_name, disabled, p_order, goods_count, tabs, finder, addon, child_count, cat_enname, tuijian', 'safe', 'on'=>'search'),
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
			'cat_id' => 'Cat',
			'parent_id' => 'Parent',
			'supplier_id' => 'Supplier',
			'supplier_cat_id' => 'Supplier Cat',
			'cat_path' => 'Cat Path',
			'is_leaf' => 'Is Leaf',
			'type_id' => 'Type',
			'cat_name' => 'Cat Name',
			'disabled' => 'Disabled',
			'p_order' => 'P Order',
			'goods_count' => 'Goods Count',
			'tabs' => 'Tabs',
			'finder' => 'Finder',
			'addon' => 'Addon',
			'child_count' => 'Child Count',
			'cat_enname' => 'Cat Enname',
			'tuijian' => 'Tuijian',
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

		$criteria->compare('cat_id',$this->cat_id);
		$criteria->compare('parent_id',$this->parent_id);
		$criteria->compare('supplier_id',$this->supplier_id,true);
		$criteria->compare('supplier_cat_id',$this->supplier_cat_id);
		$criteria->compare('cat_path',$this->cat_path,true);
		$criteria->compare('is_leaf',$this->is_leaf,true);
		$criteria->compare('type_id',$this->type_id);
		$criteria->compare('cat_name',$this->cat_name,true);
		$criteria->compare('disabled',$this->disabled,true);
		$criteria->compare('p_order',$this->p_order);
		$criteria->compare('goods_count',$this->goods_count);
		$criteria->compare('tabs',$this->tabs,true);
		$criteria->compare('finder',$this->finder,true);
		$criteria->compare('addon',$this->addon,true);
		$criteria->compare('child_count',$this->child_count);
		$criteria->compare('cat_enname',$this->cat_enname,true);
		$criteria->compare('tuijian',$this->tuijian,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}