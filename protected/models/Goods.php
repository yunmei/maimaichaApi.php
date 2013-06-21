<?php

/**
 * This is the model class for table "{{goods}}".
 *
 * The followings are the available columns in table '{{goods}}':
 * @property integer $goods_id
 * @property integer $cat_id
 * @property integer $type_id
 * @property string $goods_type
 * @property integer $brand_id
 * @property string $brand
 * @property string $supplier_id
 * @property integer $supplier_goods_id
 * @property string $wss_params
 * @property string $image_default
 * @property string $udfimg
 * @property string $thumbnail_pic
 * @property string $small_pic
 * @property string $big_pic
 * @property string $image_file
 * @property string $brief
 * @property string $intro
 * @property string $mktprice
 * @property string $cost
 * @property string $price
 * @property string $bn
 * @property string $name
 * @property string $marketable
 * @property string $weight
 * @property string $unit
 * @property integer $store
 * @property string $store_place
 * @property string $score_setting
 * @property integer $score
 * @property string $spec
 * @property string $pdt_desc
 * @property string $spec_desc
 * @property string $params
 * @property string $uptime
 * @property string $downtime
 * @property string $last_modify
 * @property string $disabled
 * @property integer $notify_num
 * @property string $rank
 * @property string $rank_count
 * @property string $comments_count
 * @property string $view_w_count
 * @property string $view_count
 * @property string $buy_count
 * @property string $buy_w_count
 * @property string $count_stat
 * @property integer $p_order
 * @property integer $d_order
 * @property string $p_0
 * @property string $p_1
 * @property string $p_2
 * @property string $p_3
 * @property string $p_4
 * @property string $p_5
 * @property string $p_6
 * @property string $p_7
 * @property string $p_8
 * @property string $p_9
 * @property string $p_10
 * @property string $p_11
 * @property string $p_12
 * @property string $p_13
 * @property string $p_14
 * @property string $p_15
 * @property string $p_16
 * @property string $p_17
 * @property string $p_18
 * @property string $p_19
 * @property string $p_20
 * @property string $p_21
 * @property string $p_22
 * @property string $p_23
 * @property string $p_24
 * @property string $p_25
 * @property string $p_26
 * @property string $p_27
 * @property string $p_28
 * @property integer $p_30
 * @property integer $p_34
 * @property integer $p_40
 * @property string $p_45
 * @property string $p_46
 * @property string $p_48
 * @property integer $p_54
 * @property integer $p_65
 * @property integer $p_66
 * @property integer $p_67
 * @property integer $p_80
 * @property integer $p_90
 * @property string $goods_info_update_status
 * @property string $stock_update_status
 * @property string $marketable_update_status
 * @property string $img_update_status
 * @property string $exploded_ico
 * @property integer $isyhq
 * @property string $comments_score
 */
