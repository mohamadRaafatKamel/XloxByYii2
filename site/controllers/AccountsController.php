<?php

namespace app\controllers;

use Yii;
use app\models\Accounts;
use app\models\AccountsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\AppsCountries;
use yii\helpers\ArrayHelper;
use yii\db\Query;

/**
 * AccountsController implements the CRUD actions for Accounts model.
 */
class AccountsController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
          'access' => [
              'class' => 'yii\filters\AccessControl',
              'rules' => [
                [
                  'actions' => ['login', 'error'],
                  'allow' => true,
                ],
                [
                  'allow' => true,
                  'roles' => ['@'],
                ],
              ],
          ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Accounts models.
     * @return mixed
     */
    public function actionIndex($stat0000="")
    {
        $searchModel = new AccountsSearch();

        $searchModel->stat = $stat0000;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Accounts model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $model=$this->findModel($id);
        // $cont = AppsCountries::find()->where(['id' => $model->country])->one();
        // $model->country = $cont->country_name;
        return $this->render('view', [
            'model' => $model,
        ]);
    }

    /**
     * Creates a new Accounts model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Accounts();

        if ($model->load(Yii::$app->request->post())) {

          $model->uid =Yii::$app->user->identity->uid;
          $model->stat ="Unsold";

          if($model->save()){
            return $this->redirect(['view', 'id' => $model->aid]);
          }
        }

        $countries=AppsCountries::find()->all();
        $listCont=ArrayHelper::map($countries,'country_name','country_name');

        return $this->render('create', [
            'model' => $model,
            'listCont'=>$listCont,
        ]);
    }

    /**
     * Updates an existing Accounts model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->aid]);
        }

        $countries=AppsCountries::find()->all();
        $listCont=ArrayHelper::map($countries,'country_name','country_name');

        return $this->render('update', [
            'model' => $model,
            'listCont'=>$listCont,
        ]);
    }

    /**
     * Deletes an existing Accounts model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
      $model = $this->findModel($id);

      $model = Accounts::find()->where(['aid' => $id])->one();
      $model->stat = 'Delete';
      $model->save();

       return $this->render('view',['model' => $model,]);
    }

    /**
     * Finds the Accounts model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Accounts the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Accounts::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
