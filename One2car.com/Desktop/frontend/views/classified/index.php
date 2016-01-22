<?php

/* @var $this yii\web\View */
use yii\helpers\Url;
use yii\web\AssetBundle;
use app\components\fhubWidget;

class ClassifiedAsset extends AssetBundle{

    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [

    ];
    public $js = [

    ];
    public $depends = [
        'yii\web\YiiAsset',
    ];

}


$this->registerAssetBundle(ClassifiedAsset::className(), $this::POS_END);

?>
<div id="clt_main_container">
    <div class="clt_container">
        <div class="clt_col_container">
            <div class="clt_col_main">
                <p>...</p>
            </div>
            <?= fhubWidget::widget();?>
            <!--
            <div class="clt_col_aside">
                <div class="clt_block_panel">
                    <div class="clt_block_panel_head">
                        <div class="clt_head_icon clt_icon_cal"></div>
                        Car Financial Calculator(s)
                    </div>
                    <ul class="clt_accordion">
                        <li>
                            <div class="clt_accr_head">
                                <div>
                                    <span class="clt_accr_highlight">RM 1,847</span>
                                    Car loan monthly installment
                                </div>
                            </div>
                            <div class="clt_accr_content">
                                <form action="#">
                                    <div class="clt_form_block clt_form">
                                        <div class="clt_form_group">
                                            <label for="inputMarketPrice" class="clt_ctrl_label">
                                                Market Price
                                                <span class="clt_tooltip_help" title="Tooltip content goes here."></span>
                                            </label>
                                            <input type="text" class="clt_form_ctrl" name="inputMarketPrice" id="inputMarketPrice" placeholder="">
                                        </div>
                                        <div class="clt_form_group">
                                            <label class="clt_ctrl_label">
                                                Coverage Type
                                                <span class="clt_tooltip_help" title="Tooltip content goes here."></span>
                                            </label>
                                            <div class="clt_switch">
                                                <label class="clt_switch_button">
                                                    <span>Comprehensive</span>
                                                    <input type="radio" name="inputCoverageType" checked value="1">
                                                </label>
                                                <label class="clt_switch_button">
                                                    <span>Third Party</span>
                                                    <input type="radio" name="inputCoverageType" value="2">
                                                </label>
                                            </div>
                                        </div>
                                        <div class="clt_form_group">
                                            <label class="clt_ctrl_label">
                                                Location
                                            </label>
                                            <div class="clt_switch">
                                                <label class="clt_switch_button">
                                                    <span>Peninsular Malaysia</span>
                                                    <input type="radio" name="inputLocation" value="1">
                                                </label>
                                                <label class="clt_switch_button">
                                                    <span>Sabah / Sarawak / Labuan</span>
                                                    <input type="radio" name="inputLocation" checked value="2">
                                                </label>
                                            </div>
                                        </div>
                                        <div class="clt_form_group">
                                            <label for="inputEngineCapacity" class="clt_ctrl_label">
                                                Engine Capacity
                                                <span class="clt_tooltip_help" title="Tooltip content goes here."></span>
                                            </label>
                                            <select type="text" class="clt_form_ctrl" id="inputEngineCapacity" name="inputEngineCapacity">
                                                <option value="1">Option 1</option>
                                                <option value="2">Option 1</option>
                                                <option value="3">Option 1</option>
                                            </select>
                                        </div>
                                        <div class="clt_form_group">
                                            <label for="inputNoClaimsDisc" class="clt_ctrl_label">
                                                No Claims Discount
                                                <span class="clt_tooltip_help" title="Tooltip content goes here."></span>
                                            </label>
                                            <select type="text" class="clt_form_ctrl" id="inputNoClaimsDisc" name="inputNoClaimsDisc">
                                                <option value="1">Option 1</option>
                                                <option value="2">Option 1</option>
                                                <option value="3">Option 1</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="clt_form_foot">
                                        <span class="clt_foot_highlight">RM 1,847</span>
                                        Car annual insurance premium*
                                    </div>
                                    <div class="clt_box_highlight">
                                        <p>Get today’s insurance deal!</p>
                                        <button type="submit" class="clt_btn clt_btn_submit clt_btn_block clt_btn_lg">REQUEST A QUOTE</button>
                                    </div>
                                    <p class="clt_disclaimer">
                                        Please use this loan calculator as a guide only. All interest rates, amounts and terms are based on a personal simulation by you and your assumptions of same. The repayment results in every case are approximate. Carlist.my does not guarantee its accuracy or applicability to your circumstances.
                                    </p>
                                </form>
                            </div>
                        </li>
                        <li>
                            <div class="clt_accr_head">
                                <div>
                                    <span class="clt_accr_highlight">RM 1,847</span>
                                    Calculate your annual insurance premium
                                </div>
                            </div>
                            <div class="clt_accr_content">
                                <form action="#">
                                    <div class="clt_form_block">
                                        <div class="clt_form_group">
                                            <label for="inputMarketPrice" class="clt_ctrl_label">
                                                Market Price
                                                <span class="clt_tooltip_help" title="Tooltip content goes here."></span>
                                            </label>
                                            <input type="text" class="clt_form_ctrl" name="inputMarketPrice" id="inputMarketPrice" placeholder="">
                                        </div>
                                        <div class="clt_form_group">
                                            <label class="clt_ctrl_label">
                                                Coverage Type
                                                <span class="clt_tooltip_help" title="Tooltip content goes here."></span>
                                            </label>
                                            <div class="clt_switch">
                                                <label class="clt_switch_button">
                                                    <span>Comprehensive</span>
                                                    <input type="radio" name="inputCoverageType" checked value="1">
                                                </label>
                                                <label class="clt_switch_button">
                                                    <span>Third Party</span>
                                                    <input type="radio" name="inputCoverageType" value="2">
                                                </label>
                                            </div>
                                        </div>
                                        <div class="clt_form_group">
                                            <label class="clt_ctrl_label">
                                                Location
                                            </label>
                                            <div class="clt_switch">
                                                <label class="clt_switch_button">
                                                    <span>Peninsular Malaysia</span>
                                                    <input type="radio" name="inputLocation" value="1">
                                                </label>
                                                <label class="clt_switch_button">
                                                    <span>Sabah / Sarawak / Labuan</span>
                                                    <input type="radio" name="inputLocation" checked value="2">
                                                </label>
                                            </div>
                                        </div>
                                        <div class="clt_form_group">
                                            <label for="inputEngineCapacity" class="clt_ctrl_label">
                                                Engine Capacity
                                                <span class="clt_tooltip_help" title="Tooltip content goes here."></span>
                                            </label>
                                            <select type="text" class="clt_form_ctrl" id="inputEngineCapacity" name="inputEngineCapacity">
                                                <option value="1">Option 1</option>
                                                <option value="2">Option 1</option>
                                                <option value="3">Option 1</option>
                                            </select>
                                        </div>
                                        <div class="clt_form_group">
                                            <label for="inputNoClaimsDisc" class="clt_ctrl_label">
                                                No Claims Discount
                                                <span class="clt_tooltip_help" title="Tooltip content goes here."></span>
                                            </label>
                                            <select type="text" class="clt_form_ctrl" id="inputNoClaimsDisc" name="inputNoClaimsDisc">
                                                <option value="1">Option 1</option>
                                                <option value="2">Option 1</option>
                                                <option value="3">Option 1</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="clt_form_foot">
                                        <span class="clt_foot_highlight">RM 1,847</span>
                                        Car annual insurance premium*
                                    </div>
                                    <div class="clt_box_highlight">
                                        <p>Get today’s insurance deal!</p>
                                        <button type="submit" class="clt_btn clt_btn_submit clt_btn_block clt_btn_lg">REQUEST A QUOTE</button>
                                    </div>
                                    <p class="clt_disclaimer">
                                        Please use this loan calculator as a guide only. All interest rates, amounts and terms are based on a personal simulation by you and your assumptions of same. The repayment results in every case are approximate. Carlist.my does not guarantee its accuracy or applicability to your circumstances.
                                    </p>
                                </form>
                            </div>
                        </li>
                    </ul>
                    <div class="clt_block_brought_by">
                        Brought to you by
                        <div class="clt_brands">
                            <img src="img/cimbbank.png" alt="Cimb Bank">
                            <img src="img/liberty_insurance_black.png" alt="Liberty Insurance">
                        </div>
                    </div>
                </div>
            </div>
            -->
        </div>
    </div>
</div>