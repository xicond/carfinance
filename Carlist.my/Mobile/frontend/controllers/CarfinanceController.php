<?php
namespace frontend\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * Site controller
 */
class CarfinanceController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['calculate_finance', 'calculate_insurance', 'flead_signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => [],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'calculate_finance' => ['get'],
                    'calculate_insurance' => ['get'],
                    'flead_signup' => ['get'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $url=Yii::$app->params['finance_news_feed_url'];
        $username = Yii::$app->params['login_username'];
        $password = Yii::$app->params['login_password'];
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_TIMEOUT, 30); //timeout after 30 seconds
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
        curl_setopt($ch, CURLOPT_USERPWD, "$username:$password");
        $status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);   //get status code
        $result=curl_exec ($ch);
        $result = json_decode($result);
        $all_finance_news = $result->result;
        $finance_featured_news = "";
        $finance_news_list = "";
        $n = 1;
        foreach($all_finance_news as $news){
            if($n == 1){
                $finance_featured_news = "<div class=\"clt_article_header\">
                                            <div class=\"clt_post_thumb\">
                                                <a href=\"http://carlist.my/news/$news->slug/$news->nid\" target='_blank'>
                                                    <img src=\"$news->image\" alt=\"$news->title\" class=\"clt_img_wide\">
                                                </a>
                                            </div>
                                            <h3>
                                                <a href=\"http://carlist.my/news/$news->slug/$news->nid\" target='_blank'>$news->title</a>
                                            </h3>
                                            <div class=\"clt_post_info\">
                                                <!--<span class=\"clt_label clt_label_buyers_guide\" style='background-color: #fa0909;'>".$news->category_tag[0]->name."</span>-->
                                                <a href=\"#\" class=\"clt_post_author\">".$news->editor->name."</a>
                                                <span class=\"clt_post_time\">".date("F j, Y H:i",$news->created)."</span>
                                            </div>
                                        </div>
                                        <p>
                                            ".$this->tokenTruncate($news->body,200)."....
                                            <a href=\"http://carlist.my/news/$news->slug/$news->nid\" target='_blank' class=\"clt_post_read_more\">".Yii::t('fhub', 'Read more here')."</a>
                                        </p>";
            }
            else{

                if(in_array($n,[2,5,8,11,14,17,20])){
                    $finance_news_list .= "<div class=\"owl-item\">";
                }

                $finance_news_list .= "<div class=\"clt_article\">
                                            <div class=\"clt_article_header\">
                                                <h4>
                                                    <a href=\"http://carlist.my/news/$news->slug/$news->nid\" target='_blank'>$news->title</a>
                                                </h4>
                                                <div class=\"clt_post_info\">
                                                    <!--<span class=\"clt_label clt_label_news\">".$news->category_tag[0]->name."</span>-->
                                                    <a href=\"#\" class=\"clt_post_author\">".$news->editor->name."</a>
                                                    <span class=\"clt_post_time\">".date("F j, Y H:i",$news->created)."</span>
                                                </div>
                                            </div>
                                            <p>
                                                ".$this->tokenTruncate($news->body,150)."....
                                                <a href=\"http://carlist.my/news/$news->slug/$news->nid\" target='_blank' class=\"clt_post_read_more\">".Yii::t('fhub', 'Read more here')."</a>
                                            </p>
                                        </div>";

                if(in_array($n,[4,7,10,13,16,19])){
                    $finance_news_list .= "</div>";
                }

            }
            $n++;
        }


        //get insurance news
        $url=Yii::$app->params['finance_news_feed_url'];
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_TIMEOUT, 30); //timeout after 30 seconds
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
        curl_setopt($ch, CURLOPT_USERPWD, "$username:$password");
        $status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);   //get status code
        $result=curl_exec ($ch);
        $result = json_decode($result);
        $all_insurance_news = $result->result;
        $insurance_featured_news = "";
        $insurance_news_list = "";
        $n = 1;
        foreach($all_insurance_news as $news){
            if($n == 1){
                $insurance_featured_news = "<div class=\"clt_article_header\">
                                                <div class=\"clt_post_thumb\">
                                                    <a href=\"http://carlist.my/news/$news->slug/$news->nid\" target='_blank'>
                                                        <img src=\"$news->image\" alt=\"$news->title\" class=\"clt_img_wide\">
                                                    </a>
                                                </div>
                                                <h3>
                                                    <a href=\"http://carlist.my/news/$news->slug/$news->nid\" target='_blank'>$news->title</a>
                                                </h3>
                                                <div class=\"clt_post_info\">
                                                    <!--<span class=\"clt_label clt_label_buyers_guide\" style='background-color: #fa0909;'>".$news->category_tag[0]->name."</span>-->
                                                    <a href=\"#\" class=\"clt_post_author\">".$news->editor->name."</a>
                                                    <span class=\"clt_post_time\">".date("F j, Y H:i",$news->created)."</span>
                                                </div>
                                            </div>
                                            <p>
                                                ".$this->tokenTruncate($news->body,200)."....
                                                <a href=\"http://carlist.my/news/$news->slug/$news->nid\" target='_blank' class=\"clt_post_read_more\">".Yii::t('fhub', 'Read more here')."</a>
                                            </p>";
            }
            else{

                if(in_array($n,[2,5,8,11,14,17,20])){
                    $insurance_news_list .= "<div class=\"owl-item\">";
                }

                $insurance_news_list .= "<div class=\"clt_article\">
                                            <div class=\"clt_article_header\">
                                                <h4>
                                                    <a href=\"http://carlist.my/news/$news->slug/$news->nid\" target='_blank'>$news->title</a>
                                                </h4>
                                                <div class=\"clt_post_info\">
                                                    <!--<span class=\"clt_label clt_label_news\">".$news->category_tag[0]->name."</span>-->
                                                    <a href=\"#\" class=\"clt_post_author\">".$news->editor->name."</a>
                                                    <span class=\"clt_post_time\">".date("F j, Y H:i",$news->created)."</span>
                                                </div>
                                            </div>
                                            <p>
                                                ".$this->tokenTruncate($news->body,150)."....
                                                <a href=\"http://carlist.my/news/$news->slug/$news->nid\" target='_blank' class=\"clt_post_read_more\">".Yii::t('fhub', 'Read more here')."</a>
                                            </p>
                                        </div>";

                if(in_array($n,[4,7,10,13,16,19])){
                    $insurance_news_list .= "</div>";
                }

            }
            $n++;
        }

        return $this->render('index', ['finance_featured_news' => $finance_featured_news, 'finance_news' => $finance_news_list, 'insurance_featured_news' => $insurance_featured_news, 'insurance_news' => $insurance_news_list]);
    }


    public function actionCalculate_finance(){
        $loan_amt = $_REQUEST['car_price'] - $_REQUEST['deposit_amount'];
        $monthly_installment = ($loan_amt + ($loan_amt*($_REQUEST['interest_rate']/100)*$_REQUEST['repayment_period']))/($_REQUEST['repayment_period']*12);
        $monthly_installment = ceil($monthly_installment);
        $json_data = [
            "status"          => "OK",
            "msg"            => number_format($monthly_installment,0,'.',','),
        ];
        \Yii::$app->response->format = 'json';
        return $json_data;
    }


    public function actionCalculate_insurance(){
        $base_rate = Yii::$app->params['base_rates'][$_REQUEST['location']][$_REQUEST['coverage_type']][$_REQUEST['engine_capacity']];
        $addition_rate = Yii::$app->params['addition_rates'][$_REQUEST['location']];
        $insurance_premium = $base_rate + ($_REQUEST['market_price'] - 100000)*$addition_rate/100000;
        $insurance_premium = $insurance_premium - ($insurance_premium*$_REQUEST['no_claims_disc'])/100;
        $insurance_premium = ceil($insurance_premium);
        $json_data = [
            "status"          => "OK",
            "msg"            => number_format($insurance_premium,0,'.',','),
        ];
        \Yii::$app->response->format = 'json';
        return $json_data;
    }
    /**
     * Displays about page.
     *
     * @return mixed
     */


    public function actionFlead_signup(){

        $lead_type = $_REQUEST['type'];
        $email = filter_var($_REQUEST[$lead_type.'_your_email'], FILTER_SANITIZE_EMAIL);
        $name = preg_replace('/[^A-Za-z0-9\. -]/', '', $_REQUEST[$lead_type.'_your_name']);
        $mobile = preg_replace('/[^0-9\.+-]/', '', $_REQUEST[$lead_type.'_your_phone']);
        $ref_url = base64_decode($_REQUEST['ref_url']);

        if(empty($email) || empty($name) || empty($mobile)){
            $json_data = [
                "status"          => "NOTOK",
                "msg"            => "Please check all fields. All fields are required!",
            ];
            \Yii::$app->response->format = 'json';
            return $json_data;
        }
        else{

            $email_subject = " Lead received from $name on ".Yii::$app->params['portal_name'];

            $lead_body = "\r\nName: $name\r\nEmail: $email\r\nPhone: $mobile\r\nVehicle URL: $ref_url";

            $message = "A lead has been received from ".Yii::$app->params['portal_name']." with the following details :\r\n\r\n".$lead_body;
            //$sms = urlencode($message)."%0AName%3A+".urlencode($name)."%0AEmail%3A+".urlencode($email)."%0APhone%3A+".urlencode($mobile)."%0D%0ATeam+Carlist.my";
            $sms = urlencode("Lead received from ".Yii::$app->params['portal_name']."\r\n".$lead_body);
            if($lead_type == "f"){

                Yii::$app->mailer->compose()->setFrom(Yii::$app->params['from_email'])->setTo(Yii::$app->params['finance_sponsor_lead_email'])->setSubject($email_subject)->setTextBody($message)->send();

                $url = 'http://rest.nexmo.com/sms/json?api_key=084048e4&api_secret=bb68b5fa&to=' . Yii::$app->params['finance_sponsor_lead_phone'] . '&from=NEXMO&text=' . $sms ;

                //$url = Yii::$app->params['sms_base_url']."/services/my/en/telephony/sms?type=text&to=" . Yii::$app->params['finance_sponsor_lead_phone'] . "&msisdn=".Yii::$app->params['sms_msisdn']."&messageId=test1&message-timestamp=".date("Y-m-d H:i:s").".000&text=".$sms."&keyword=TEST&concat-ref&concatRef&concat-total&concat-part&data=TTTTT&udh";

                $ch = curl_init($url);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                $response = curl_exec($ch);

            }
            else{

                Yii::$app->mailer->compose()->setFrom(Yii::$app->params['from_email'])->setTo(Yii::$app->params['insurance_sponsor_lead_email'])->setSubject($email_subject)->setTextBody($message)->send();

                $url = 'http://rest.nexmo.com/sms/json?api_key=084048e4&api_secret=bb68b5fa&to=' . Yii::$app->params['insurance_sponsor_lead_phone'] . '&from=NEXMO&text=' . $sms ;

                //$url = Yii::$app->params['sms_base_url']."/services/my/en/telephony/sms?type=text&to=" . Yii::$app->params['insurance_sponsor_lead_phone'] . "&msisdn=".Yii::$app->params['sms_msisdn']."&messageId=test1&message-timestamp=".date("Y-m-d H:i:s").".000&text=".$sms."&keyword=TEST&concat-ref&concatRef&concat-total&concat-part&data=TTTTT&udh";

                $ch = curl_init($url);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                $response = curl_exec($ch);
            }

            $html = "<div class=\"clt_step_success_title\">".Yii::t('fhub', 'Submission successful!')."</div><p class=\"clt_text_center\">".Yii::t('fhub', 'Thank you for your interest. We will get back to you as soon as possible with the best offer suitable for you.')."</p><div class=\"clt_form_group\"><div type=\"submit\" class=\"clt_btn clt_btn_primary clt_btn_block clt_btn_lg\"><a href=\"tel:".Yii::$app->params['insurance_sponsor_phone']."\" style=\"color: white;\">".Yii::t('fhub', 'Call us')." ".Yii::$app->params['insurance_sponsor_phone']."</a></div></div>";
            $json_data = [
                "status"         => "OK",
                "msg"            => $html,
            ];
            \Yii::$app->response->format = 'json';
            return $json_data;
        }
    }


    private function tokenTruncate($string, $your_desired_width) {
        $parts = preg_split('/([\s\n\r]+)/', $string, null, PREG_SPLIT_DELIM_CAPTURE);
        $parts_count = count($parts);

        $length = 0;
        $last_part = 0;
        for (; $last_part < $parts_count; ++$last_part) {
            $length += strlen($parts[$last_part]);
            if ($length > $your_desired_width) { break; }
        }

        return implode(array_slice($parts, 0, $last_part));
    }
}
