@if(isset($sys_config['web_reward']) && $sys_config['web_reward'] == 1)
<div class="reward">
    <i aria-hidden="true" class="fa fa-gift">
    </i>
    支付宝打赏
    <img class="reward-qrcode" style="left:-15px;" src="{{ asset($sys_config['web_alipay']) }}"/>
</div>
<div class="reward">
    <i aria-hidden="true" class="fa fa-gift">
    </i>
    微信打赏
    <img class="reward-qrcode" style="left:-15px;" src="{{ asset($sys_config['web_wepay']) }}"/>
</div>
    @endif