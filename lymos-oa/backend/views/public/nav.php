<?php
use yii\helpers\Url;
$this->title = 'Lymos OA System';
?>
<div class="col-sm-3" style="border-right: 1px solid #888;">
	<div class="list-group">
		<a class="list-group-item" data-toggle="collapse" href="#menu1">
			<span class="glyphicon glyphicon-plus"></span>菜单管理
		</a>
		<div class="collapse" id="menu1">
			<a class="list-group-item" href="<?php echo Url::toRoute('menu/index'); ?>">菜单列表</a>
		</div>

		<a class="list-group-item" data-toggle="collapse" href="#menu2">
			<span class="glyphicon glyphicon-plus"></span>用户管理
		</a>
		<div class="collapse" id="menu2">
			<a class="list-group-item" href="<?php echo Url::toRoute('department/index'); ?>">部门列表</a>
			<a class="list-group-item" href="<?php echo Url::toRoute('menu/index'); ?>">用户列表</a>
			<a class="list-group-item" href="#">角色列表</a>
		</div>

		<a class="list-group-item" data-toggle="collapse" href="#menu3">
			<span class="glyphicon glyphicon-plus"></span>人事管理
		</a>
		<div class="collapse" id="menu3">
			<a class="list-group-item" href="<?php echo Url::toRoute('dossier/index'); ?>">档案列表</a>
		</div>

		<a class="list-group-item" data-toggle="collapse" href="#menu4">
			<span class="glyphicon glyphicon-plus"></span>考勤管理
		</a>
		<div class="collapse" id="menu4">
			<a class="list-group-item" href="<?php echo Url::toRoute('leave/index'); ?>">请假记录</a>
		</div>

		<a class="list-group-item" data-toggle="collapse" href="#menu5">
			<span class="glyphicon glyphicon-plus"></span>项目管理
		</a>
		<div class="collapse" id="menu5">
			<a class="list-group-item" href="<?php echo Url::toRoute('project/index'); ?>">项目列表</a>
			<a class="list-group-item" href="">我的项目</a>
		</div>
		
		<a class="list-group-item" data-toggle="collapse" href="#menu6">
			<span class="glyphicon glyphicon-plus"></span>会议管理
		</a>
		<div class="collapse" id="menu6">
			<a class="list-group-item" href="<?php echo Url::toRoute('meeting/index'); ?>">会议记录</a>
		</div>

		<a class="list-group-item" data-toggle="collapse" href="#menu7">
			<span class="glyphicon glyphicon-plus"></span>财务管理
		</a>
		<div class="collapse" id="menu7">
			<a class="list-group-item" href="<?php echo Url::toRoute('finance/index'); ?>">费用清单</a>
		</div>

		<a class="list-group-item" data-toggle="collapse" href="#menu8">
			<span class="glyphicon glyphicon-plus"></span>财产管理
		</a>

		<div class="collapse" id="menu8">
			<a class="list-group-item" href="<?php echo Url::toRoute('property/index'); ?>">公司财产</a>
		</div>

		<a class="list-group-item" data-toggle="collapse" href="#menu9">
			<span class="glyphicon glyphicon-plus"></span>工具管理
		</a>
		<div class="collapse" id="menu9">
			<a class="list-group-item" href="<?php echo Url::toRoute('tools/calendar'); ?>">工具日历</a>
		</div>

		<a class="list-group-item" data-toggle="collapse" href="#menu10">
			<span class="glyphicon glyphicon-plus"></span>系统管理
		</a>
		<div class="collapse" id="menu10">
			<a class="list-group-item" href="<?php echo Url::toRoute('system/setting'); ?>">系统设置</a>
		</div>
	</div>
</div>
