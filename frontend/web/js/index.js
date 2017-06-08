/**
 * Created by ouhaohan on 17/6/6.
 */
$(document).ready(function(){
	var phone = $('#phone').val();
	var kd = $('#kd').val();
	
});
	function redirectHref() {
		if ('' == "" || '' == null) {
			window.location.href = "/UI_MemberCenter/MyPersonBaseInfo?openid=" + $('#OpenId').val();
		}
		else {
			window.location.href = "/UI_MemberCenter/MyPersonalDataDetail?openid=" + $('#OpenId').val();
		}
	}
function redirectAddress(href) {
	window.location.href = href;
}
function redictOptions() {
	window.location.href = "/Options/Feedback?openId=" + $('#OpenId').val();
}
function redictService() {
	window.location.href = "/WechatHuayuClub/Newlist/";
}
$(function () {
	$(".bar_code").click(function () {
		$("#b1").attr("src", $("#b1").attr("src") + "&radn=" + Math.random());
		$("#q1").attr("src", $("#q1").attr("src") + "&radn=" + Math.random());
		$("#Eject").removeClass("dn");
	});

	$("#Eject").click(function () {
		$("#Eject").addClass("dn");
	});
});
	function timer() {
		var postData = {
			"barCode": $("#barCode").val()
		};
		postData = (function (obj) { // 转成post需要的字符串.
			var str = "";

			for (var prop in obj) {
				str += prop + "=" + obj[prop] + "&"
			}
			return str;
		})(postData);

		var xhr = new XMLHttpRequest();
		xhr.open("POST", "/UI_MemberCenter/GetBarCode", true);
		xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xhr.onreadystatechange = function () {
			var XMLHttpReq = xhr;
			if (XMLHttpReq.readyState == 4) {
				if (XMLHttpReq.status == 200) {
					var text = XMLHttpReq.responseText;

					console.log(text);
				}
			}
		};
		xhr.send(postData);

		var xhr1 = new XMLHttpRequest();
		xhr1.open("POST", "/UI_MemberCenter/QrCode", true);
		xhr1.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xhr1.onreadystatechange = function () {
			var XMLHttpReq = xhr1;
			if (XMLHttpReq.readyState == 4) {
				if (XMLHttpReq.status == 200) {
					var text = XMLHttpReq.responseText;

					console.log(text);
				}
			}
		};
		xhr1.send(postData);
	}
function Refresh() {
	var barCode = $("#barCode").val();
	if (barCode!=undefined) {
		if (barCode.length > 0) {
			timer();
		}
	}


}
setInterval(Refresh, 120000); //两分钟刷一下

