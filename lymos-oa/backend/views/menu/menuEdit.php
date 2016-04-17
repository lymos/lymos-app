<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

	$this->title = 'Lymos OA System';
?>
<div class="menu-form">
	<h1><?= Html::encode($this->title) ?><h1>
	<p> add menu:<p>
	<div class="row">
		<div class="col-lg-5">
			<?php $form = ActiveForm::begin(['id' => 'menu-form']); ?>
				<?= $form->field($model, 'parent_id')->passwordInput(); ?>
				<?= $form->field($model, 'name')->textInput() ?>
				<div class="form-group">
					<?= Html::submitButton() ?>
				</div>
			<?php ActiveForm::end(); ?>
		</div>
	</div>
</div>
