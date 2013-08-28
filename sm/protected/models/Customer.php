<?php

/**
 * This is the model class for table "customer".
 *
 * The followings are the available columns in table 'customer':
 * @property integer $cid
 * @property string $cd
 * @property string $name
 * @property integer $contact_no
 * @property string $authorize_username
 * @property string $address
 * @property string $email
 */
class Customer extends CActiveRecord
{
	private $_keyword=null; 
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Customer the static model class
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
		return 'customer';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('cd, name, contact_no, authorize_username, address, email', 'required'),
			array('contact_no', 'numerical', 'integerOnly'=>true),
			array('cd, authorize_username', 'length', 'max'=>20),
			array('name, address, email', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('cd, name, contact_no, address, email, authorize_username', 'safe', 'on'=>'search'),
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
			//'appointment' => array(self::HAS_MANY, 'Appointment', 'cd'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'cid' => 'Cid',
			'cd' => '編號',
			'name' => '客戶',
			'contact_no' => '聯絡電話',
			'authorize_username' => '帳號',
			'address' => '地址',
			'email' => 'Email',
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
		$fulltextKeyword=trim($this->getKeyword());
		// Fulltext Search
		if(strlen($fulltextKeyword)>0){
			//echo Yii::trace(CVarDumper::dumpAsString($this->getKeyword()),'vardump');
			$criteria->addSearchCondition('cd', $fulltextKeyword,true,'OR');
			$criteria->addSearchCondition('name', $fulltextKeyword,true,'OR');
			$criteria->addSearchCondition('contact_no', $fulltextKeyword,true,'OR');
			$criteria->addSearchCondition('address', $fulltextKeyword,true,'OR');
			$criteria->addSearchCondition('email', $fulltextKeyword,true,'OR');
			if (!GlobalFunction::isAdmin()){
				$criteria->compare('authorize_username',Yii::app()->user->name,false);
			}else{
				$criteria->addSearchCondition('authorize_username', $fulltextKeyword,true,'OR');
			}
		}else{
			//$criteria->compare('cid',$this->cid);
			$criteria->compare('cd',$this->cd,true);
			$criteria->compare('name',$this->name,true);
			$criteria->compare('contact_no',$this->contact_no,true);
			$criteria->compare('address',$this->address,true);
			$criteria->compare('email',$this->email,true);
			if (!GlobalFunction::isAdmin()){
				$criteria->compare('authorize_username',Yii::app()->user->name,false);
			}else{
				$criteria->compare('authorize_username',$this->authorize_username,true);
			}
		}
		
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