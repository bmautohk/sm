<?php

/**
 * This is the model class for table "appointment".
 *
 * The followings are the available columns in table 'appointment':
 * @property integer $id
 * @property string $customer_cd
 * @property string $authorize_username
 * @property string $appointment_date
 * @property string $subject
 * @property string $content
 * @property string $creation_date
 * @property string $modify_date
 * @property string $remark
 */
class Appointment extends CActiveRecord
{
	private $_keyword=null; 
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Appointment the static model class
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
		return 'appointment';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('customer_cd, authorize_username, appointment_date, subject, content, remark', 'required'),
			array('customer_cd, authorize_username', 'length', 'max'=>20),
			array('subject', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('customer_cd, appointment_date, subject, content, remark, authorize_username', 'safe', 'on'=>'search'),
			// Set the created and modified dates automatically on insert
			array('creation_date, modify_date', 'default',
			'value'=>new CDbExpression('NOW()'),
			'setOnEmpty'=>false, 'on'=>'insert'),
			// Update the modified date on update
			array('modify_date', 'default',
			'value'=>new CDbExpression('NOW()'),
			'setOnEmpty'=>false, 'on'=>'update'),
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
			'customer' => array(self::BELONGS_TO, 'Customer', 'customer_cd'),
		);

	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'customer_cd' => '編號',
			'authorize_username' => '帳號',
			'appointment_date' => '約會日期',
			'subject' => '主題',
			'content' => '內容',
			'creation_date' => '建立日期',
			'modify_date' => '修改日期',
			'remark' => '備註',
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
		//$criteria->alias = 'a';
		$fulltextKeyword=trim($this->getKeyword());
		// Fulltext Search
		if(strlen($fulltextKeyword)>0){
			//echo Yii::trace(CVarDumper::dumpAsString($this->getKeyword()),'vardump');
			$criteria->addSearchCondition('customer_cd', $fulltextKeyword,true,'OR');
			//$criteria->addSearchCondition('appointment_date', $fulltextKeyword,true,'OR');
			$criteria->addSearchCondition('subject', $fulltextKeyword,true,'OR');
			$criteria->addSearchCondition('content', $fulltextKeyword,true,'OR');
			$criteria->addSearchCondition('remark', $fulltextKeyword,true,'OR');
			if (!GlobalFunction::isAdmin()){
				$criteria->compare('authorize_username',Yii::app()->user->name,false);
			}else{
				$criteria->addSearchCondition('authorize_username', $fulltextKeyword,true,'OR');
			}
		}else{
			//$criteria->compare('id',$this->id);
			$criteria->compare('customer_cd',$this->customer_cd,true);
			$criteria->compare('appointment_date',$this->appointment_date,true);
			$criteria->compare('subject',$this->subject,true);
			$criteria->compare('content',$this->content,true);
			//$criteria->compare('creation_date',$this->creation_date,true);
			//$criteria->compare('modify_date',$this->modify_date,true);
			$criteria->compare('remark',$this->remark,true);
			if (!GlobalFunction::isAdmin()){
				$criteria->compare('authorize_username',Yii::app()->user->name,false);
			}else{
				$criteria->compare('authorize_username',$this->authorize_username,true);
			}
		}
		
		//$criteria->with[]='user';
		//$criteria->addSearchCondition("user.secondname",$this->user_id);
		//$criteria->join= 'JOIN customer c ON (a.customer_cd=c.cd)';
		
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	/**
	 * Control data access based on the role of current user
	 */
	protected function beforeFind() {
		if (!GlobalFunction::isAdmin()) {
			$criteria = new CDbCriteria;
			$criteria->condition = "authorize_username='".Yii::app()->user->name."'";
			$this->dbCriteria->mergeWith($criteria);
		}
		parent::beforeFind();
	}
	
	public function setKeyword($str)
	{
		$this->_keyword=$str;
	}
	
	public function getKeyword()
	{
		return $this->_keyword;
	}
}