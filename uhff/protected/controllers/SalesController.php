<?php

class SalesController extends Controller
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
				'actions'=>array('index', 'saleDetail','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update', 'sale', 'cashCut'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
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
		$model=new Sales;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Sales']))
		{
			$model->attributes=$_POST['Sales'];
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

		if(isset($_POST['Sales']))
		{
			$model->attributes=$_POST['Sales'];
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
		if (isset($_GET['message'])) {
			$message = $_GET['message'];
			echo "<script>alert(\"$message\");</script>";
		}
		$this->layout='//layouts/sales';
		$user = Users::model()->findByUsername(Yii::app()->user->name);
		$productsByStore = ProductPriceByStore::model()->findAll('stores_id='.$user->stores_id);
		$products = array();
		foreach ($productsByStore as $productStore) {
			if (!in_array($productStore->product, $products)) {
				array_push($products, $productStore->product);
			}
		}

		if (session_status() == PHP_SESSION_NONE) {
			session_start();
		}
		if (!isset($_SESSION['token'])) {
			$_SESSION['token'] = time();
		}
		$token = $_SESSION['token'];
		$tickets = Tickets::model()->findAll('token='.$token);
		$dataProvider=new CActiveDataProvider('Sales');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
			'products'=>$products,
			'store'=>$user->store->name,
			'username'=>$user->name,
			'tickets'=>$tickets,
		));
	}
	/**
	 * Lists all models.
	 */
	public function actionSaleDetail($id)
	{
		$this->layout='//layouts/salesdetail';
		$product = Products::model()->findByPk($id);
		$user = Users::model()->findByUsername(Yii::app()->user->name);
		$this->render('sale_detail',array(
			'product'=>$product,
			'store_id'=>$user->stores_id,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Sales('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Sales']))
			$model->attributes=$_GET['Sales'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Sales the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Sales::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Sales $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='sales-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	public function actionSale() {
		if (session_status() == PHP_SESSION_NONE) {
			session_start();
		}
		$token = $_SESSION['token'];
		$tickets = Tickets::model()->findAll('token='.$token);
		$user = Users::model()->findByUsername(Yii::app()->user->name);
		foreach ($tickets as $ticket) {
			// Se registra la venta
			$sale = new Sales();
			$sale->date = date('Y-m-d H:i:s');
			$sale->quantity = $ticket->quantity;
			$sale->users_id = $user->id;
			$sale->product_price_by_store_id = $ticket->product_price_by_store_id;
			$sale->amount = $ticket->product->price * $ticket->quantity;
			$sale->save();
			// $ticket->delete();

			// Se obtiene la cantidad de producto vendida
			$productPriceByStore = ProductPriceByStore::model()->findByPk($sale->product_price_by_store_id);
			$portion = 1;
			$sold_portions = $productPriceByStore->sold_portions;

			if(isset($productPriceByStore->secondaryMeasure)){
				$portion = $productPriceByStore->secondaryMeasure->portion;
			}

			$quantityToDiscount = $portion * $sale->quantity * $sold_portions;

			// Se descuenta del inventario
			$productInventory = Inventory::model()->find('product_price_by_store_id='.$sale->product_price_by_store_id);
			if ($productPriceByStore->individual_inventory == 0) {
				$productInventory = Inventory::model()->find('products_id='.$productPriceByStore->products_id.' and stores_id='.$productPriceByStore->stores_id);
			}
			$productInventory->quantity -= $quantityToDiscount;
			$productInventory->save();
		}
		$_SESSION['token'] = null;
		$this->redirect('index');
	}

	public function actionCashCut()
	{
		$lastCashCut = CashCut::model()->find(array('order' => 'datetime DESC'));
		$dateFrom = date('2018-01-01 00:00:00');
		if (isset($lastCashCut)) {
			$dateFrom = $lastCashCut->datetime;
		}
		$user = Users::model()->findByUsername(Yii::app()->user->name);
		$sales = Sales::model()->findAll(array('condition' => 'date BETWEEN "'.$dateFrom.'" AND NOW() AND users_id='.$user->id));
		$total = 0; 
		foreach ($sales as $sale) {
			$total += $sale->amount;
		}

		if ($total == 0) {
			$this->redirect(array('index', 'message'=>'No hay movimientos para hacer corte de caja'));
		}
		
		$totalFormat = '$'.number_format($total, 2, '.', ',');

		$cashCut = new CashCut();
		$cashCut->datetime = date('Y-m-d H:i:s');
		$cashCut->amount = $total;
		$cashCut->users_id = $user->id;
		$cashCut->save();

		$this->redirect(array('index', 'message'=>"Corte de caja exitoso. Cantidad a entregar: $totalFormat"));
	}
}
