<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<link rel="stylesheet" href="../css/main.css">
<link rel="stylesheet" href="../css/common-member.css">
<!--<link rel="stylesheet" type="text/css" href="/html/css/master.css?v=1" />-->
<!--<link rel="stylesheet" type="text/css" href="/html/css/css.css?v=2" />-->

<style>
    .circle {
        width: 194px;
        height: 194px;
        position: absolute;
        border-radius: 50%;
        background: #fff;
        left: 50%;
        margin-left: -97px;
        top:28px;
    }

    .pie_left, .pie_right {
        width: 194px;
        height: 194px;
        position: absolute;
        top: 0;
        left: 0;
    }

    .left, .right {
        display: block;
        width: 194px;
        height: 194px;
        background: #ffaeac;
        border-radius: 50%;
        position: absolute;
        top: 0;
        left: 0;
    }

    .pie_right, .right {
        clip: rect(0,auto,auto,100px);
    }

    .pie_left, .left {
        clip: rect(0,100px,auto,0);
    }

    .mask {
        width: 150px;
        height: 150px;
        border-radius: 50%;
        left: 25px;
        top: 25px;
        /*background: #FFF;*/
        position: absolute;
        text-align: center;
        line-height: 150px;
        font-size: 16px;
    }

    .cardlv {
        position: absolute;
        top: 0;
        left: 0;
        transform: rotate(0deg);
        color: #fff;
        display: none;
        font-size:1.4em;
        width:70px;
        height:20px;
        text-align:center;
        line-height:20px;
    }
    .baoji {
        position: absolute;
        top: 0;
        left: 0;
        transform: rotate(0deg);
        font-size:1.4em;
        width:30px;
        height:20px;
        text-align:center;
        line-height:20px;
    }

    .qrcodeBox {
        display: none;
        position: absolute;
        width: 100%;
        height: 100%;
        z-index: 1000;
        background: rgba(0,0,0,.5);
    }
    .qrinnerbox{
        /*width: 80%;*/
        margin: 40px 5%;
        background: #fff;
        /*padding: 10px 5%;*/
        border-radius:4px;
    }
    a:link ,a:hover,a:active,a:visited{
        color:#cccccc;
        outline:none;
    }
    .scoreDiv{
        position: absolute;
        width: 100%;
        height: 100%;
        min-height: 100%;
        background: rgba(0, 0, 0, 0.5);
        z-index: 1000;
        display:none;
    }
    .scoreDiv div{
        position: absolute;
        width: 80%;
        margin: 60% 10% 0;
        background: #fff;
        border-radius: 4px;
        text-align:center;
        line-height:100px;
        font-size:1.4em;
    }
    .sign{
        display:none;
    }
    .writing{
        position: absolute;
        width: 100%;
        height: 100%;
        min-height: 100%;
        background: rgba(0, 0, 0, 0.8);
        z-index: 1000;
        display:none;
    }
    .writing-box{
        position: absolute;
        width: 80%;
        margin: 60% 10% 0;
        background: #fff;
        border-radius: 4px;
        font-size:2em;
        text-align:center;
        line-height:80px;

    }
