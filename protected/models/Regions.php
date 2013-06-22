<?php

/**
 * This is the model class for table "{{regions}}".
 *
 * The followings are the available columns in table '{{regions}}':
 * @property string $region_id
 * @property string $package
 * @property string $p_region_id
 * @property string $region_path
 * @property integer $region_grade
 * @property string $local_name
 * @property string $en_name
 * @property string $p_1
 * @property string $p_2
 * @property integer $ordernum
 * @property string $disabled
 */
class Regions extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Regions the static model class
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
		return '{{regions}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('region_grade, ordernum', 'numerical', 'integerOnly'=>true),
			array('package', 'length', 'max'=>20),
			array('p_region_id', 'length', 'max'=>10),
			array('region_path', 'length', 'max'=>255),
			array('local_name, en_name, p_1, p_2', 'length', 'max'=>50),
			array('disabled', 'length', 'max'=>5),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('region_id, package, p_region_id, region_path, region_grade, local_name, en_name, p_1, p_2, ordernum, disabled', 'safe', 'on'=>'search'),
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
			'region_id' => 'Region',
			'package' => 'Package',
			'p_region_id' => 'P Region',
			'region_path' => 'Region Path',
			'region_grade' => 'Region Grade',
			'local_name' => 'Local Name',
			'en_name' => 'En Name',
			'p_1' => 'P 1',
			'p_2' => 'P 2',
			'ordernum' => 'Ordernum',
			'disabled' => 'Disabled',
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

		$criteria->compare('region_id',$this->region_id,true);
		$criteria->compare('package',$this->package,true);
		$criteria->compare('p_region_id',$this->p_region_id,true);
		$criteria->compare('region_path',$this->region_path,true);
		$criteria->compare('region_grade',$this->region_grade);
		$criteria->compare('local_name',$this->local_name,true);
		$criteria->compare('en_name',$this->en_name,true);
		$criteria->compare('p_1',$this->p_1,true);
		$criteria->compare('p_2',$this->p_2,true);
		$criteria->compare('ordernum',$this->ordernum);
		$criteria->compare('disabled',$this->disabled,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}