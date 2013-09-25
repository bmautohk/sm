<?php

class AppointmentController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('@'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('catalog'),
				'users'=>array('@'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Appointment;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Appointment']))
		{
			// Assign the created customer to the current login in user
			$_POST['Appointment']['authorize_username']=Yii::app()->user->name;
			$model->attributes=$_POST['Appointment'];
			
			//20139006
			$date = new DateTime();
			$dateString = $date->format('YmdHis');
			
			$model->img1 = CUploadedFile::getInstance($model, 'img1');
			$fileName = "{$dateString}-{$model->img1}";
			//echo Yii::trace(CVarDumper::dumpAsString($model->img1),'vardump2');
			if ($model->img1!=null and !$model->img1->getHasError()) {
				$model->img1->saveAs(Yii::app()->basePath.GlobalConstants::APP_RELATIVE_URL.BuildUrl::imageUrl(GlobalConstants::DIR_APPOINTMENT_IMG.'/'.$fileName));
				chmod(Yii::app()->basePath.GlobalConstants::APP_RELATIVE_URL.BuildUrl::imageUrl(GlobalConstants::DIR_APPOINTMENT_IMG.'/'.$fileName), 0777 );
				$model->img1=$fileName;
			}
			
			$model->img2 = CUploadedFile::getInstance($model, 'img2');
			$fileName = "{$dateString}-{$model->img2}";
			if ($model->img2!=null and !$model->img2->getHasError()) {
				$model->img2->saveAs(Yii::app()->basePath.GlobalConstants::APP_RELATIVE_URL.BuildUrl::imageUrl(GlobalConstants::DIR_APPOINTMENT_IMG.'/'.$fileName));
				chmod(Yii::app()->basePath.GlobalConstants::APP_RELATIVE_URL.BuildUrl::imageUrl(GlobalConstants::DIR_APPOINTMENT_IMG.'/'.$fileName), 0777 );
				$model->img2=$fileName;
			}
			
			$model->img3 = CUploadedFile::getInstance($model, 'img3');
			$fileName = "{$dateString}-{$model->img3}";
			if ($model->img3!=null and !$model->img3->getHasError()) {
				$model->img3->saveAs(Yii::app()->basePath.GlobalConstants::APP_RELATIVE_URL.BuildUrl::imageUrl(GlobalConstants::DIR_APPOINTMENT_IMG.'/'.$fileName));
				chmod(Yii::app()->basePath.GlobalConstants::APP_RELATIVE_URL.BuildUrl::imageUrl(GlobalConstants::DIR_APPOINTMENT_IMG.'/'.$fileName), 0777 );
				$model->img3=$fileName;
			}
			
			$model->img4 = CUploadedFile::getInstance($model, 'img4');
			$fileName = "{$dateString}-{$model->img4}";
			if ($model->img4!=null and !$model->img4->getHasError()) {
				$model->img4->saveAs(Yii::app()->basePath.GlobalConstants::APP_RELATIVE_URL.BuildUrl::imageUrl(GlobalConstants::DIR_APPOINTMENT_IMG.'/'.$fileName));
				chmod(Yii::app()->basePath.GlobalConstants::APP_RELATIVE_URL.BuildUrl::imageUrl(GlobalConstants::DIR_APPOINTMENT_IMG.'/'.$fileName), 0777 );
				$model->img4=$fileName;
			}
			
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}
				
		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);
		
		//20139006
		$oldfilename1=$model->img1;	// let's store original filename (if it was defined)
		$oldfilename2=$model->img2;	// let's store original filename (if it was defined)
		$oldfilename3=$model->img3;	// let's store original filename (if it was defined)
		$oldfilename4=$model->img4;	// let's store original filename (if it was defined)
		
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Appointment']))
		{
			$model->attributes=$_POST['Appointment'];
			
			//20139006
			$date = new DateTime();
			$dateString = $date->format('YmdHis');
			
			$model->img1 = CUploadedFile::getInstance($model, 'img1');
			//echo Yii::trace(CVarDumper::dumpAsString($model->img1),'vardump');
			$fileName = "{$dateString}-{$model->img1}";
			if ($model->img1!=null and !$model->img1->getHasError()) {
				//echo Yii::trace(CVarDumper::dumpAsString($model->img1),'vardump');
				$model->img1->saveAs(Yii::app()->basePath.GlobalConstants::APP_RELATIVE_URL.BuildUrl::imageUrl(GlobalConstants::DIR_APPOINTMENT_IMG.'/'.$fileName));
				chmod(Yii::app()->basePath.GlobalConstants::APP_RELATIVE_URL.BuildUrl::imageUrl(GlobalConstants::DIR_APPOINTMENT_IMG.'/'.$fileName), 0777 );
				$model->img1=$fileName;
			}else{
				$model->img1 = $oldfilename1;
			}
			
			$model->img2 = CUploadedFile::getInstance($model, 'img2');
			$fileName = "{$dateString}-{$model->img2}";
			if ($model->img2!=null and !$model->img2->getHasError()) {
				$model->img2->saveAs(Yii::app()->basePath.GlobalConstants::APP_RELATIVE_URL.BuildUrl::imageUrl(GlobalConstants::DIR_APPOINTMENT_IMG.'/'.$fileName));
				chmod(Yii::app()->basePath.GlobalConstants::APP_RELATIVE_URL.BuildUrl::imageUrl(GlobalConstants::DIR_APPOINTMENT_IMG.'/'.$fileName), 0777 );
				$model->img2=$fileName;
			}else{
				$model->img2 = $oldfilename2;
			}
			
			$model->img3 = CUploadedFile::getInstance($model, 'img3');
			$fileName = "{$dateString}-{$model->img3}";
			if ($model->img3!=null and !$model->img3->getHasError()) {
				$model->img3->saveAs(Yii::app()->basePath.GlobalConstants::APP_RELATIVE_URL.BuildUrl::imageUrl(GlobalConstants::DIR_APPOINTMENT_IMG.'/'.$fileName));
				chmod(Yii::app()->basePath.GlobalConstants::APP_RELATIVE_URL.BuildUrl::imageUrl(GlobalConstants::DIR_APPOINTMENT_IMG.'/'.$fileName), 0777 );
				$model->img3=$fileName;
			}else{
				$model->img3 = $oldfilename3;
			}
			
			$model->img4 = CUploadedFile::getInstance($model, 'img4');
			$fileName = "{$dateString}-{$model->img4}";
			if ($model->img4!=null and !$model->img4->getHasError()) {
				$model->img4->saveAs(Yii::app()->basePath.GlobalConstants::APP_RELATIVE_URL.BuildUrl::imageUrl(GlobalConstants::DIR_APPOINTMENT_IMG.'/'.$fileName));
				chmod(Yii::app()->basePath.GlobalConstants::APP_RELATIVE_URL.BuildUrl::imageUrl(GlobalConstants::DIR_APPOINTMENT_IMG.'/'.$fileName), 0777 );
				$model->img4=$fileName;
			}else{
				$model->img4 = $oldfilename4;
			}
			
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}
		
		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$this->actionAdmin();
	}

	/**
	 * Lists selected models.
	 * @param string $id the customer_cd of the model
	 */
	public function actionCatalog($customer_cd)
	{
		$model=new Appointment('search');
		$model->unsetAttributes();  // clear any default values
		//echo Yii::trace(CVarDumper::dumpAsString($model),'vardump');

		// Catagorize result by Appointment.customer_cd
		$_GET['Appointment']['customer_cd']=$customer_cd;
		$model->attributes=$_GET['Appointment'];
		
		// Reuse index view for display
		$this->render('index',array(
			'model'=>$model,
		));
	}
	
	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Appointment('search');
		$model->unsetAttributes();  // clear any default values
		
		$model->setKeyword(null);	// clear any default value for fulltext search
		
		if(isset($_GET['Appointment'])){
			//echo Yii::trace(CVarDumper::dumpAsString($_GET['Appointment']),'vardump');
			$model->attributes=$_GET['Appointment'];
		}

		// Get keyword for fulltext search
		if(isset($_GET['keyword'])) {
			//echo Yii::trace(CVarDumper::dumpAsString($_GET['keyword']),'vardump');
			// Assign keyword
			$model->setKeyword($_GET['keyword']);
		}
			
		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Appointment::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='appointment-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
