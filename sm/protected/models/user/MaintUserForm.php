<?php
class MaintUserForm extends CFormModel {
	public $username;
	public $password;
	public $role_code;
	
	public function rules() {
		return array(
			array('username, role_code', 'required'),
			array('password', 'required', 'on'=>'add'),
			array('password', 'safe', 'on'=>'update'),
		);
	}
	
	public function find($username) {
		$model = Authorize::model()->findByPk($username);
		$this->username = $model->username;
		$this->role_code = $model->role_code;
	}
	
	public function create() {
		if (!$this->validate()) {
			return false;
		}
		
		$model = new Authorize();
		$model->username = $this->username;
		$model->password = new CDbExpression('password(\''.$this->password.'\')');
		$model->role_code = $this->role_code;
		
		return $model->save();
	}
	
	public function update() {
		if (!$this->validate()) {
			var_dump($this->getErrors());
			return false;
		}
		
		$model = Authorize::model()->findByPk($this->username);
		$model->role_code = $this->role_code;
		
		if (trim($this->password) != '') {
			$model->password = new CDbExpression('password(\''.$this->password.'\')');
			return $model->save(true, array('password', 'role_code'));
		}
		else {
			return $model->save(true, array('role_code'));
		}
	}
	
	public function delete() {
		$model = Authorize::model()->findByPk($this->username);
		return $model->delete();
	}
}