class Goods extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Goods the static model class
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
		return '{{goods}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('cat_id, type_id, brand_id, supplier_goods_id, store, score, notify_num, p_order, d_order, p_30, p_34, p_40, p_54, p_65, p_66, p_67, p_80, p_90, isyhq', 'numerical', 'integerOnly'=>true),
			array('goods_type', 'length', 'max'=>6),
			array('brand', 'length', 'max'=>100),
			array('supplier_id, uptime, downtime, last_modify, rank_count, comments_count, view_w_count, view_count, buy_count, buy_w_count', 'length', 'max'=>10),
			array('udfimg, marketable, disabled, rank, goods_info_update_status, stock_update_status, marketable_update_status, img_update_status, comments_score', 'length', 'max'=>5),
			array('thumbnail_pic, small_pic, big_pic, brief, store_place, p_0, p_1, p_2, p_3, p_4, p_5, p_6, p_7, p_8, p_9, p_10, p_11, p_12, p_13, p_14, p_15, p_16, p_17, p_18, p_19, p_20, p_21, p_22, p_23, p_24, p_25, p_26, p_27, p_28, p_45, p_46, p_48', 'length', 'max'=>255),
			array('mktprice, cost, price, weight, unit', 'length', 'max'=>20),
			array('bn, name', 'length', 'max'=>200),
			array('score_setting', 'length', 'max'=>7),
			array('exploded_ico', 'length', 'max'=>2),
			array('wss_params, image_default, image_file, intro, spec, pdt_desc, spec_desc, params, count_stat', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('goods_id, cat_id, type_id, goods_type, brand_id, brand, supplier_id, supplier_goods_id, wss_params, image_default, udfimg, thumbnail_pic, small_pic, big_pic, image_file, brief, intro, mktprice, cost, price, bn, name, marketable, weight, unit, store, store_place, score_setting, score, spec, pdt_desc, spec_desc, params, uptime, downtime, last_modify, disabled, notify_num, rank, rank_count, comments_count, view_w_count, view_count, buy_count, buy_w_count, count_stat, p_order, d_order, p_0, p_1, p_2, p_3, p_4, p_5, p_6, p_7, p_8, p_9, p_10, p_11, p_12, p_13, p_14, p_15, p_16, p_17, p_18, p_19, p_20, p_21, p_22, p_23, p_24, p_25, p_26, p_27, p_28, p_30, p_34, p_40, p_45, p_46, p_48, p_54, p_65, p_66, p_67, p_80, p_90, goods_info_update_status, stock_update_status, marketable_update_status, img_update_status, exploded_ico, isyhq, comments_score', 'safe', 'on'=>'search'),
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
			'goods_id' => 'Goods',
			'cat_id' => 'Cat',
			'type_id' => 'Type',
			'goods_type' => 'Goods Type',
			'brand_id' => 'Brand',
			'brand' => 'Brand',
			'supplier_id' => 'Supplier',
			'supplier_goods_id' => 'Supplier Goods',
			'wss_params' => 'Wss Params',
			'image_default' => 'Image Default',
			'udfimg' => 'Udfimg',
			'thumbnail_pic' => 'Thumbnail Pic',
			'small_pic' => 'Small Pic',
			'big_pic' => 'Big Pic',
			'image_file' => 'Image File',
			'brief' => 'Brief',
			'intro' => 'Intro',
			'mktprice' => 'Mktprice',
			'cost' => 'Cost',
			'price' => 'Price',
			'bn' => 'Bn',
			'name' => 'Name',
			'marketable' => 'Marketable',
			'weight' => 'Weight',
			'unit' => 'Unit',
			'store' => 'Store',
			'store_place' => 'Store Place',
			'score_setting' => 'Score Setting',
			'score' => 'Score',
			'spec' => 'Spec',
			'pdt_desc' => 'Pdt Desc',
			'spec_desc' => 'Spec Desc',
			'params' => 'Params',
			'uptime' => 'Uptime',
			'downtime' => 'Downtime',
			'last_modify' => 'Last Modify',
			'disabled' => 'Disabled',
			'notify_num' => 'Notify Num',
			'rank' => 'Rank',
			'rank_count' => 'Rank Count',
			'comments_count' => 'Comments Count',
			'view_w_count' => 'View W Count',
			'view_count' => 'View Count',
			'buy_count' => 'Buy Count',
			'buy_w_count' => 'Buy W Count',
			'count_stat' => 'Count Stat',
			'p_order' => 'P Order',
			'd_order' => 'D Order',
			'p_0' => 'P 0',
			'p_1' => 'P 1',
			'p_2' => 'P 2',
			'p_3' => 'P 3',
			'p_4' => 'P 4',
			'p_5' => 'P 5',
			'p_6' => 'P 6',
			'p_7' => 'P 7',
			'p_8' => 'P 8',
			'p_9' => 'P 9',
			'p_10' => 'P 10',
			'p_11' => 'P 11',
			'p_12' => 'P 12',
			'p_13' => 'P 13',
			'p_14' => 'P 14',
			'p_15' => 'P 15',
			'p_16' => 'P 16',
			'p_17' => 'P 17',
			'p_18' => 'P 18',
			'p_19' => 'P 19',
			'p_20' => 'P 20',
			'p_21' => 'P 21',
			'p_22' => 'P 22',
			'p_23' => 'P 23',
			'p_24' => 'P 24',
			'p_25' => 'P 25',
			'p_26' => 'P 26',
			'p_27' => 'P 27',
			'p_28' => 'P 28',
			'p_30' => 'P 30',
			'p_34' => 'P 34',
			'p_40' => 'P 40',
			'p_45' => 'P 45',
			'p_46' => 'P 46',
			'p_48' => 'P 48',
			'p_54' => 'P 54',
			'p_65' => 'P 65',
			'p_66' => 'P 66',
			'p_67' => 'P 67',
			'p_80' => 'P 80',
			'p_90' => 'P 90',
			'goods_info_update_status' => 'Goods Info Update Status',
			'stock_update_status' => 'Stock Update Status',
			'marketable_update_status' => 'Marketable Update Status',
			'img_update_status' => 'Img Update Status',
			'exploded_ico' => 'Exploded Ico',
			'isyhq' => 'Isyhq',
			'comments_score' => 'Comments Score',
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

		$criteria->compare('goods_id',$this->goods_id);
		$criteria->compare('cat_id',$this->cat_id);
		$criteria->compare('type_id',$this->type_id);
		$criteria->compare('goods_type',$this->goods_type,true);
		$criteria->compare('brand_id',$this->brand_id);
		$criteria->compare('brand',$this->brand,true);
		$criteria->compare('supplier_id',$this->supplier_id,true);
		$criteria->compare('supplier_goods_id',$this->supplier_goods_id);
		$criteria->compare('wss_params',$this->wss_params,true);
		$criteria->compare('image_default',$this->image_default,true);
		$criteria->compare('udfimg',$this->udfimg,true);
		$criteria->compare('thumbnail_pic',$this->thumbnail_pic,true);
		$criteria->compare('small_pic',$this->small_pic,true);
		$criteria->compare('big_pic',$this->big_pic,true);
		$criteria->compare('image_file',$this->image_file,true);
		$criteria->compare('brief',$this->brief,true);
		$criteria->compare('intro',$this->intro,true);
		$criteria->compare('mktprice',$this->mktprice,true);
		$criteria->compare('cost',$this->cost,true);
		$criteria->compare('price',$this->price,true);
		$criteria->compare('bn',$this->bn,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('marketable',$this->marketable,true);
		$criteria->compare('weight',$this->weight,true);
		$criteria->compare('unit',$this->unit,true);
		$criteria->compare('store',$this->store);
		$criteria->compare('store_place',$this->store_place,true);
		$criteria->compare('score_setting',$this->score_setting,true);
		$criteria->compare('score',$this->score);
		$criteria->compare('spec',$this->spec,true);
		$criteria->compare('pdt_desc',$this->pdt_desc,true);
		$criteria->compare('spec_desc',$this->spec_desc,true);
		$criteria->compare('params',$this->params,true);
		$criteria->compare('uptime',$this->uptime,true);
		$criteria->compare('downtime',$this->downtime,true);
		$criteria->compare('last_modify',$this->last_modify,true);
		$criteria->compare('disabled',$this->disabled,true);
		$criteria->compare('notify_num',$this->notify_num);
		$criteria->compare('rank',$this->rank,true);
		$criteria->compare('rank_count',$this->rank_count,true);
		$criteria->compare('comments_count',$this->comments_count,true);
		$criteria->compare('view_w_count',$this->view_w_count,true);
		$criteria->compare('view_count',$this->view_count,true);
		$criteria->compare('buy_count',$this->buy_count,true);
		$criteria->compare('buy_w_count',$this->buy_w_count,true);
		$criteria->compare('count_stat',$this->count_stat,true);
		$criteria->compare('p_order',$this->p_order);
		$criteria->compare('d_order',$this->d_order);
		$criteria->compare('p_0',$this->p_0,true);
		$criteria->compare('p_1',$this->p_1,true);
		$criteria->compare('p_2',$this->p_2,true);
		$criteria->compare('p_3',$this->p_3,true);
		$criteria->compare('p_4',$this->p_4,true);
		$criteria->compare('p_5',$this->p_5,true);
		$criteria->compare('p_6',$this->p_6,true);
		$criteria->compare('p_7',$this->p_7,true);
		$criteria->compare('p_8',$this->p_8,true);
		$criteria->compare('p_9',$this->p_9,true);
		$criteria->compare('p_10',$this->p_10,true);
		$criteria->compare('p_11',$this->p_11,true);
		$criteria->compare('p_12',$this->p_12,true);
		$criteria->compare('p_13',$this->p_13,true);
		$criteria->compare('p_14',$this->p_14,true);
		$criteria->compare('p_15',$this->p_15,true);
		$criteria->compare('p_16',$this->p_16,true);
		$criteria->compare('p_17',$this->p_17,true);
		$criteria->compare('p_18',$this->p_18,true);
		$criteria->compare('p_19',$this->p_19,true);
		$criteria->compare('p_20',$this->p_20,true);
		$criteria->compare('p_21',$this->p_21,true);
		$criteria->compare('p_22',$this->p_22,true);
		$criteria->compare('p_23',$this->p_23,true);
		$criteria->compare('p_24',$this->p_24,true);
		$criteria->compare('p_25',$this->p_25,true);
		$criteria->compare('p_26',$this->p_26,true);
		$criteria->compare('p_27',$this->p_27,true);
		$criteria->compare('p_28',$this->p_28,true);
		$criteria->compare('p_30',$this->p_30);
		$criteria->compare('p_34',$this->p_34);
		$criteria->compare('p_40',$this->p_40);
		$criteria->compare('p_45',$this->p_45,true);
		$criteria->compare('p_46',$this->p_46,true);
		$criteria->compare('p_48',$this->p_48,true);
		$criteria->compare('p_54',$this->p_54);
		$criteria->compare('p_65',$this->p_65);
		$criteria->compare('p_66',$this->p_66);
		$criteria->compare('p_67',$this->p_67);
		$criteria->compare('p_80',$this->p_80);
		$criteria->compare('p_90',$this->p_90);
		$criteria->compare('goods_info_update_status',$this->goods_info_update_status,true);
		$criteria->compare('stock_update_status',$this->stock_update_status,true);
		$criteria->compare('marketable_update_status',$this->marketable_update_status,true);
		$criteria->compare('img_update_status',$this->img_update_status,true);
		$criteria->compare('exploded_ico',$this->exploded_ico,true);
		$criteria->compare('isyhq',$this->isyhq);
		$criteria->compare('comments_score',$this->comments_score,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}