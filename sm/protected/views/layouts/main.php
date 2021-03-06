<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<? 
// Verify the user
if (Yii::app()->user->isGuest) {
	// User has not logged in yet, return to login page
	$this->redirect(Yii::app()->homeUrl);
}
$baseUrl = Yii::app()->request->baseUrl;
?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<link rel="stylesheet" type="text/css" href="<?=$baseUrl ?>/css/css.css" />
	<link rel="stylesheet" type="text/css" href="<?=$baseUrl ?>/css/style2.css" />
	
	<? Yii::app()->clientScript->registerCoreScript('jquery');?>

	<title><?php echo CHtml::encode(Yii::app()->name); ?></title>
</head>

<body>
	<div id="wrapper">
		<div id="header_main"> 
			<div id="welcome_msg">Welcome <?=Yii::app()->user->name ?> <a href="<?=$baseUrl ?>/site/logout" style="color:white; text-decoration:underline">(Logout)</a></div>
			<div id="name_main">BM AUTO ACCESSORIES (HK) CO. LTD.</div>
		</div>

		<div id="body_left_main">
			<div id="logo_main"><a href="<?=$baseUrl ?>/customer"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/logo.png"/></a></div>
				<?php if(GlobalFunction::isAdmin()){ ?>
				<a class="menubar" href="<?=$baseUrl ?>/authorize">帳號</a>
				<?php }?>
				<a class="menubar" href="<?=$baseUrl ?>/customer">客戶</a>
				<a class="menubar" href="<?=$baseUrl ?>/appointment">客戶約會</a>
		</div>
		<div id="body_right_main">
			<div class="rightmain_content">
				<?php echo $content; ?>
			</div>
		</div>
	</div>
</body>
</html>
