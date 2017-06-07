<?php
/**
 * Created by PhpStorm.
 * User: ouhaohan
 * Date: 17/6/6
 * Time: 下午11:20
 */
?>
<style>
	.head-bg{
		position: relative;
		width: 100%;
		height: 667px;
		background: linear-gradient(to bottom right, #ff9366 , #ff826c,#ff6278,#ff4f7f);
	}
</style>
<article>
	<section class="head-bg">
		<p style="text-align: center;padding-top: 25%">
			<button id="only_phone" type="button" class="btn btn-primary btn-lg" >&nbsp;<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;电信号码用户&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br>&nbsp;</button>
		</p>
		<p style="text-align: center;padding-top: 20%">
			<button id="only_kd" type="button" class="btn btn-primary btn-lg">&nbsp;<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;电信宽带用户&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br>&nbsp;</button>
		</p>
		<p style="text-align: center;padding-top: 20%">
			<button id="both" type="button" class="btn btn-primary btn-lg">&nbsp;<br>电信号码及宽带用户<br>&nbsp;</button>
		</p>
	</section>
</article>
<?php
$this->registerJsFile("/yifen/frontend/web/js/newindex.js", ["depends" => [\yii\web\JqueryAsset::className()]],\yii\web\View::POS_END);

?>
