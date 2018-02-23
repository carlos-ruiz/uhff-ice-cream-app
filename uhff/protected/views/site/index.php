<?php
/* @var $this SiteController */
$filename = "<?php echo Yii::app()->request->baseUrl; ?>/assets/products.csv";

$this->pageTitle=Yii::app()->name;
if (Yii::app()->user->isGuest) {
	$this->redirect(array('site/login'));
}
else if (Users::model()->findByUsername(Yii::app()->user->name)->userRole->role != "administrator") { ?>
<a href="<?php echo Yii::app()->request->baseUrl; ?>/site/logout">Salir</a>
<?php
$this->redirect(array('sales/index'));
 }
?>

<div class="align-center">
	<h1><?php echo CHtml::encode(Yii::app()->name); ?></h1>
	<hr>

	<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/logo.jpg" width="400">
</div>

