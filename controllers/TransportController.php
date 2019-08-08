<?php

namespace app\controllers;

use Yii;
use app\models\Transport;
use app\models\TransportSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TransportController implements the CRUD actions for Transport model.
 */
class TransportController extends Controller
{
    /**
     * {@inheritdoc}
     */
    // public function behaviors()
    // {
    //     return [
    //         'verbs' => [
    //             'class' => VerbFilter::className(),
    //             'actions' => [
    //                 'delete' => ['POST'],
    //             ],
    //         ],
    //     ];
    // }

    /**
     * Lists all Transport models.
     * @return mixed
     */
    public function actionIndex()
    {
        if (!Yii::$app->user->isGuest) {

            $searchModel = new TransportSearch();
            //отображение всех записей под логистом
            if (!Yii::$app->user->isGuest && (!Yii::$app->user->getIdentity()->isCarrierC() || !Yii::$app->user->getIdentity()->isCarrierP())) {
                $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
            } else {
                $dataProvider = new ActiveDataProvider([
                    'query' => Transport::find()->where(['id_user' => Yii::$app->user->getId()]),
                ]);
            }

            return $this->render('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        } else {
            return $this->goHome();
        }
    }

    /**
     * Displays a single Transport model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Transport model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if (!Yii::$app->user->isGuest) {

            $model = new Transport();

            if ($model->load(Yii::$app->request->post()) /*&& $model->save()*/) {

                $model->id_user = Yii::$app->user->getId();

                if ($model->save()) {
                    return $this->redirect(['view', 'id' => $model->id]);
                }
            }

            return $this->render('create', [
                'model' => $model,
            ]);
        } else {
            return $this->goHome();
        }
    }

    /**
     * Updates an existing Transport model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        if (!Yii::$app->user->isGuest) {

            $model = $this->findModel($id);

            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }

            return $this->render('update', [
                'model' => $model,
            ]);
        } else {
            return $this->goHome();
        }
    }

    /**
     * Deletes an existing Transport model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        if (!Yii::$app->user->isGuest) {
            $this->findModel($id)->delete();

            return $this->redirect(['index']);
        } else {
            return $this->goHome();
        }
    }

    /**
     * Finds the Transport model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Transport the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Transport::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
