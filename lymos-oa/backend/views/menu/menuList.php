<?php
$self_dir = dirname(__FILE__);
include dirname($self_dir) . '/public/nav.php';
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
?>
<div class="col-sm-10">
<ol class="breadcrumb">
	<li><a href="#">Home</a></li>
	<li class="active">MenuList</li>
</ol>
<button class="btn btn-default" type="button" data-toggle="modal" data-target="#add-box">
	<span class="glyphicon glyphicon-plus-sign"></span>
	Add
</button>
<div id="add-box" class="modal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button class="close" type="button" data-dismiss="modal">
					<span>&times;</span>
				</button>
				<h4 class="modal-title">menu add</h4>
			</div>
			<?php $form = ActiveForm::begin(['layout' => 'horizontal', 'action' => ['menu/add']]); ?>
			<div class="modal-body">
				<?= $form->field($model, 'name')->textInput(); ?>
			</div>
			<div class="modal-footer">
				<button class="btn btn-default" type="button" data-dismiss="modal">close</button>
				<button class="btn btn-primary btn-submit" type="button">save</button>
			</div>
			<?php ActiveForm::end(); ?>
		</div>
	</div>
</div>
<table class="table">
	<thead>
		<tr>
			<th>ID</th>
			<th>Name</th>
			<th>addTime</th>
			<th>action</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach($menu_list as $rs): ?>
		<tr>
			<td><?= Html::encode($rs['menu_id']) ?></td>
			<td><?= Html::encode($rs['name']) ?></td>
			<td><?= Html::encode($rs['added_time']) ?></td>
			<td>
				<span class="glyphicon glyphicon-edit"></span>
				<span class="glyphicon glyphicon-remove-sign btn-delete" data-id="<?php echo $rs['menu_id']; ?>"></span>
			</td>
		</tr>
		<?php endforeach; ?>
	</tbody>
</table>
<nav>
	<ul class="pagination">
		<li>
			<a href="#">
				<span>&laquo;</span>
			</a>
		<li>
		<li class="active"><a href="#">1</a></li>
		<li><a href="#">2</a></li>
		<li>
			<a href="#">
				<span>&raquo;</span>
			</a>
		</li>
	</ul>
</nav>
</div>
