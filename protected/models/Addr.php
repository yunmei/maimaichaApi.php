<?php

/**
 * This is the model class for table "{{member_addrs}}".
 *
 * The followings are the available columns in table '{{member_addrs}}':
 * @property integer $addr_id
 * @property integer $member_id
 * @property string $name
 * @property string $area
 * @property string $country
 * @property string $province
 * @property string $city
 * @property string $addr
 * @property string $zip
 * @property string $tel
 * @property string $mobile
 * @property integer $def_addr
 * @property string $addr_email
 */
class Addr extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Addr the static model class
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
		return '{{member_addrs}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('member_id, def_addr', 'numerical', 'integerOnly'=>true),
			array('name, city', 'length', 'max'=>50),
			array('area, addr', 'length', 'max'=>255),
			array('country, province, tel, mobile', 'length', 'max'=>30),
			array('zip', 'length', 'max'=>20),
			array('addr_email', 'length', 'max'=>200),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('addr_id, member_id, name, area, country, province, city, addr, zip, tel, mobile, def_addr, addr_email', 'safe', 'on'=>'search'),
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
			'addr_id' => 'Addr',
			'member_id' => 'Member',
			'name' => 'Name',
			'area' => 'Area',
			'country' => 'Country',
			'province' => 'Province',
			'city' => 'City',
			'addr' => 'Addr',
			'zip' => 'Zip',
			'tel' => 'Tel',
			'mobile' => 'Mobile',
			'def_addr' => 'Def Addr',
			'addr_email' => 'Addr Email',
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

		$criteria->compare('addr_id',$this->addr_id);
		$criteria->compare('member_id',$this->member_id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('area',$this->area,true);
		$criteria->compare('country',$this->country,true);
		$criteria->compare('province',$this->province,true);
		$criteria->compare('city',$this->city,true);
		$criteria->compare('addr',$this->addr,true);
		$criteria->compare('zip',$this->zip,true);
		$criteria->compare('tel',$this->tel,true);
		$criteria->compare('mobile',$this->mobile,true);
		$criteria->compare('def_addr',$this->def_addr);
		$criteria->compare('addr_email',$this->addr_email,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}