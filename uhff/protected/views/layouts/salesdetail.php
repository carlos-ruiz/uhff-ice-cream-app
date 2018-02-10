<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="language" content="en">
	<script type="javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/css/jquery-3.2.1.min.js"></script>
	<script type="javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/sales.js"></script>
	<script type="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
	<link type="css"  rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>
	<div class="sales-content-detail">
		<?php echo $content; ?>
	</div><!-- content -->
</body>
</html>