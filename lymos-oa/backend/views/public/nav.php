<?php
use yii\helpers\Url;
$this->title = 'Lymos OA System';
?>
<div class="col-sm-2" style="border-right: 1px solid red; height: 200px;">
	<div class="list-group">
		<a class="list-group-item" data-toggle="collapse" href="#menu1">menu managment
			<span class="glyphicon glyphicon-plus"></span>
		</a>
		<div class="collapse" id="menu1">
			<a class="list-group-item" href="<?php echo Url::toRoute('menu/index'); ?>">menu list</a>
			<a class="list-group-item" href="./index.php?r=index/addmenu">add menu</a>
		</div>
	</div>

</div>
