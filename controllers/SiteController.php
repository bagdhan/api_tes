<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use linslin\yii2\curl;
use yii\httpclient\Client;
use yii\data\ArrayDataProvider;
use yii\helpers\Json;


class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
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

    public function actionApis2()
    {

//$client = new Client();
//$response = $client->createRequest()
   // ->setMethod('GET')
    //->setUrl('https://api.ipb.ac.id/v1/Mahasiswa/StatusMahasiswa?FilterStrata=SEMUA&JalurMasukID=0&PageNumber=1&PageSize=50')
    //->addHeaders(['X-IPBAPI-TOKEN' => 'Bearer bcf88c17-2911-34e6-a70c-ba190aae9272'])
    //->send();
//if ($response->isOk) {
    //return $response->getData();}

	$curl = new curl\curl();
	$response = $curl->setHeaders([
			'X-IPBAPI-TOKEN' => 'Bearer bcf88c17-2911-34e6-a70c-ba190aae9272'
		 ])
		 ->setOption(CURLOPT_SSL_VERIFYPEER, FALSE)
		 
		 ->get('https://api.ipb.ac.id/v1/Mahasiswa/StatusMahasiswa?FilterStrata=S2&PageSize=40000');
	 
		$data= json_decode($response, true);
		//echo "<pre>";
		//print_r($data);
		//die;
		//$data = Json::decode($response->content);
    $dataProvider = new ArrayDataProvider([
        'allModels' => $data['Items'],
        'pagination' => [
            'pageSize' => 10,
        ],
		'sort' => [
        'attributes' => ['NIM', 'Nama', 'StatusAkademik', 'Semester', 'TahunMasuk'],
    ],
    ]);
    return $this->render('apis2', [
        'dataProvider' => $dataProvider,
    ]);
	$rows = $provider->getModels();
    }
	
	public function actionApis3()
    {

$curl = new curl\Curl();
$response = $curl->setHeaders([
			'Content-Type' => 'application/json'
		 ])->setRawPostData(
     json_encode([
        'BillKey' => '123456789',
        'TanggalLahir' => '2018-01-01'
     ]))
     ->post('http://172.17.5.227:8080/authenticate');
	 $data = json_decode( $response );
	 echo $data->pendaftar->namaLengkap;
}
    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }
}
