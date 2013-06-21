<?php

/**
 * This is the model class for table "{{comments}}".
 *
 * The followings are the available columns in table '{{comments}}':
 * @property integer $comment_id
 * @property string $order_id
 * @property string $order_time
 * @property integer $for_comment_id
 * @property integer $goods_id
 * @property string $object_type
 * @property integer $author_id
 * @property string $author
 * @property string $levelname
 * @property string $contact
 * @property string $mem_read_status
 * @property string $adm_read_status
 * @property string $time
 * @property string $lastreply
 * @property string $reply_name
 * @property string $title
 * @property string $comment
 * @property string $ip
 * @property string $display
 * @property string $p_index
 * @property string $disabled
 * @property string $sdimg_1
 * @property string $sdimg_2
 * @property string $sdimg_3
 * @property string $sdimg_4
 * @property string $sdimg_5
 * @property string $sdimg_6
 * @property string $sdimg_7
 * @property string $sdimg_8
 * @property string $sdimg_9
 * @property string $sdimg_10
 * @property integer $memshow
 * @property integer $indexshow
 * @property integer $view_num
 * @property integer $replay_num
 * @property integer $discuss_score
 * @property string $audit
 */
class GoodsComment extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return GoodsComment the static model class
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
		return '{{comments}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('for_comment_id, goods_id, author_id, memshow, indexshow, view_num, replay_num, discuss_score', 'numerical', 'integerOnly'=>true),
			array('order_id', 'length', 'max'=>20),
			array('order_time, time, lastreply', 'length', 'max'=>10),
			array('object_type', 'length', 'max'=>7),
			array('author, reply_name', 'length', 'max'=>100),
			array('levelname', 'length', 'max'=>50),
			array('contact, title, sdimg_1, sdimg_2, sdimg_3, sdimg_4, sdimg_5, sdimg_6, sdimg_7, sdimg_8, sdimg_9, sdimg_10', 'length', 'max'=>255),
			array('mem_read_status, adm_read_status, display, disabled, audit', 'length', 'max'=>5),
			array('ip', 'length', 'max'=>15),
			array('p_index', 'length', 'max'=>1),
			array('comment', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('comment_id, order_id, order_time, for_comment_id, goods_id, object_type, author_id, author, levelname, contact, mem_read_status, adm_read_status, time, lastreply, reply_name, title, comment, ip, display, p_index, disabled, sdimg_1, sdimg_2, sdimg_3, sdimg_4, sdimg_5, sdimg_6, sdimg_7, sdimg_8, sdimg_9, sdimg_10, memshow, indexshow, view_num, replay_num, discuss_score, audit', 'safe', 'on'=>'search'),
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
			'comment_id' => 'Comment',
			'order_id' => 'Order',
			'order_time' => 'Order Time',
			'for_comment_id' => 'For Comment',
			'goods_id' => 'Goods',
			'object_type' => 'Object Type',
			'author_id' => 'Author',
			'author' => 'Author',
			'levelname' => 'Levelname',
			'contact' => 'Contact',
			'mem_read_status' => 'Mem Read Status',
			'adm_read_status' => 'Adm Read Status',
			'time' => 'Time',
			'lastreply' => 'Lastreply',
			'reply_name' => 'Reply Name',
			'title' => 'Title',
			'comment' => 'Comment',
			'ip' => 'Ip',
			'display' => 'Display',
			'p_index' => 'P Index',
			'disabled' => 'Disabled',
			'sdimg_1' => 'Sdimg 1',
			'sdimg_2' => 'Sdimg 2',
			'sdimg_3' => 'Sdimg 3',
			'sdimg_4' => 'Sdimg 4',
			'sdimg_5' => 'Sdimg 5',
			'sdimg_6' => 'Sdimg 6',
			'sdimg_7' => 'Sdimg 7',
			'sdimg_8' => 'Sdimg 8',
			'sdimg_9' => 'Sdimg 9',
			'sdimg_10' => 'Sdimg 10',
			'memshow' => 'Memshow',
			'indexshow' => 'Indexshow',
			'view_num' => 'View Num',
			'replay_num' => 'Replay Num',
			'discuss_score' => 'Discuss Score',
			'audit' => 'Audit',
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

		$criteria->compare('comment_id',$this->comment_id);
		$criteria->compare('order_id',$this->order_id,true);
		$criteria->compare('order_time',$this->order_time,true);
		$criteria->compare('for_comment_id',$this->for_comment_id);
		$criteria->compare('goods_id',$this->goods_id);
		$criteria->compare('object_type',$this->object_type,true);
		$criteria->compare('author_id',$this->author_id);
		$criteria->compare('author',$this->author,true);
		$criteria->compare('levelname',$this->levelname,true);
		$criteria->compare('contact',$this->contact,true);
		$criteria->compare('mem_read_status',$this->mem_read_status,true);
		$criteria->compare('adm_read_status',$this->adm_read_status,true);
		$criteria->compare('time',$this->time,true);
		$criteria->compare('lastreply',$this->lastreply,true);
		$criteria->compare('reply_name',$this->reply_name,true);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('comment',$this->comment,true);
		$criteria->compare('ip',$this->ip,true);
		$criteria->compare('display',$this->display,true);
		$criteria->compare('p_index',$this->p_index,true);
		$criteria->compare('disabled',$this->disabled,true);
		$criteria->compare('sdimg_1',$this->sdimg_1,true);
		$criteria->compare('sdimg_2',$this->sdimg_2,true);
		$criteria->compare('sdimg_3',$this->sdimg_3,true);
		$criteria->compare('sdimg_4',$this->sdimg_4,true);
		$criteria->compare('sdimg_5',$this->sdimg_5,true);
		$criteria->compare('sdimg_6',$this->sdimg_6,true);
		$criteria->compare('sdimg_7',$this->sdimg_7,true);
		$criteria->compare('sdimg_8',$this->sdimg_8,true);
		$criteria->compare('sdimg_9',$this->sdimg_9,true);
		$criteria->compare('sdimg_10',$this->sdimg_10,true);
		$criteria->compare('memshow',$this->memshow);
		$criteria->compare('indexshow',$this->indexshow);
		$criteria->compare('view_num',$this->view_num);
		$criteria->compare('replay_num',$this->replay_num);
		$criteria->compare('discuss_score',$this->discuss_score);
		$criteria->compare('audit',$this->audit,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}