</style>
<article class="bg bg-gray indexatricle">
    <div class="qrcodeBox" hidden="hidden">
        <div class="qrinnerbox">
            <p class="bar_code" style="padding: 10px 4% 10px 0%;width:100%;">
                <img style="margin-top:10px;" src="/UI_MemberCenter/GetBarCode?barCode=30436592">
            </p>
            <p style="margin-top:10px;position:relative;    padding: 10px 5%;">
                <img style="cursor: pointer;" src="/UI_MemberCenter/QrCode?barCode=30436592&amp;logopath=%2Fhtml%2Fimages%2FCLUB3.png">
                <img class="rad_4" style="width: 60px;height:60px; position: absolute; left: 50%; top: 50%;margin-top:-32px;margin-left:-32px;border:2px solid #fff;border-radius:15px;" src="/html/images/CLUB3.png">
            </p>

        </div>
    </div>

    <div class="signin" style=" display: none ">
        <div class="signin-content">
            <span class="signin-content-img"></span>
            <p class="congratulations">

            </p>
            <p class="tomorrowpoints">

            </p>
            <div class="sinbtnbox">
                <div class="sign-close" style="background:#fff;color: #000;border: 1px solid #ddd;margin-right: 10px;">
                    <a href="/UI_MemberCenter/SignInList" style="color:#2f2f2f">签到记录</a>
                </div>
                <div class="sign-close" style="background:#fff;color: #000;border: 1px solid #ddd;">
                    <span style="color:#2f2f2f">确定</span>
                </div>
            </div>

            <!--<ul class="signin-content-btn">-->
            <!--<li class="signin-close">关闭</li>-->
            <!--</ul>-->
        </div>
    </div>
    <!--积分提示-->
    <div class="scoreDiv">
        <div id="scoreDiv"></div>
    </div>
    <!--上半部-->
    <section class="head-bg">
        <div class="wavebox">
            <img src="images/wave.png">

        </div>
        <div class="head-cardnumber">
            <span id="qrcode2">会员卡号</span>
            <span><b id="qrcode1"><?php if(!empty($_SESSION['openid'])){
                        echo $_SESSION['openid'];
                    } ?></b><i><img src="../../web/images/qrcode.png" id="qrcode"></i></span>
        </div>
        <div class="head-integral">
            <!--<div class="integral-box">-->
            <!--<span>可用积分</span>-->
            <!--<span>898</span>-->
            <!--</div>-->

            <div class="circle">
                <div class="movecircular" id="movecircular" style="transform: rotate(208.656deg);" hidden="hidden">
                    <span class="cardlv" onclick="showScoreMsg()" id="cardlv" style="top: -30px; left: 40px; transform: rotate(-208.656deg); display: inline;" hidden="hidden">普卡</span>
                </div>
                <div id="baojicircle" class="baojicircle" style="display: none; transform: rotate(0deg);"><span class="baoji" id="baoji" style="color: rgb(253, 228, 63); transform: rotate(0deg); top: -30px; left: -30px;" onclick="showBaoJiMsg()">保级</span></div>
                <div class="pie_left"><div class="left" id="left" style="transition: -webkit-transform 1000ms linear 1000ms; transform: rotate(28.656deg);"></div></div>
                <div class="pie_right"><div class="right" id="right" style="transition: -webkit-transform 1000ms linear; transform: rotate(180deg);"></div></div>
                <div class="integral-box" onclick="window.open('/ui_membercenter/memberpoints')">
                    <span>可用积分</span>
                    <span id="integral-num">2893</span>
                </div>
            </div>


        </div>
        <div class="sign" hidden="hidden">
            <p id="signp">签到</p>
            <img id="qdImg" src="/Content/images/index-qiandao.png">
        </div>
        <!--<div class="scan">-->
        <!--<img src="" alt="">-->
        <!--</div>-->
    </section>
    <!--上半部-->
    <!--下半部-->
    <section class="foot-bg">
        <div class="foot-lin1">
            <ul class="lin1list">
                <li onclick="redirectAddress('/UI_MemberCenter/CouponList') ">
                    <img src="../../web/images/index-coupon.png">
                    <p>优惠券</p>
                </li>
                <li id="my_tp" onclick="redirectAddress('/UI_MemberCenter/OrderList') ">
                    <img src="../../web/images/index-order.png">
                    <p>订单</p>
                </li>
                <li id="my_message" onclick="alert('您暂无消息') ">
                    <img src="../../web/images/index-news.png">
                    <p>消息</p>

                </li>


            </ul>
        </div>
        <div class="foot-lin2">
            <div class="nav1" id="nav1">
                <img src="../../web/images/index-gift.png">
                <span>推荐有礼</span>
            </div>

            <div class="nav2" id="myInfo" onclick="redirectHref()">
                <img src="../../web/images/index-mymenus.png">
                <span>我的资料</span>
            </div>
            <div class="nav4" onclick="redictService()">
                <img src="../../web/images/index-vip.png">
                <span>会员服务</span>
            </div>
            <div class="nav3" onclick="redictOptions()">
                <img src="../../web/images/index-talkto.png">
                <span>我要吐槽</span>
            </div>

        </div>
        <div class="callus">
            <a href="tel:400-6530-696" class="callus"> 联系我们：5666666</a>
        </div>
    </section>
    <!--下半部-->

</article>

