<?php
use yii\helpers\Url;
$this->title = 'Lymos OA System';
?>
<div class="col-sm-3" style="border-right: 1px solid red; height: 200px;">
	<div class="list-group">
		<a class="list-group-item" data-toggle="collapse" href="#menu1">
			<span class="glyphicon glyphicon-plus"></span> menu managment
		</a>
		<div class="collapse" id="menu1">
			<a class="list-group-item" href="<?php echo Url::toRoute('menu/index'); ?>">menu list</a>
		</div>

		<a class="list-group-item" data-toggle="collapse" href="#menu2">
			<span class="glyphicon glyphicon-plus"></span> user managment
		</a>
		<div class="collapse" id="menu2">
			<a class="list-group-item" href="<?php echo Url::toRoute('department/index'); ?>">department list</a>
			<a class="list-group-item" href="<?php echo Url::toRoute('menu/index'); ?>">use list</a>
			<a class="list-group-item" href="#">role list</a>
		</div>
	</div>
</div>
