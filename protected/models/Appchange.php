<?php

/**
 * This is the model class for table "{{appchange}}".
 *
 * The followings are the available columns in table '{{appchange}}':
 * @property string $id
 * @property string $name
 * @property string $icon
 * @property string $listimage
 * @property string $desc
 * @property string $urlschemes
 * @property string $ituneslink
 * @property string $android_pack
 * @property string $android_class
 * @property string $android_url
 * @property string $html
 * @property string $version
 * @property string $usenum
 * @property integer $state
 */
class Appchange extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Appchange the static model class
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
		return '{{appchange}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('state', 'numerical', 'integerOnly'=>true),
			array('name, icon, listimage, desc, urlschemes, ituneslink, android_pack, android_class, android_url, version', 'length', 'max'=>255),
			array('usenum', 'length', 'max'=>11),
			array('html', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, icon, listimage, desc, urlschemes, ituneslink, android_pack, android_class, android_url, html, version, usenum, state', 'safe', 'on'=>'search'),
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
			'name' => 'Name',
			'icon' => 'Icon',
			'listimage' => 'Listimage',
			'desc' => 'Desc',
			'urlschemes' => 'Urlschemes',
			'ituneslink' => 'Ituneslink',
			'android_pack' => 'Android Pack',
			'android_class' => 'Android Class',
			'android_url' => 'Android Url',
			'html' => 'Html',
			'version' => 'Version',
			'usenum' => 'Usenum',
			'state' => 'State',
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

		$criteria->compare('id',$this->id,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('icon',$this->icon,true);
		$criteria->compare('listimage',$this->listimage,true);
		$criteria->compare('desc',$this->desc,true);
		$criteria->compare('urlschemes',$this->urlschemes,true);
		$criteria->compare('ituneslink',$this->ituneslink,true);
		$criteria->compare('android_pack',$this->android_pack,true);
		$criteria->compare('android_class',$this->android_class,true);
		$criteria->compare('android_url',$this->android_url,true);
		$criteria->compare('html',$this->html,true);
		$criteria->compare('version',$this->version,true);
		$criteria->compare('usenum',$this->usenum,true);
		$criteria->compare('state',$this->state);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}