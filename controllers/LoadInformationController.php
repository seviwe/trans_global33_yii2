<?php

namespace app\controllers;

use Yii;
use app\models\LoadInformation;
use app\models\LoadInformationSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\User;
use yii\filters\AccessControl;
use yii\helpers\Url;
use yii\data\ActiveDataProvider;

/**
 * LoadInformationController implements the CRUD actions for LoadInformation model.
 */
class LoadInformationController extends Controller
{
    /**
     * {@inheritdoc}
     */
    // public function behaviors()
    // {
    //     return [
    //         'access' => [
    //             'class' => AccessControl::class,
    //             // 'rules' => [
    //             //     [
    //             //         'allow' => false,
    //             //         'roles' => ['?'],
    //             //         'denyCallback' => function ($rule, $action) {
    //             //             return $this->redirect(Url::toRoute(['/site/login']));
    //             //         }
    //             //     ],
    //             //     [
    //             //         'actions' => [],
    //             //         'allow' => true,
    //             //         'roles' => ['@'],
    //             //         'matchCallback' => function ($rule, $action) {
    //             //             /** @var User $user */
    //             //             $user = Yii::$app->user->getIdentity();
    //             //             return $user->isAdmin() || $user->isLogist() || $user->isUser();
    //             //         }
    //             //     ],
    //             // ],
    //         ],
    //         'verbs' => [
    //             'class' => VerbFilter::className(),
    //             'actions' => [
    //                 'delete' => ['POST'],
    //             ],
    //         ],
    //     ];
    // }

    /**
     * Lists all LoadInformation models.
     * @return mixed
     */
    public function actionIndex()
    {
        if (!Yii::$app->user->isGuest) {

            $searchModel = new LoadInformationSearch();

            //отображение всех записей под логистом
            if (!Yii::$app->user->isGuest && !Yii::$app->user->getIdentity()->isUser()) {
                $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
            } else { //отображение только записей пользователя
                $query = "select * from load_information where id_user = " . Yii::$app->user->getId();
                $loads = Yii::$app->db->createCommand($query)->queryAll();
                if ($loads) {
                    $dataProvider = new ActiveDataProvider([
                        'query' => LoadInformation::find()->where(['id_user' => Yii::$app->user->getId()]),
                    ]);
                } else {
                    return $this->render('empty_load');
                }
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
     * Lists all LoadInformation models.
     * @return mixed
     */
    public function actionSearch()
    {
        $searchModel = new LoadInformationSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('search', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single LoadInformation model.
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
     * Creates a new LoadInformation model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if (!Yii::$app->user->isGuest) {

            $model = new LoadInformation();

            if ($model->load(Yii::$app->request->post()) /*&& $model->save()*/) {

                $model->date_create = date('d.m.Y H:i');
                $model->id_user = Yii::$app->user->getId();
                $model->name = $model->load_info . ", вес: " . $model->weight_from . ", об.: " . $model->volume_from . ", " . $model->name_city_departure . "->" . $model->name_city_arrival;

                if ($model->save()) {
                    return $this->redirect(['view', 'id' => $model->id]);
                }
            }

            return $this->render('create', [
                'model' => $model
            ]);
        } else {
            return $this->goHome();
        }
    }

    /**
     * Updates an existing LoadInformation model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        if (!Yii::$app->user->isGuest) {

            $model = $this->findModel($id);

            if ($model->load(Yii::$app->request->post()) /*&& $model->save()*/) {

                $model->date_create = date('d.m.Y H:i');
                $model->name = $model->load_info . ", вес: " . $model->weight_from . ", об.: " . $model->volume_from . ", " . $model->name_city_departure . "->" . $model->name_city_arrival;

                if ($model->save()) {
                    return $this->redirect(['view', 'id' => $model->id]);
                }
            }

            return $this->render('update', [
                'model' => $model
            ]);
        } else {
            return $this->goHome();
        }
    }

    /**
     * Deletes an existing LoadInformation model.
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
     * Finds the LoadInformation model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return LoadInformation the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = LoadInformation::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
