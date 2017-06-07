/**
 * Created by ouhaohan on 17/6/6.
 */

$(document).ready(function(){
	//alert(123);
	//name
	var span_n_w = '<span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span> <span id="inputSuccess2Status" class="sr-only">(wrong)</span> <span id="helpBlock2" class="help-block">姓名不能为空</span>';
	var span_p_w = '<span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span> <span id="inputSuccess2Status" class="sr-only">(wrong)</span> <span id="helpBlock2" class="help-block">手机号码不能为空</span>';
	var span_y_w = '<span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span> <span id="inputSuccess2Status" class="sr-only">(wrong)</span> <span id="helpBlock2" class="help-block">验证不能为空</span>';
	var span_y_w_2 = '<span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span> <span id="inputSuccess2Status" class="sr-only">(wrong)</span> <span id="helpBlock2" class="help-block">验证码错误</span>';
	var span_kd = '<span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span> <span id="inputSuccess2Status" class="sr-only">(wrong)</span> <span id="helpBlock2" class="help-block">宽带号不能为空</span>';
	var span_ID = '<span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span> <span id="inputSuccess2Status" class="sr-only">(wrong)</span> <span id="helpBlock2" class="help-block">身份证号不能为空</span>';
	var span_n_r = '<span class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true"></span> <span id="inputSuccess2Status" class="sr-only">(success)</span>';
	//点击复原
	$(".name,.phone,.yzm,.kd,.ID").click(function(){
		$(this).parent().removeClass('has-success has-error');
		$(this).parent().children('span').remove();
	});
	//name
	$(".name").blur(function(){
		//alert(12331);
		var name = this.value;
		//alert(name);
		if(name != ""){
			$(".name").parent().addClass('has-success');
			$(".name").parent().append(span_n_r);
		} else{
			$(".name").parent().addClass('has-error');
			$(".name").parent().append(span_n_w);
		}
	});
	//phone
	$(".phone").blur(function(){
		//alert(12331);
		var phone = this.value;
		//alert(phone);
		if(phone != ""){
			$(".phone").parent().addClass('has-success');
			$(".phone").parent().append(span_n_r);
		} else{
			$(".phone").parent().addClass('has-error');
			$(".phone").parent().append(span_p_w);
		}
	});

//	短信验证码
	var time = 60;
	var code = Math.round(100000*Math.random());
	console.log(code);
	//var reg = /^1[3|4|5|7|8]\d{9}$/;//
	//reg.test(phone);
	$('#send').click(function(){
		timeout();
	});

	//yzm
	$(".yzm").blur(function(){
		//alert(12331);
		var yzm = this.value;
		//alert(yzm);
		if(yzm != ""){
			if(yzm == code){
				$(".yzm").parent().addClass('has-success');
				$(".yzm").parent().append(span_n_r);
			}else{
				$(".yzm").parent().addClass('has-error');
				$(".yzm").parent().append(span_y_w_2);
			}

		} else{
			$(".yzm").parent().addClass('has-error');
			$(".yzm").parent().append(span_y_w);
		}
	});
	
	//kd
	$(".kd").blur(function(){
		//alert(12331);
		var kd = this.value;
		//alert(kd);
		if(kd != ""){
			$(".kd").parent().addClass('has-success');
			$(".kd").parent().append(span_n_r);
		} else{
			$(".kd").parent().addClass('has-error');
			$(".kd").parent().append(span_kd);
		}
	});

	//ID
	$(".ID").blur(function(){
		//alert(12331);
		var ID = this.value;
		//alert(ID);
		if(ID != ""){
			$(".ID").parent().addClass('has-success');
			$(".ID").parent().append(span_n_r);
		} else{
			$(".ID").parent().addClass('has-error');
			$(".ID").parent().append(span_ID);
		}
	});

	function timeout(){
		if(time == 0){
			$('#send').attr("disabled",false);
			$('#send').html('免费发送验证码');
		}else{
			$('#send').attr("disabled",true);
			time--;
			$('#send').html('已发送到手机( '+time+' )');
			setTimeout(function(){timeout()},1000);
		}
	}
});