<!--<section class="head-bg" style="">-->
<!--    <div class="wavebox">-->
<!--        <img src="/Content/images/wave.png">-->
<!---->
<!--    </div>-->
<!--    <div class="head-cardnumber">-->
<!--        <span id="qrcode2">会员卡号</span>-->
<!--        <span><b id="qrcode1">30436592</b><i><img src="/Content/images/qrcode.png" id="qrcode"></i></span>-->
<!--    </div>-->
<!--    <div class="head-integral">-->
<!--        <!--<div class="integral-box">-->-->
<!--        <!--<span>可用积分</span>-->-->
<!--        <!--<span>898</span>-->-->
<!--        <!--</div>-->-->
<!---->
<!--        <div class="circle">-->
<!--            <div class="movecircular" id="movecircular" style="transform: rotate(208.656deg);">-->
<!--                <span class="cardlv" onclick="showScoreMsg()" id="cardlv" style="top: -30px; left: 40px; transform: rotate(-208.656deg); display: inline;">普卡</span>-->
<!--            </div>-->
<!--            <div id="baojicircle" class="baojicircle" style="display: none; transform: rotate(0deg);"><span class="baoji" id="baoji" style="color: rgb(253, 228, 63); transform: rotate(0deg); top: -30px; left: -30px;" onclick="showBaoJiMsg()">保级</span></div>-->
<!--            <div class="pie_left"><div class="left" id="left" style="transition: -webkit-transform 1000ms linear 1000ms; transform: rotate(28.656deg);"></div></div>-->
<!--            <div class="pie_right"><div class="right" id="right" style="transition: -webkit-transform 1000ms linear; transform: rotate(180deg);"></div></div>-->
<!--            <div class="integral-box" onclick="window.open('/ui_membercenter/memberpoints')">-->
<!--                <span>可用积分</span>-->
<!--                <span id="integral-num">2893</span>-->
<!--            </div>-->
<!--        </div>-->
<!---->
<!---->
<!--    </div>-->
<!--    <div class="sign">-->
<!--        <p id="signp">签到</p>-->
<!--        <img id="qdImg" src="/Content/images/index-qiandao.png">-->
<!--    </div>-->
<!--    <!--<div class="scan">-->-->
<!--    <!--<img src="" alt="">-->-->
<!--    <!--</div>-->-->
<!--</section>-->
<!--<section class="foot-bg">-->
<!--    <div class="foot-lin1">-->
<!--        <ul class="lin1list">-->
<!--            <li onclick="redirectAddress('/UI_MemberCenter/CouponList') ">-->
<!--                <img src="../../web/images/index-coupon.png">-->
<!--                <p>优惠券</p>-->
<!--            </li>-->
<!--            <li id="my_tp" onclick="redirectAddress('/UI_MemberCenter/OrderList') ">-->
<!--                <img src="../../web/images/index-order.png">-->
<!--                <p>订单</p>-->
<!--            </li>-->
<!--            <li id="my_message" onclick="alert('您暂无消息') ">-->
<!--                <img src="../../web/images/index-news.png">-->
<!--                <p>消息</p>-->
<!---->
<!--            </li>-->
<!---->
<!---->
<!--        </ul>-->
<!--    </div>-->
<!--    <div class="foot-lin2">-->
<!--        <div class="nav1" id="nav1">-->
<!--            <img src="/Content/images/index-gift.png">-->
<!--            <span>推荐有礼</span>-->
<!--        </div>-->
<!---->
<!--        <div class="nav2" id="myInfo" onclick="redirectHref()">-->
<!--            <img src="/Content/images/index-mymenus.png">-->
<!--            <span>我的资料</span>-->
<!--        </div>-->
<!--        <div class="nav4" onclick="redictService()">-->
<!--            <img src="/Content/images/index-vip.png">-->
<!--            <span>会员服务</span>-->
<!--        </div>-->
<!--        <div class="nav3" onclick="redictOptions()">-->
<!--            <img src="/Content/images/index-talkto.png">-->
<!--            <span>我要吐槽</span>-->
<!--        </div>-->
<!---->
<!--    </div>-->
<!--    <div class="callus">-->
<!--        <a href="tel:400-6530-696" class="callus"> 联系我们：400-6530-696</a>-->
<!--    </div>-->
<!--</section>-->
<?php
$this->registerJsFile("/yifen/frontend/web/js/index.js", ["depends" => [\yii\web\JqueryAsset::className()]],\yii\web\View::POS_END);

?>
