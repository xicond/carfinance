<?php

/* @var $this yii\web\View */
use yii\helpers\Url;
use yii\web\AssetBundle;

class FhubWidgetAsset extends AssetBundle{

    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'http://fonts.googleapis.com/css?family=Open+Sans:400,600,700',
        'css/owl.carousel.css',
        'css/tooltipster.css',
        'css/fhub_main.css',
    ];
    public $js = [
        'js/jquery.tooltipster.min.js',
        'js/owl.carousel.min.js',
        'js/fhub_main.js',
        'js/fhub_widget.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
    ];

}


$this->registerAssetBundle(FhubWidgetAsset::className(), $this::POS_END);

?>
<div class="clt_col_aside">
    <div class="clt_block_panel">
        <div class="clt_block_panel_head">
            <div class="clt_head_icon clt_icon_cal"></div>
            <?= Yii::t('fhub', 'Car Financial Calculator(s)')?>
        </div>
        <ul class="clt_accordion">
            <li>
                <div class="clt_accr_head">
                    <div>
                        <span class="clt_accr_highlight"><?=Yii::t('fhub', 'Currency')?> <span id="fcost2">0,000</span></span>
                        <?=Yii::t('fhub', 'Car loan monthly installment')?>
                    </div>
                </div>
                <div class="clt_accr_content">
                    <form action="#" id="finance-form" method="post">
                        <div class="clt_form_block clt_form">
                            <div id="fcost_error" style="display: none;"></div>
                            <div class="clt_form_group">
                                <label for="car_price" class="clt_ctrl_label">
                                    <?=Yii::t('fhub', 'Vehicle Price');?>
                                    <span class="clt_tooltip_help" title="<?=Yii::t('fhub', 'The selling price of the vehicle you intend to purchase.')?>"></span>
                                </label>
                                <div class="clt_ctrl_block">
                                    <input type="text" class="clt_form_ctrl" name="car_price" id="car_price" placeholder="<?=Yii::t('fhub', 'Vehicle Price');?>" value="100000.00">
                                </div>
                            </div>
                            <div class="clt_form_group">
                                <label for="deposit_amount" class="clt_ctrl_label">
                                    <?=Yii::t('fhub', 'Deposit Amount')?>
                                    <span class="clt_tooltip_help" title="<?=Yii::t('fhub', 'The amount of money you intend to pay on your own that is not covered by the loan you will be taking from a bank.')?>"></span>
                                </label>
                                <div class="clt_ctrl_block">
                                    <input type="text" class="clt_form_ctrl" name="deposit_amount" id="deposit_amount" placeholder="<?=Yii::t('fhub', 'Deposit Amount')?>" value="10000.00">
                                </div>
                            </div>
                            <div class="clt_form_group">
                                <label for="interest_rate" class="clt_ctrl_label">
                                    <?=Yii::t('fhub', 'Interest Rate')?>
                                    <span class="clt_tooltip_help" title="<?=Yii::t('fhub', 'The interest rate on the loan that is being charged to you by the bank.')?>"></span>
                                </label>
                                <div class="clt_ctrl_block">
                                    <input type="text" class="clt_form_ctrl" name="interest_rate" id="interest_rate" placeholder="<?=Yii::t('fhub', 'Interest Rate')?>" value="3">
                                </div>
                            </div>
                            <div class="clt_form_group">
                                <label for="repayment_period" class="clt_ctrl_label">
                                    <?=Yii::t('fhub', 'Repayment Period');?>
                                    <span class="clt_tooltip_help" title="<?=Yii::t('fhub', 'The duration that you have to pay off your loan to the bank in entirety.')?>"></span>
                                </label>
                                <div class="clt_ctrl_block">
                                    <input type="text" class="clt_form_ctrl" name="repayment_period" id="repayment_period" placeholder="<?=Yii::t('fhub', 'Repayment Period');?>" value="7">
                                </div>
                            </div>
                        </div>
                        <div class="clt_form_foot">
                            <span class="clt_foot_highlight"><?=Yii::t('fhub', 'Currency')?> <span id="fcost">0,000</span></span>
                            <?=Yii::t('fhub', 'Car loan monthly installment*')?>
                        </div>
                        <div class="clt_box_highlight">
                            <p><?=Yii::t('fhub', 'Get today’s financing deal!');?></p>
                            <a href="<?=Url::to(['carfinance/index', 'ref_url' => $_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']], true)?>" target="_blank"><button type="button" class="clt_btn clt_btn_submit clt_btn_block clt_btn_lg"><?=Yii::t('fhub', 'Request a quote')?></button></a>
                        </div>
                        <p class="clt_disclaimer">
                            <?=Yii::t('fhub', '*Please use this calculator as a guide only. All interest rates, amounts and terms are based on a personal simulation by you and your assumptions of same. The results in every case are approximate. Carlist.my does not guarantee its accuracy or applicability to your circumstances.')?>
                        </p>
                        <input type="hidden" name="fhub_finance_url" id="fhub_finance_url" value="<?=Url::to(['carfinance/calculate_finance'])?>">
                    </form>
                </div>
            </li>
            <li>
                <div class="clt_accr_head">
                    <div>
                        <span class="clt_accr_highlight"><?=Yii::t('fhub', 'Currency')?> <span id="pcost2">0,000</span></span>
                        <?= Yii::t('fhub', 'Calculate your annual insurance premium')?>
                    </div>
                </div>
                <div class="clt_accr_content">
                    <form action="#" id="insurance-form" method="post" onsubmit="return false;">
                        <div class="clt_form_block">
                            <div id="pcost_error" style="display: none;"></div>
                            <div class="clt_form_group">
                                <label for="market_price" class="clt_ctrl_label">
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
                        <div class="clt_form_foot">
                            <span class="clt_foot_highlight"><?=Yii::t('fhub', 'Currency')?> <span id="pcost">0,000</span></span>
                            <?=Yii::t('fhub', 'Car annual insurance premium*')?>
                        </div>
                        <div class="clt_box_highlight">
                            <p><?=Yii::t('fhub', 'Get today’s insurance deal!');?></p>
                            <a href="<?=Url::to(['carfinance/index', 'ref_url' => $_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']], true)?>" target="_blank"><button type="button" class="clt_btn clt_btn_submit clt_btn_block clt_btn_lg"><?=Yii::t('fhub', 'Request a quote')?></button></a>
                        </div>
                        <p class="clt_disclaimer">
                            <?=Yii::t('fhub', '*Please use this calculator as a guide only. All interest rates, amounts and terms are based on a personal simulation by you and your assumptions of same. The results in every case are approximate. Carlist.my does not guarantee its accuracy or applicability to your circumstances.')?>
                        </p>
                        <input type="hidden" name="fhub_insurance_url" id="fhub_insurance_url" value="<?=Url::to(['carfinance/calculate_insurance'])?>">
                    </form>
                </div>
            </li>
        </ul>
        <div class="clt_block_brought_by">
            <?=Yii::t('fhub', 'Brought to you by')?>
            <div class="clt_brands">
                <img src="<?=Yii::getAlias('@web');?>/img/<?=Yii::$app->params['finance_sponsor_logo']?>" alt="<?=Yii::$app->params['finance_sponsor_name']?>">
                <img src="<?=Yii::getAlias('@web');?>/img/<?=Yii::$app->params['insurance_sponsor_logo']?>" alt="<?=Yii::$app->params['insurance_sponsor_name']?>">
            </div>
        </div>
    </div>
</div>
