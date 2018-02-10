<?php
/* @var $this SiteController */
$filename = "/uhff/uhff/assets/products.csv";

$this->pageTitle=Yii::app()->name;
if (Yii::app()->user->isGuest) {
	$this->redirect(array('site/login'));
}
else if (Users::model()->findByUsername(Yii::app()->user->name)->userRole->role != "administrator") { ?>
<a href="/uhff/uhff/site/logout">Salir</a>
<?php
$this->redirect(array('sales/index'));
 }
?>

<div class="align-center">
	<h1><?php echo CHtml::encode(Yii::app()->name); ?></h1>
	<hr>

	<img src="/uhff/uhff/images/logo.jpg" width="400">
</div>

