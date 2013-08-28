<?php

/**
 * This is the model class for table "Authorize".
 *
 * The followings are the available columns in table 'Authorize':
 * @property string $username
 * @property string $password
 * @property string $last_login
 */
class Authorize extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Authorize the static model class
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
		return 'authorize';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('username, password, role_code', 'required'),
			array('username', 'length', 'max'=>20),
			array('password', 'length', 'max'=>50),
			array('role_code', 'length', 'max'=>2),
			array('last_login', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('username, password, role_code, last_login', 'safe', 'on'=>'search'),
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
            'role'=>array(self::BELONGS_TO, 'Role', 'role_code'),
        );
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'username' => '用戶名稱',
			'password' => '密碼',
			'role_code' => '權限',
			'last_login' => '最後登入時間',
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

		$criteria->compare('username',$this->username,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('role_code',$this->role_code,true);
		$criteria->compare('last_login',$this->last_login,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	/**
	 * Control data access based on the role of current user
	 */
	protected function beforeSave() {
		if (parent::beforeSave()){
			$hashPassword = Yii::app()->db->createCommand()
				->select("PASSWORD('".$this->password."')")
				->from('authorize')
				->limit('1')
				->queryScalar();
			$this->password=$hashPassword;
			return true;
		}else{
			return false;
		}
	}
}