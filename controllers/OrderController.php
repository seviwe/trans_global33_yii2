<?php

namespace app\controllers;

use Yii;
use app\models\Order;
use app\models\OrderSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\LoadInformation;
use app\models\Transport;
use yii\data\ActiveDataProvider;

/**
 * OrderController implements the CRUD actions for Order model.
 */
class OrderController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Order models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new OrderSearch();

        //отображение всех записей под логистом или админом
        if (!Yii::$app->user->isGuest && (Yii::$app->user->getIdentity()->isLogist() || Yii::$app->user->getIdentity()->isAdmin())) {
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        } else {
            //если грузовладелец
            if (!Yii::$app->user->isGuest && Yii::$app->user->getIdentity()->isUser()) {
                //выбираем все грузы
                $query = "select * from load_information where id_user = " . Yii::$app->user->getId();
                $loads = Yii::$app->db->createCommand($query)->queryAll();
                if ($loads) {
                    foreach ($loads as $load) {
                        $query = "select * from orders where id_transport = " . $load['id'];
                        $orders_loads = Yii::$app->db->createCommand($query)->queryAll();
                        if ($orders_loads) {
                            $dataProvider = new ActiveDataProvider([
                                'query' => Order::find()->where(['id_load' => $load['id']]),
                            ]);
                        } else {
                            return $this->render('empty_order');
                        }
                    }
                } else {
                    return $this->render('empty_order');
                }
            } else { //если грузоперевозчики
                if (!Yii::$app->user->isGuest && (Yii::$app->user->getIdentity()->isCarrierP() || Yii::$app->user->getIdentity()->isCarrierC())) {
                    //выбираем все машины
                    $query = "select * from transport where id_user = " . Yii::$app->user->getId();
                    $trans = Yii::$app->db->createCommand($query)->queryAll();
                    if ($trans) {
                        foreach ($trans as $tran) {
                            $query = "select * from orders where id_transport = " . $tran['id'];
                            $orders_trans = Yii::$app->db->createCommand($query)->queryAll();
                            if ($orders_trans) {
                                $dataProvider = new ActiveDataProvider([
                                    'query' => Order::find()->where(['id_transport' => $tran['id']]),
                                ]);
                            } else {
                                return $this->render('empty_order');
                            }
                        }
                    } else {
                        return $this->render('empty_order');
                    }
                } else {
                    return $this->goHome();
                }
            }
        }
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Order model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        if (!Yii::$app->user->isGuest && (Yii::$app->user->getIdentity()->isLogist() || Yii::$app->user->getIdentity()->isAdmin())) {
            return $this->render('view', [
                'model' => $this->findModel($id),
            ]);
        } else {
            return $this->goHome();
        }
    }

    /**
     * Creates a new Order model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if (!Yii::$app->user->isGuest && (Yii::$app->user->getIdentity()->isLogist() || Yii::$app->user->getIdentity()->isAdmin())) {
            $model = new Order();

            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                Yii::$app->session->setFlash('success', 'Заказ №' . $model->id . ' успешно добавлен.');

                return $this->redirect(['view', 'id' => $model->id]);
            }

            return $this->render('create', [
                'model' => $model,
            ]);
        } else {
            return $this->goHome();
        }
    }

    /**
     * Updates an existing Order model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        if (!Yii::$app->user->isGuest && (Yii::$app->user->getIdentity()->isLogist() || Yii::$app->user->getIdentity()->isAdmin())) {
            $model = $this->findModel($id);

            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                Yii::$app->session->setFlash('success', 'Заказ №' . $model->id . ' успешно обновлен.');

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
     * Deletes an existing Order model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        if (!Yii::$app->user->isGuest && (Yii::$app->user->getIdentity()->isLogist() || Yii::$app->user->getIdentity()->isAdmin())) {
            $model = $this->findModel($id);

            Yii::$app->session->setFlash('success', 'Заказ №' . $model->id . ' успешно удален.');

            $this->findModel($id)->delete();

            return $this->redirect(['index']);
        } else {
            return $this->goHome();
        }
    }

    /**
     * Finds the Order model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Order the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Order::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
