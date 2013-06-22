<?php

/**
 * This is the model class for table "{{members}}".
 *
 * The followings are the available columns in table '{{members}}':
 * @property integer $member_id
 * @property integer $member_lv_id
 * @property string $uname
 * @property string $name
 * @property string $lastname
 * @property string $firstname
 * @property string $password
 * @property string $area
 * @property string $mobile
 * @property string $tel
 * @property string $email
 * @property string $zip
 * @property string $addr
 * @property string $province
 * @property string $city
 * @property integer $order_num
 * @property string $refer_id
 * @property string $refer_url
 * @property string $refer_time
 * @property string $c_refer_id
 * @property string $c_refer_url
 * @property string $c_refer_time
 * @property integer $b_year
 * @property integer $b_month
 * @property integer $b_day
 * @property string $sex
 * @property string $addon
 * @property string $wedlock
 * @property string $education
 * @property string $vocation
 * @property string $interest
 * @property string $advance
 * @property string $advance_freeze
 * @property integer $point_freeze
 * @property integer $point_history
 * @property integer $point
 * @property string $score_rate
 * @property string $reg_ip
 * @property string $regtime
 * @property integer $state
 * @property integer $pay_time
 * @property string $biz_money
 * @property string $pw_answer
 * @property string $pw_question
 * @property string $fav_tags
 * @property string $custom
 * @property string $cur
 * @property string $lang
 * @property integer $unreadmsg
 * @property string $disabled
 * @property string $remark
 * @property string $remark_type
 * @property integer $login_count
 * @property integer $experience
 * @property string $foreign_id
 * @property string $member_refer
 * @property integer $mail_stack
 * @property string $last_time
 * @property string $passedit
 */
