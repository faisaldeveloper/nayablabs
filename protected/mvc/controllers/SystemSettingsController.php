<?php

class SystemSettingsController extends Controller
{
/**
* @var string the default layout for the views. Defaults to '//layouts/column2', meaning
* using two-column layout. See 'protected/views/layouts/column2.php'.
*/
public $layout='//layouts/column1';

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
/*public function accessRules()
{
return array(
array('allow',  // allow all users to perform 'index' and 'view' actions
'actions'=>array('index','view','create'),
'users'=>array('*'),
),
array('allow', // allow authenticated user to perform 'create' and 'update' actions
'actions'=>array(),
'users'=>array('@'),
),
array('allow', // allow admin user to perform 'admin' and 'delete' actions
'actions'=>array('admin','delete','update'),
'users'=>array('admin'),
),
array('deny',  // deny all users
'users'=>array('*'),
),
);
}*/

/**
* Displays a particular model.
* @param integer $id the ID of the model to be displayed
*/
public function actionView($id)
{
		$model = $this->loadModel($id);
		
		if( Yii::app()->request->isAjaxRequest )
		  {
			// Stop jQuery from re-initialization
			Yii::app()->clientScript->scriptMap['jquery.js'] = false;
		 	echo CJSON::encode( array(
			  'status' => 'failure',
			  'content' => $this->renderPartial( 'view', array('model' => $model ), true, true ),));
			exit;
		  }
		  else
			$this->render( 'view', array( 'model' => $model ) );
	  
	  
}

/**
* Creates a new model.
* If creation is successful, the browser will be redirected to the 'view' page.
*/
public function actionCreate()
{
$setting=SystemSettings::model()->findAll();
if(count($setting)>0)
{
   //$this->actionUpdate($setting[0]->id);
   $this->redirect( array( 'SystemSettings/update/'.$setting[0]->id) );
   exit;
}
    
   $model=new SystemSettings;
   $flag=SystemSettings::model()->truncateTable();
   if($flag==true)
   Yii::app()->user->setFlash('success','Database Refereshed');
// Uncomment the following line if AJAX validation is needed

$this->performAjaxValidation($model);

if(isset($_POST['SystemSettings']))
{
	
$model->attributes=$_POST['SystemSettings'];
$model->recipe_calculator=(int)$_POST['SystemSettings']['recipe_calculator'];
$model->stock_restrickted=(int)$_POST['SystemSettings']['stock_restrickted'];
if($_POST['SystemSettings']['menu_type']=='')
{
$model->menu_type=2;	
	
}
if($model->save()){

     $store=new Store;
	 if($_POST['SystemSettings']['store_name']!='')
	 {
		  $store->name=$_POST['SystemSettings']['store_name'];
	 }
	 else
	 {
	 $store->name="This";
	 }
	 $outlet=new Outlet;
	 $outlet->name="This";
	 if($store->save() && $outlet->save())
	 {
		 $user=User::model()->find();
		 if(count($user)>0)
		 {
			 $user->store_id=$store->id;
			 $user->outlet_id=$outlet->id;
			 $user->save();
		 }
		 else
		 {
			 $user=new User;
			 if($_POST['SystemSettings']['username']!='')
			 {
				 $user->name=$_POST['SystemSettings']['username'];
				 $user->username=$_POST['SystemSettings']['username'];
			 }
			 else
			 {
			   $user->name="admin";
			   $user->username="admin";
			 }
			 if($_POST['SystemSettings']['password']!='')
			 {
			    $user->password=$_POST['SystemSettings']['password'];
			 }
			 else
			 {
			 $user->password="admin";
			 }
			 $user->store_id=$store->id;
			 $user->outlet_id=$outlet->id;
			 $user->save();
		 }
	 }
			 
	if( Yii::app()->request->isAjaxRequest )
		  {
			// Stop jQuery from re-initialization
			Yii::app()->clientScript->scriptMap['jquery.js'] = false;
	 
	 		$json_arr = array(
			  'status' => 'success',
			  'grid' => 'categories-grid',
			  'url' => $_SERVER['REQUEST_URI'],
			  'content' => 'Categories successfully Created',
			);
			if(isset($_GET['dropDownList'])){
			$json_arr['inputType']='dropDownList';
			$json_arr['inputId']=$_GET['dropDownList'];
			$json_arr['inputData']=CHtml::tag('option',array('value'=>$model->id,'selected'=>true),CHtml::encode($model->name),true);
			}
			echo CJSON::encode($json_arr);
			exit;
		  }else{
          	Yii::app()->user->setFlash('success','SystemSettings successfully created.');	
			$this->redirect( array( 'Create') );
		  }
}//end model save
}//end post

				if( Yii::app()->request->isAjaxRequest ){
					// Stop jQuery from re-initialization
					Yii::app()->clientScript->scriptMap['jquery.js'] = false;
				 	echo CJSON::encode( array(
					  'status' => 'failure',
					  'url' => $_SERVER['REQUEST_URI'],
					  'content' => $this->renderPartial( '_form', array(
					  'model' => $model), true, true ),
					));
					exit;
				  }else{
					$this->render( 'create', array( 'model' => $model) );
				  }
}//end function
/**
* Updates a particular model.
* If update is successful, the browser will be redirected to the 'view' page.
* @param integer $id the ID of the model to be updated
*/
public function actionUpdate($id)
{
$model=$this->loadModel($id);

// Uncomment the following line if AJAX validation is needed
$this->performAjaxValidation($model);

if(isset($_POST['SystemSettings']))
{
$model->attributes=$_POST['SystemSettings'];
$model->recipe_calculator=(int)$_POST['SystemSettings']['recipe_calculator'];
$model->stock_restrickted=(int)$_POST['SystemSettings']['stock_restrickted'];
	
	if($model->save()){
		
		if( Yii::app()->request->isAjaxRequest ){
			// Stop jQuery from re-initialization
			Yii::app()->clientScript->scriptMap['jquery.js'] = false;
	 		echo CJSON::encode( array(
			  'status' => 'success',
			  'url' => $_SERVER['REQUEST_URI'],
			  'grid' => 'asset-grid',//grid to update
			  'content' => 'SystemSettings successfully Updated',
			));
		exit;
		}else{
		Yii::app()->user->setFlash('success','SystemSettings successfully Updated');	
		$this->redirect(array('Create'));
		}
	}//end if model save
}//end if POST


				if( Yii::app()->request->isAjaxRequest ){
					// Stop jQuery from re-initialization
					Yii::app()->clientScript->scriptMap['jquery.js'] = false;
				 	echo CJSON::encode( array(
					  'status' => 'failure',
					  'url' => $_SERVER['REQUEST_URI'],
					  'content' => $this->renderPartial( '_form', array(
					  'model' => $model), true, true ),
					));
					exit;
				  }else{
					$this->render( 'update', array( 'model' => $model) );
				  }

}//end function
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
exit;
$dataProvider=new CActiveDataProvider('SystemSettings');
$this->render('index',array(
'dataProvider'=>$dataProvider,
));
}

/**
* Manages all models.
*/
public function actionAdmin()
{
$model=new SystemSettings('search');
$model->unsetAttributes();  // clear any default values
if(isset($_GET['SystemSettings']))
$model->attributes=$_GET['SystemSettings'];

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
$model=SystemSettings::model()->findByPk($id);
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
if(isset($_POST['ajax']) && $_POST['ajax']==='system-settings-form')
{
echo CActiveForm::validate($model);
Yii::app()->end();
}
}
}
