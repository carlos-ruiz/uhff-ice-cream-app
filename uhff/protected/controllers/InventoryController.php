<?php

class InventoryController extends Controller
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
			'postOnly + delete', // we only allow deletion via POST request
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
				'users'=>array('*'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('create','update','admin','delete','init', 'add'),
				'users'=> Users::model()->administratorUserames(),
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
		$model=new Inventory;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Inventory']))
		{
			$model->attributes=$_POST['Inventory'];
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

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Inventory']))
		{
			$model->attributes=$_POST['Inventory'];
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
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		if (sizeof(Inventory::model()->findAll()) == 0) {
			$this->redirect('init');
		}
		$inventoryList = Inventory::model()->findAll();
		$dataProvider=new CActiveDataProvider('Inventory');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
			'inventoryList'=>$inventoryList,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Inventory('search');
		$model->unsetAttributes();  // clear any default values
		$inventoryList = Inventory::model()->findAll();
		$stores = Stores::model()->findAll();
		if(isset($_GET['Inventory']))
			$model->attributes=$_GET['Inventory'];

		$this->render('admin',array(
			'model'=>$model,
			'inventoryList'=>$inventoryList,
			'stores'=>$stores,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Inventory the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Inventory::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Inventory $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='inventory-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	public function actionInit()
	{
		$inventoryList = Inventory::model()->findAll();
		if (sizeof($inventoryList) == 0) {
			$productPricesByStore = ProductPriceByStore::model()->findAll();
			foreach ($productPricesByStore as $product_price) {
				if($product_price->individual_inventory == 1) {
					$inventory = new Inventory();
					$inventory->product_price_by_store_id = $product_price->id;
					$inventory->quantity = 0;
					$inventory->quantity_min = 20;
					$inventory->save();
				}else{
					$inventory = Inventory::model()->find('products_id='.$product_price->products_id.' and stores_id='.$product_price->stores_id);
					if (!isset($inventory)) {
						$inventory = new Inventory();
						$inventory->product_price_by_store_id = $product_price->id;
						$inventory->products_id = $product_price->products_id;
						$inventory->stores_id = $product_price->stores_id;
						$inventory->quantity = 0;
						$inventory->quantity_min = 20;
						$inventory->save();
					}
				}
			}
			/*
			foreach ($productPricesByStore as $product_price) {
				$inventory = new Inventory();
				$inventory->product_price_by_store_id = $product_price->id;
				$inventory->quantity = 0;
				$inventory->quantity_min = 20;
				if($product_price->individual_inventory == 0) {
					$inventory->products_id = $product_price->products_id;
				}
				$inventory->save();
			}
			*/
		}
		$this->redirect('admin');
	}

	public function actionAdd()
	{
		if (isset($_POST['arrayData'])) {
			$data = $_POST['arrayData'];
			foreach ($data as $id => $value) {
				if ($value > 0) {
					$inventoryItem = Inventory::model()->findByPk($id);
					$inventoryItem->quantity += $value;
					$inventoryItem->save();
				}
			}
		}
	}
}