class User extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return User the static model class
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
		return '{{members}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('uname, email', 'required'),
			array('member_lv_id, order_num, b_year, b_month, b_day, point_freeze, point_history, point, state, pay_time, unreadmsg, login_count, experience, mail_stack', 'numerical', 'integerOnly'=>true),
			array('uname, name, lastname, firstname, refer_id, c_refer_id, vocation, member_refer, passedit', 'length', 'max'=>50),
			array('password', 'length', 'max'=>32),
			array('area, addr, foreign_id', 'length', 'max'=>255),
			array('mobile, tel, education', 'length', 'max'=>30),
			array('email, refer_url, c_refer_url', 'length', 'max'=>200),
			array('zip, province, city, advance, advance_freeze, biz_money, cur, lang', 'length', 'max'=>20),
			array('refer_time, c_refer_time, regtime, last_time', 'length', 'max'=>10),
			array('sex, wedlock', 'length', 'max'=>1),
			array('score_rate, disabled', 'length', 'max'=>5),
			array('reg_ip', 'length', 'max'=>16),
			array('pw_answer, pw_question', 'length', 'max'=>250),
			array('remark_type', 'length', 'max'=>2),
			array('addon, interest, fav_tags, custom, remark', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('member_id, member_lv_id, uname, name, lastname, firstname, password, area, mobile, tel, email, zip, addr, province, city, order_num, refer_id, refer_url, refer_time, c_refer_id, c_refer_url, c_refer_time, b_year, b_month, b_day, sex, addon, wedlock, education, vocation, interest, advance, advance_freeze, point_freeze, point_history, point, score_rate, reg_ip, regtime, state, pay_time, biz_money, pw_answer, pw_question, fav_tags, custom, cur, lang, unreadmsg, disabled, remark, remark_type, login_count, experience, foreign_id, member_refer, mail_stack, last_time, passedit', 'safe', 'on'=>'search'),
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
			'member_id' => 'Member',
			'member_lv_id' => 'Member Lv',
			'uname' => 'Uname',
			'name' => 'Name',
			'lastname' => 'Lastname',
			'firstname' => 'Firstname',
			'password' => 'Password',
			'area' => 'Area',
			'mobile' => 'Mobile',
			'tel' => 'Tel',
			'email' => 'Email',
			'zip' => 'Zip',
			'addr' => 'Addr',
			'province' => 'Province',
			'city' => 'City',
			'order_num' => 'Order Num',
			'refer_id' => 'Refer',
			'refer_url' => 'Refer Url',
			'refer_time' => 'Refer Time',
			'c_refer_id' => 'C Refer',
			'c_refer_url' => 'C Refer Url',
			'c_refer_time' => 'C Refer Time',
			'b_year' => 'B Year',
			'b_month' => 'B Month',
			'b_day' => 'B Day',
			'sex' => 'Sex',
			'addon' => 'Addon',
			'wedlock' => 'Wedlock',
			'education' => 'Education',
			'vocation' => 'Vocation',
			'interest' => 'Interest',
			'advance' => 'Advance',
			'advance_freeze' => 'Advance Freeze',
			'point_freeze' => 'Point Freeze',
			'point_history' => 'Point History',
			'point' => 'Point',
			'score_rate' => 'Score Rate',
			'reg_ip' => 'Reg Ip',
			'regtime' => 'Regtime',
			'state' => 'State',
			'pay_time' => 'Pay Time',
			'biz_money' => 'Biz Money',
			'pw_answer' => 'Pw Answer',
			'pw_question' => 'Pw Question',
			'fav_tags' => 'Fav Tags',
			'custom' => 'Custom',
			'cur' => 'Cur',
			'lang' => 'Lang',
			'unreadmsg' => 'Unreadmsg',
			'disabled' => 'Disabled',
			'remark' => 'Remark',
			'remark_type' => 'Remark Type',
			'login_count' => 'Login Count',
			'experience' => 'Experience',
			'foreign_id' => 'Foreign',
			'member_refer' => 'Member Refer',
			'mail_stack' => 'Mail Stack',
			'last_time' => 'Last Time',
			'passedit' => 'Passedit',
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

		$criteria->compare('member_id',$this->member_id);
		$criteria->compare('member_lv_id',$this->member_lv_id);
		$criteria->compare('uname',$this->uname,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('lastname',$this->lastname,true);
		$criteria->compare('firstname',$this->firstname,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('area',$this->area,true);
		$criteria->compare('mobile',$this->mobile,true);
		$criteria->compare('tel',$this->tel,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('zip',$this->zip,true);
		$criteria->compare('addr',$this->addr,true);
		$criteria->compare('province',$this->province,true);
		$criteria->compare('city',$this->city,true);
		$criteria->compare('order_num',$this->order_num);
		$criteria->compare('refer_id',$this->refer_id,true);
		$criteria->compare('refer_url',$this->refer_url,true);
		$criteria->compare('refer_time',$this->refer_time,true);
		$criteria->compare('c_refer_id',$this->c_refer_id,true);
		$criteria->compare('c_refer_url',$this->c_refer_url,true);
		$criteria->compare('c_refer_time',$this->c_refer_time,true);
		$criteria->compare('b_year',$this->b_year);
		$criteria->compare('b_month',$this->b_month);
		$criteria->compare('b_day',$this->b_day);
		$criteria->compare('sex',$this->sex,true);
		$criteria->compare('addon',$this->addon,true);
		$criteria->compare('wedlock',$this->wedlock,true);
		$criteria->compare('education',$this->education,true);
		$criteria->compare('vocation',$this->vocation,true);
		$criteria->compare('interest',$this->interest,true);
		$criteria->compare('advance',$this->advance,true);
		$criteria->compare('advance_freeze',$this->advance_freeze,true);
		$criteria->compare('point_freeze',$this->point_freeze);
		$criteria->compare('point_history',$this->point_history);
		$criteria->compare('point',$this->point);
		$criteria->compare('score_rate',$this->score_rate,true);
		$criteria->compare('reg_ip',$this->reg_ip,true);
		$criteria->compare('regtime',$this->regtime,true);
		$criteria->compare('state',$this->state);
		$criteria->compare('pay_time',$this->pay_time);
		$criteria->compare('biz_money',$this->biz_money,true);
		$criteria->compare('pw_answer',$this->pw_answer,true);
		$criteria->compare('pw_question',$this->pw_question,true);
		$criteria->compare('fav_tags',$this->fav_tags,true);
		$criteria->compare('custom',$this->custom,true);
		$criteria->compare('cur',$this->cur,true);
		$criteria->compare('lang',$this->lang,true);
		$criteria->compare('unreadmsg',$this->unreadmsg);
		$criteria->compare('disabled',$this->disabled,true);
		$criteria->compare('remark',$this->remark,true);
		$criteria->compare('remark_type',$this->remark_type,true);
		$criteria->compare('login_count',$this->login_count);
		$criteria->compare('experience',$this->experience);
		$criteria->compare('foreign_id',$this->foreign_id,true);
		$criteria->compare('member_refer',$this->member_refer,true);
		$criteria->compare('mail_stack',$this->mail_stack);
		$criteria->compare('last_time',$this->last_time,true);
		$criteria->compare('passedit',$this->passedit,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}