<?php
/**
 * Created by PhpStorm.
 * User: ouhaohan
 * Date: 17/6/7
 * Time: 上午9:16
 */
?>
<style>
	.bs-example {
		position: relative;
		padding: 45px 15px 15px;
		margin: 0 -15px 15px;
		border-color: #e5e5e5 #eee #eee;
		border-style: solid;
		border-width: 1px 0;
		-webkit-box-shadow: inset 0 3px 6px rgba(0, 0, 0, .05);
		box-shadow: inset 0 3px 6px rgba(0, 0, 0, .05);
	}
	.inputwidth{
		width: 85%;
		margin-left: 7.5%;
	}
</style>
<div class="bs-example" data-example-id="form-validation-states">
	<form class="inputwidth">
		<div class="form-group">
			<label class="control-label" for="inputSuccess1">微信昵称</label>
			<input type="text" class="form-control" id="inputSuccess1" aria-describedby="helpBlock2" disabled>
		</div>

		<div class="form-group divname has-feedback">
			<label class="control-label" for="inputSuccess1">姓名</label>
			<input name="name" type="text" class="form-control name" id="inputSuccess2" aria-describedby="inputSuccess2Status" placeholder="请输入您的姓名">
		</div>

		<div class="form-group divname has-feedback">
			<label class="control-label" for="inputWarning1">手机号码</label>
			<input name="phone" type="text" class="form-control phone" id="inputWarning1" placeholder="请输入您的手机号码">
		</div>
		<div class="row">
			<div class="form-group col-xs-6 has-feedback" style="padding-right: 0">
				<label class="control-label" for="inputError1">验证码</label>
				<input type="text" class="form-control yzm" id="inputError1">
			</div>
			<div class="form-group has-error col-xs-6" >
				<label class="control-label" for="inputError1">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
				<button type="button" id="send" class="btn btn-default" >点击发送验证码</button>
			</div>
		</div>

		<button type="submit" class="btn btn-primary btn-lg btn-block">绑定</button>
	</form>
</div>

<?php
$this->registerJsFile("/yifen/frontend/web/js/onlyphone.js", ["depends" => [\yii\web\JqueryAsset::className()]],\yii\web\View::POS_END);

?>