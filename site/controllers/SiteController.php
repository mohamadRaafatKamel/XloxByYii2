<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\LogupForm;
use app\models\Users;

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
                'rules' => [
                      [
                        'actions' => ['login','register', 'error'],//for gest
                        'allow' => true,
                      ],
                      [
                        'actions' => ['logout', 'index' ,'about','contact','error'], //for user
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

    public function actionRegister()
    {
      $model = new Users();

      if ($model->load(Yii::$app->request->post())) {
        if ($model->validate()) {
            $model->username =$_POST['Users']['username'];
            $model->email =$_POST['Users']['email'];
            $model->password =$_POST['Users']['password'];//password_hash($_POST['Users']['password'], PASSWORD_DEFAULT);
            $model->ip =Yii::$app->getRequest()->getUserIP();  //$_SERVER['REMOTE_ADDR'];
            $model->lastlogin =date('Y-m-d h:i:s');
            $model->datereg =date('Y-m-d h:i:s');
            $model->authkey =md5(rand(5,5));
            $model->accessToken =password_hash(rand(10,10), PASSWORD_DEFAULT);

            if ($model->save()) {
              return $this->redirect(['login']);
            }


        }
      }

      return $this->render('register', ['model' => $model]);
    }

}