var SignInFlag = false;
var phone = '13303465840';
$(function () {
	var cardlvtext=$('#cardlv').text();
	if(cardlvtext=='至尊钻石卡'){
		$('#cardlv').text('至尊卡');
	}
	$('.circle').each(function (index, el) {
		var right = document.getElementById('right');
		var left = document.getElementById('left');
		var cardlv = document.getElementById('cardlv');
		var baoji = document.getElementById('baoji');
		var movecircular = document.getElementById('movecircular');
		var baojicircle = document.getElementById('baojicircle');
		//总积分
		var totle = '20000';
		var dqnum = '11592';

		var num = (dqnum * 360) / totle;
		var baojinum = '0';
		if (baojinum == '0') {
			$('#baojicircle').hide();
		} else { };
		var baojinumlv = (baojinum * 360) / totle;
		baojicircle.style.webkitTransform = "rotate(" + baojinumlv + "deg)";
		baoji.style.webkitTransform = "rotate(" + (-baojinumlv) + "deg)";
		$('#baoji').css({ 'top': '-30px', 'left': '-30px' })

		if (num <= 180) {
			window.setTimeout(function () {
				right.style.webkitTransform = "rotate(" + num + "deg)";
				movecircular.style.webkitTransform = "rotate(" + num + "deg)";

				cardlv.style.webkitTransform = "rotate(" + (-num) + "deg)";
				$('#cardlv').css({ 'top': '-30px', 'left': '-62px' })

			}, 100);
			right.style.transition = "-webkit-transform 2000ms linear";
			window.setTimeout(function () {
				$('#cardlv').show();
			}, 2500);
			//movecircular.style.transition="-webkit-transform 2000ms linear";
		}
		else {
			window.setTimeout(function () {
				right.style.webkitTransform = "rotate(180deg)";
				left.style.webkitTransform = "rotate(" + (num - 180) + "deg)";
				movecircular.style.webkitTransform = "rotate(" + num + "deg)";
				$('#cardlv').css({ 'top': '-30px', 'left': '40px' })
				cardlv.style.webkitTransform = "rotate(" + (-num) + "deg)";
			}, 100);
			left.style.transition = "-webkit-transform 1000ms linear 1000ms";
			right.style.transition = "-webkit-transform 1000ms linear";

			window.setTimeout(function () {
				$('#cardlv').show();
			}, 2500);
			// movecircular.style.transition="-webkit-transform 2000ms linear";
		}
	});

	//判断是否签到
	//var SignInDate = localStorage.getItem(phone + "SignInDate") != undefined ? new Date(localStorage.getItem(phone + "SignInDate")) : null;

	//SignInFlag = SignInDate == null ? SignInFlag = false : SignInDate.getMonth() + "-" + SignInDate.getDate() == new Date().getMonth() + "-" + new Date().getDate() ? SignInFlag = true : SignInFlag = false;
	SignInFlag = 0;
	if (SignInFlag) {
		SignInImgChage();
	}

	//签到
	function SignIn() {
		if (!SignInFlag) {

			SignInFlag = true;
			$.ajax({
				url: '/UI_MemberCenter/SignIn/',
				dataType: 'json',
				type: 'POST',
				data: { openId: 'otTEBtwN9IKc3VWQDc-jhJFjZlmw' },
				success: function (data) {
					if (data.status == true) {
						$('.signin').show();
						if (data.giveNumber != null) {
							$(".congratulations").html("恭喜您，获得<span>" + data.giveNumber + "</span>" + (data.rType == 2 ? "优惠券" : "积分" + "！"));
							$('.tomorrowpoints').html("明日签到可获得<span>" + (data.tType == 3 ? data.tNumber : data.tNumber + "积分") + "</span>");
						}
						SignInFlag = true;
						SignInImgChage();
						GetScore();
					}
					else {
						console.log(data);
						SignInFlag = false;
						//$("#qdImg").attr("src", "/Content/images/index-qiandao.png");
						$(".signin-content-img").css("display", "none");
						SignInImgChage();
						if (data.status == 0 && data.msg != "您今日已经签到" && data.msg != "没有签到活动") {
							alert(2);
							alert(data.msg);
						}
						else {
							$('.signin').show();
							$(".congratulations").html(data.msg);
						}
					}
				}
				//,
				//error: function (data) {
				//    SignInFlag = false;
				//    $("#qdImg").attr("src", "/Content/images/index-qiandao.png");
				//    alert(1);
				//    alert(data.msg);
				//}
			});
		}else {
			location.href = '/UI_MemberCenter/SignInList';
		}
	}

	$('.sign').click(function () {
		SignIn();
	});
	$('.sign-close').click(function () {
		$('.signin').hide();
	});
	$("#qrcode,#qrcode1,#qrcode2").click(function () {
		$('.qrcodeBox').show();
	});
	$(".qrcodeBox").click(function () {
		$('.qrcodeBox').hide();
	});

	//屏蔽推荐有礼
	$('#nav1').click(function(){
		$('.writing').show();
		window.setTimeout(function(){
			$('.writing').hide();
		},2000);
	});

	function SignInImgChage()
	{
		$("#signp").html("已签");
		$("#qdImg").attr("src", "/Content/images/index-yiqiandao.png");
	}

	//获取用户积分
	function GetScore()
	{
		$.ajax({
			url: '/UI_MemberCenter/GetVipScore/',
			dataType: 'json',
			type: 'POST',
			data: { userID: 'DBF90052E381465593F910F00625BAC9' },
			success: function (data) {
				$("#integral-num").html(data);
			}
		});
	}

});

function showScoreMsg(){
	$("#scoreDiv").html("本期升级积分："+'11592');
	$(".scoreDiv").css("display","block");
}

function showBaoJiMsg(){
	$("#scoreDiv").html("保级需"+'0'+"积分");
	$(".scoreDiv").css("display","block");
}
$(".scoreDiv").click(function(){
	$(this).hide();
})