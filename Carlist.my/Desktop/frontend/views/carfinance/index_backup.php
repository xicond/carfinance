<?php

/* @var $this yii\web\View */
use yii\helpers\Url;
use yii\web\AssetBundle;

class CarFinanceAsset extends AssetBundle{

    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'http://fonts.googleapis.com/css?family=Open+Sans:400,600,700',
        'css/owl.carousel.css',
        'css/tooltipster.css',
        'css/main.css',
    ];
    public $js = [
        'js/jquery.tooltipster.min.js',
        'js/owl.carousel.min.js',
        'js/main.js',
        'js/calculator.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
    ];

}


$this->registerAssetBundle(CarFinanceAsset::className(), $this::POS_END);

$this->title = Yii::$app->params['seo_title'];
?>
<div id="clt_top_ad" class="clt_container">
    <a href="#"><img src="<?=Yii::getAlias('@web')?>/img/banner_ad.jpg" alt="" class="clt_img_wide"></a>
</div>
<div id="clt_main_container">
    <div class="clt_container">
        <div class="clt_col_container">
            <div class="clt_col_main">
                <div class="clt_tabs_container">
                    <ul class="clt_tabs clt_tabs_with_icons clt_tabs_outer" data-default='1'>
                        <li class="clt_tab_car_finance"><a href="#tab_car_finance" onclick="change_feed('f');"><?=Yii::t('fhub','Car Finance')?></a></li>
                        <li class="clt_tab_car_insurance"><a href="#tab_car_insurance" onclick="change_feed('i');"><?=Yii::t('fhub','Car Insurance')?></a></li>
                    </ul>
                    <div class="clt_tabs_content">
                        <div class="clt_tab_content" id="tab_car_finance">
                            <div class="clt_step_panel">
                                <form action="#" id="finance-form" method="post">
                                    <div class="clt_step_head">
                                        <strong>1</strong>
                                        <?=Yii::t('fhub', 'Calculate')?> <?=Yii::t('fhub','Car loan monthly installment');?>
                                    </div>
                                    <div class="clt_step_content clt_form_horizontal">
                                        <div class="ctl_alert ctl_alert_error" id="fcost_error" style="display: none;">
                                            <p></p>
                                        </div>
                                        <div class="clt_form_group">
                                            <label for="inputVehiclePrice" class="clt_ctrl_label">
                                                <?=Yii::t('fhub', 'Vehicle Price');?>
                                                <span class="clt_tooltip_help" title="<?=Yii::t('fhub', 'The selling price of the vehicle you intend to purchase.')?>"></span>
                                            </label>
                                            <div class="clt_ctrl_block">
                                                <input type="text" class="clt_form_ctrl" name="car_price" id="car_price" placeholder="<?=Yii::t('fhub', 'Vehicle Price');?>" value="100000.00">
                                            </div>
                                        </div>
                                        <div class="clt_form_group">
                                            <label for="inputDepositAmount" class="clt_ctrl_label">
                                                <?=Yii::t('fhub', 'Deposit Amount')?>
                                                <span class="clt_tooltip_help" title="<?=Yii::t('fhub', 'The amount of money you intend to pay on your own that is not covered by the loan you will be taking from a bank.')?>"></span>
                                            </label>
                                            <div class="clt_ctrl_block">
                                                <input type="text" class="clt_form_ctrl" name="deposit_amount" id="deposit_amount" placeholder="<?=Yii::t('fhub', 'Deposit Amount')?>" value="10000.00">
                                            </div>
                                        </div>
                                        <div class="clt_form_group">
                                            <label for="inputInterestRate" class="clt_ctrl_label">
                                                <?=Yii::t('fhub', 'Interest Rate')?>
                                                <span class="clt_tooltip_help" title="<?=Yii::t('fhub', 'The interest rate on the loan that is being charged to you by the bank.')?>"></span>
                                            </label>
                                            <div class="clt_ctrl_block">
                                                <input type="text" class="clt_form_ctrl" name="interest_rate" id="interest_rate" placeholder="<?=Yii::t('fhub', 'Interest Rate')?>" value="3">
                                            </div>
                                        </div>
                                        <div class="clt_form_group">
                                            <label for="inputRepaymentPeriod" class="clt_ctrl_label">
                                                <?=Yii::t('fhub', 'Repayment Period');?>
                                                <span class="clt_tooltip_help" title="<?=Yii::t('fhub', 'The duration that you have to pay off your loan to the bank in entirety.')?>"></span>
                                            </label>
                                            <div class="clt_ctrl_block">
                                                <input type="text" class="clt_form_ctrl" name="repayment_period" id="repayment_period" placeholder="<?=Yii::t('fhub', 'Repayment Period');?>" value="7">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="clt_step_foot">
                                        <span class="clt_foot_text"><?=Yii::t('fhub', 'Car loan monthly installment*')?></span>
                                        <span class="clt_foot_highlight"><?=Yii::t('fhub', 'Currency')?> <span id="fcost">0,000</span></span>
                                    </div>
                                    <input type="hidden" name="fhub_finance_url" id="fhub_finance_url" value="<?=Url::to(['carfinance/calculate_finance'])?>">
                                </form>
                            </div>
                            <div class="clt_step_panel clt_step_highlight clt_step_success">
                                <form action="#" method="post" id="flead-form">
                                    <div class="clt_step_head">
                                        <strong>2</strong>
                                        <?=Yii::t('fhub', 'Get today’s financing deal!');?>
                                    </div>
                                    <div class="clt_step_content" id="fcon">
                                        <div class="ctl_alert ctl_alert_success" id="fsuccess" style="display: none;">
                                            <p></p>
                                        </div>
                                        <div class="ctl_alert ctl_alert_error" id="ferror" style="display: none;">
                                            <p></p>
                                        </div>
                                        <p class="clt_text_center">
                                            <button type="button" class="clt_btn clt_btn_submit clt_btn_lg clt_toggle_box" data-toggle-target="request_quote1" style="width: 350px;"><?=Yii::t('fhub', 'Request a quote');?></button>
                                        </p>
                                        <div class="clt_form_slim" id="request_quote1" style="display: none;">
                                            <div class="clt_form_group">
                                                <input type="text" class="clt_form_ctrl" name="f_your_name" id="f_your_name" placeholder="<?=Yii::t('fhub','Your name');?>" onchange="check_lead_name('f');">
                                                <div class="ctl_alert ctl_alert_error_control" id="f_name_error" style="display: none;">
                                                    <p></p>
                                                </div>
                                            </div>
                                            <div class="clt_form_group">
                                                <input type="text" class="clt_form_ctrl" name="f_your_email" id="f_your_email" placeholder="<?=Yii::t('fhub', 'Your email');?>" onchange="check_lead_email('f');">
                                                <div class="ctl_alert ctl_alert_error_control" id="f_email_error" style="display: none;">
                                                    <p></p>
                                                </div>
                                            </div>
                                            <div class="clt_form_group">
                                                <input type="text" class="clt_form_ctrl" name="f_your_phone" id="f_your_phone" placeholder="<?=Yii::t('fhub', 'Your contact no.');?>" onchange="check_lead_phone('f');">
                                                <div class="ctl_alert ctl_alert_error_control" id="f_phone_error" style="display: none;">
                                                    <p></p>
                                                </div>
                                            </div>
                                            <div class="clt_form_group">
                                                <div class="clt_checkbox clt_text_center">
                                                    <label>
                                                        <input type="checkbox" id="f_agreement" name="f_agreement" onchange="check_tos('f')"> <?=Yii::t('fhub', 'I agree with the')?> <a href="#"><?=Yii::t('fhub', 'terms and conditions');?></a>

                                                    </label>

                                                </div>
                                                <div class="ctl_alert ctl_alert_error_control" id="f_agreement_error" style="display: none;">
                                                    <p></p>
                                                </div>
                                            </div>
                                            <div class="clt_form_group">
                                                <button type="submit" id="flead_button" class="clt_btn clt_btn_submit clt_btn_block clt_btn_lg"><?=Yii::t('fhub', 'Request a quote');?></button>
                                                <div class="clt_sep_or"><span><?=Yii::t('fhub', 'or')?></span></div>
                                                <div type="submit" class="clt_btn clt_btn_primary clt_btn_block clt_btn_lg"><?=Yii::t('fhub', 'Call us');?> <?=Yii::$app->params['finance_sponsor_phone'];?></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="clt_step_foot">
											<span class="clt_brought_by clearfix">
												<?=Yii::t('fhub','Brought to you by')?>
												<img src="<?=Yii::getAlias('@web');?>/img/<?=Yii::$app->params['finance_sponsor_logo']?>" alt="<?=Yii::$app->params['finance_sponsor_name']?>">
											</span>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="clt_tab_content" id="tab_car_insurance">
                            <div class="clt_step_panel">
                                <form action="#" id="insurance-form" method="post" onsubmit="return false;">
                                    <div class="clt_step_head">
                                        <strong>1</strong>
                                        <?=Yii::t('fhub','Calculate your annual premium');?>
                                    </div>
                                    <div class="clt_step_content clt_form_horizontal">
                                        <div class="ctl_alert ctl_alert_error" id="pcost_error" style="display: none;">
                                            <p></p>
                                        </div>
                                        <div class="clt_form_group">
                                            <label for="inputMarketPrice" class="clt_ctrl_label">
                                                <?=Yii::t('fhub', 'Market Price')?>
                                                <span class="clt_tooltip_help" title="<?=Yii::t('fhub', 'This represents the average sale price of your vehicle in the current marketplace.')?>"></span>
                                            </label>
                                            <div class="clt_ctrl_block">
                                                <input type="text" class="clt_form_ctrl" name="market_price" id="market_price" placeholder="<?=Yii::t('fhub', 'Market Price')?>" value="100000.00">
                                            </div>
                                        </div>
                                        <div class="clt_form_group">
                                            <label class="clt_ctrl_label">
                                                <?=Yii::t('fhub', 'Coverage Type')?>
                                                <span class="clt_tooltip_help" title="<?=Yii::t('fhub', 'The coverage type you select determines the level of protection offered by your insurance policy. Comprehensive : Covers damage of your car as a result of fire, theft and damage (inclusive of third party damages). Third Party : Only covers damage to third party vehicles')?>"></span>
                                            </label>
                                            <div class="clt_ctrl_block">
                                                <div class="clt_switch">
                                                    <?php
                                                    $i = 1;
                                                    foreach(Yii::$app->params['coverage_types'] as $k=>$v){
                                                        echo "<label class=\"clt_switch_button\">
                                                                    <span>$v</span>
                                                                    <input type=\"radio\" name=\"coverage_type\" ".(($i==1) ? "checked" : "")." value=\"$k\" onchange='calculate_pcost();'>
                                                                </label>";
                                                        $i++;
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="clt_form_group">
                                            <label class="clt_ctrl_label">
                                                <?=Yii::t('fhub','Location')?>
                                                <span class="clt_tooltip_help" title="<?=Yii::t('fhub', 'The location where you will be using your vehicle.')?>"></span>
                                            </label>
                                            <div class="clt_ctrl_block">
                                                <div class="clt_switch">
                                                    <?php
                                                    $i = 1;
                                                    foreach(Yii::$app->params['locations'] as $k=>$v){
                                                        echo "<label class=\"clt_switch_button\">
                                                                    <span>$v</span>
                                                                    <input type=\"radio\" name=\"location\" ".(($i==1) ? "checked" : "")." value=\"$k\" onchange='calculate_pcost();'>
                                                                </label>";
                                                        $i++;
                                                    }
                                                    ?>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="clt_form_group">
                                            <label for="inputEngineCapacity" class="clt_ctrl_label">
                                                <?=Yii::t('fhub', 'Engine Capacity')?>
                                                <span class="clt_tooltip_help" title="<?=Yii::t('fhub', 'This refers to the engine size of the vehicle you intend to purchase.')?>"></span>
                                            </label>
                                            <div class="clt_ctrl_block">
                                                <select type="text" class="clt_form_ctrl" id="engine_capacity" name="engine_capacity" onchange="calculate_pcost();">
                                                    <?php
                                                        foreach(Yii::$app->params['capacities'] as $k=>$v){
                                                            echo "<option value=\"$k\">$v</option>";
                                                        }
                                                    ?>

                                                </select>
                                            </div>
                                        </div>
                                        <div class="clt_form_group">
                                            <label for="inputNoClaimsDisc" class="clt_ctrl_label">
                                                <?=Yii::t('fhub', 'No Claims Discount')?>
                                                <span class="clt_tooltip_help" title="<?=Yii::t('fhub', 'This is a discount that is offered by your insurance provider if you have not made a claim on your existing insurance policy for a certain number of years.')?>"></span>
                                            </label>
                                            <div class="clt_ctrl_block">
                                                <select type="text" class="clt_form_ctrl" id="no_claims_disc" name="no_claims_disc" onchange="calculate_pcost();">
                                                    <?php
                                                        foreach(Yii::$app->params['nc_discounts'] as $k=>$v){
                                                           echo "<option value=\"$k\">$v</option>";
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="clt_step_foot">
                                        <span class="clt_foot_text"><?=Yii::t('fhub', 'Car annual insurance premium*')?></span>
                                        <span class="clt_foot_highlight"><?=Yii::t('fhub', 'Currency')?> <span id="pcost">0,000</span></span>
                                    </div>
                                    <input type="hidden" name="fhub_insurance_url" id="fhub_insurance_url" value="<?=Url::to(['carfinance/calculate_insurance'])?>">
                                </form>
                            </div>
                            <div class="clt_step_panel clt_step_highlight clt_step_success">
                                <form action="#" method="post" id="ilead-form">
                                    <div class="clt_step_head">
                                        <strong>2</strong>
                                        <?=Yii::t('fhub', 'Get today’s insurance deal!');?>
                                    </div>
                                    <div class="clt_step_content" id="icon">
                                        <div class="ctl_alert ctl_alert_success" id="isuccess" style="display: none;">
                                            <p></p>
                                        </div>
                                        <div class="ctl_alert ctl_alert_error" id="ierror" style="display: none;">
                                            <p></p>
                                        </div>
                                        <p class="clt_text_center">
                                            <button type="button" class="clt_btn clt_btn_submit clt_btn_lg clt_toggle_box" data-toggle-target="request_quote2" style="width: 350px;"><?=Yii::t('fhub', 'Request a quote');?></button>
                                        </p>
                                        <div class="clt_form_slim" id="request_quote2" style="display: none">
                                            <div class="clt_form_group">
                                                <input type="text" class="clt_form_ctrl" name="i_your_name" id="i_your_name" placeholder="<?=Yii::t('fhub','Your name');?>" onchange="check_lead_name('i');">
                                                <div class="ctl_alert ctl_alert_error_control" id="i_name_error" style="display: none;">
                                                    <p></p>
                                                </div>
                                            </div>
                                            <div class="clt_form_group">
                                                <input type="text" class="clt_form_ctrl" name="i_your_email" id="i_your_email" placeholder="<?=Yii::t('fhub', 'Your email');?>" onchange="check_lead_email('i');">
                                                <div class="ctl_alert ctl_alert_error_control" id="i_email_error" style="display: none;">
                                                    <p></p>
                                                </div>
                                            </div>
                                            <div class="clt_form_group">
                                                <input type="text" class="clt_form_ctrl" name="i_your_phone" id="i_your_phone" placeholder="<?=Yii::t('fhub', 'Your contact no.');?>" onchange="check_lead_phone('i');">
                                                <div class="ctl_alert ctl_alert_error_control" id="i_phone_error" style="display: none;">
                                                    <p></p>
                                                </div>
                                            </div>
                                            <div class="clt_form_group">
                                                <div class="clt_checkbox clt_text_center">
                                                    <label>
                                                        <input type="checkbox" id="i_agreement" name="i_agreement" onchange="check_tos('i')"> <?=Yii::t('fhub', 'I agree with the')?> <a href="#" target="_blank"><?=Yii::t('fhub', 'terms and conditions');?></a>
                                                    </label>
                                                </div>
                                                <div class="ctl_alert ctl_alert_error_control" id="i_agreement_error" style="display: none;">
                                                    <p></p>
                                                </div>
                                            </div>
                                            <div class="clt_form_group">
                                                <button type="submit" id="ilead_button" class="clt_btn clt_btn_submit clt_btn_block clt_btn_lg"><?=Yii::t('fhub', 'Request a quote');?></button>
                                                <div class="clt_sep_or"><span><?=Yii::t('fhub', 'or')?></span></div>
                                                <div type="button" class="clt_btn clt_btn_primary clt_btn_block clt_btn_lg"><?=Yii::t('fhub', 'Call us');?> <?=Yii::$app->params['insurance_sponsor_phone'];?></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="clt_step_foot">
											<span class="clt_brought_by clearfix">
												<?=Yii::t('fhub','Brought to you by')?>
                                                <img src="<?=Yii::getAlias('@web');?>/img/<?=Yii::$app->params['insurance_sponsor_logo']?>" alt="<?=Yii::$app->params['insurance_sponsor_name']?>">
											</span>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <p class="clt_disclaimer">
                    <small><?=Yii::t('fhub', 'Please use this calculator as a guide only. All interest rates, amounts and terms are based on a personal simulation by you and your assumptions of same. The results in every case are approximate. Carlist.my does not guarantee its accuracy or applicability to your circumstances.')?></small>
                </p>
            </div>
            <div class="clt_col_aside">
                <div class="clt_aside_block">
                    <div class="clt_step_panel clt_step_extra">
                        <div class="clt_step_head">
                            <strong>3</strong>
                            <span id="ntitle"><?=Yii::t('fhub', 'Stay up to date with car financing tips')?></span>
                        </div>
                        <div class="clt_step_content">
                            <div class="clt_article clt_article_featured" id="f_news">
                                <?=$finance_featured_news ?>
                            </div>
                            <div class="clt_aside_block_title">
                                <?=Yii::t('fhub', 'More articles')?>
                            </div>
                            <div id="more_articles" class="owl-carousel clt_carousel_news">
                                <?=$finance_news ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<input type="hidden" name="nme" id="nme" value="<?=Yii::t('fhub', 'Please enter your name!')?>">
<input type="hidden" name="phe" id="phe" value="<?=Yii::t('fhub', 'Please enter your contact number!')?>">
<input type="hidden" name="eme" id="eme" value="<?=Yii::t('fhub', 'Please enter a valid email address!')?>">
<input type="hidden" name="tce" id="tce" value="<?=Yii::t('fhub', 'Please agree to our T&C!')?>">
<input type="hidden" name="fe1" id="fe1" value="<?=Yii::t('fhub', 'Please check all fields and submit again. If that does not work, then please refresh this page and submit again.')?>">
<input type="hidden" name="fe2" id="fe2" value="<?=Yii::t('fhub', 'There is some problem in communicating with the server. Please refresh this page and try again.')?>">
<input type="hidden" name="fe3" id="fe3" value="<?=Yii::t('fhub', 'There is some problem in connecting with the server. Please refresh and try again!')?>">
<input type="hidden" name="sd" id="sd" value="<?=Yii::t('fhub', 'Submitting.Please wait')?>">
<input type="hidden" name="nt1" id="nt1" value="<?=Yii::t('fhub', 'Stay up to date with car financing tips')?>">
<input type="hidden" name="nt2" id="nt2" value="<?=Yii::t('fhub', 'Stay up to date with car insurance tips')?>">
<div id="finance_featured_news" style="display: none;"><?=$finance_featured_news?></div>
<div id="finance_news" style="display: none;"><?=$finance_news?></div>
<div id="insurance_featured_news" style="display: none;"><?=$insurance_featured_news?></div>
<div id="insurance_news" style="display: none;"><?=$insurance_news?></div>
