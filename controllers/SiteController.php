<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\SignupForm;
use app\models\LoadInformation;
use app\models\User;
use yii\web\Request;
use yii\db\Query;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    /*public function behaviors()
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
    }*/

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


    //регистрация грузовладельца
    public function actionSignup()
    {
        //если пользователь не гость, тогда редирект на главную страницу
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new SignupForm();

        if ($model->load(\Yii::$app->request->post()) && $model->validate()) {
            $user = new User();

            $user_name = $model->last_name . " " . $model->first_name . " " . $model->middle_name;

            $user->name = $user_name;
            $user->login = $model->login;
            $user->password = \Yii::$app->security->generatePasswordHash($model->password);
            $user->email = $model->email;
            $user->phone = $model->phone;
            $user->role = 1;

            if ($user->save()) {
                Yii::$app->session->setFlash('success', 'Вы успешно зарегистрировались на веб-сайте.');

                return $this->goHome();
            }
        }

        return $this->render('signup', compact('model'));
    }

    //регистрация грузоперевозчика (частное лицо)
    public function actionSignupPrivate()
    {
        //если пользователь не гость, тогда редирект на главную страницу
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new SignupForm();

        if ($model->load(\Yii::$app->request->post()) && $model->validate()) {
            $user = new User();

            $user_name = $model->last_name . " " . $model->first_name . " " . $model->middle_name;

            $user->name = $user_name;
            $user->login = $model->login;
            $user->password = \Yii::$app->security->generatePasswordHash($model->password);
            $user->email = $model->email;
            $user->phone = $model->phone;
            $user->role = 2;

            if ($user->save()) {
                Yii::$app->session->setFlash('success', 'Вы успешно зарегистрировались на веб-сайте.');

                return $this->goHome();
            }
        }

        return $this->render('signup', compact('model'));
    }
    //регистрация грузоперевозчика (компания)
    public function actionSignupCompany()
    {
        //если пользователь не гость, тогда редирект на главную страницу
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new SignupForm();

        if ($model->load(\Yii::$app->request->post()) && $model->validate()) {
            $user = new User();

            $user_name = $model->last_name . " " . $model->first_name . " " . $model->middle_name;

            $user->name = $user_name;
            $user->login = $model->login;
            $user->password = \Yii::$app->security->generatePasswordHash($model->password);
            $user->email = $model->email;
            $user->phone = $model->phone;
            $user->role = 3;

            if ($user->save()) {
                Yii::$app->session->setFlash('success', 'Вы успешно зарегистрировались на веб-сайте.');

                return $this->goHome();
            }
        }

        return $this->render('signup', compact('model'));
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        //если пользователь залогинен, то редикрект на главную страницу
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        //если пользователь неавторизован и вошел в систему
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            Yii::$app->session->setFlash('success', 'Вы успешно авторизовались на веб-сайте.');

            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', ['model' => $model,]);
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

        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['emailto'])) {
            Yii::$app->session->setFlash('success', 'Спасибо за обращение к нам. Мы постараемся ответить Вам как можно скорее.');

            return $this->refresh();
        }
        return $this->render('contact', ['model' => $model,]);
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

    /**
     * Displays adminpanel page.
     *
     * @return string
     */
    public function actionAdmin()
    {
        return $this->render('admin');
    }

    /**
     * Displays logistpanel page.
     *
     * @return string
     */
    public function actionLogist()
    {
        return $this->render('logist');
    }

    public function actionChangeUser()
    {
        return $this->render('change_user');
    }

    public function actionCargoSearch()
    {
        //echo "<pre>"; print_r(Yii::$app->request->post());

        // $rows = (new Query())
        //     ->select('load_information.*, route.id as route_id, route.name as route_name, city.name as city_name, region.name as region_name')
        //     ->from('load_information')
        //     ->join('INNER JOIN', 'route', 'route.id = id_route')
        //     ->join('INNER JOIN', 'city', 'city.id = id_city_departure')
        //     ->join('INNER JOIN', 'region', 'region.id = id_region')
        //     ->where(['city.id_kladr_city' => Yii::$app->request->post('cityDerival_id')])
        //     ->all();

        $rows = (new Query())
            ->from('load_information')
            ->where([
                'id_city_departure' => Yii::$app->request->post('cityDerival_id'),
            ])
            ->all();

        //echo "<pre>"; print_r($rows);
        if ($rows) {
            $result_cargo_search = "<hr>
            <h3 class='mb-3 text-left'>Найдено <b>" . count($rows) . "</b> груза</h4>
            <table class='table table-striped table-bordered'>
            <thead>
                <tr>
                    <th>Направление</th>
                    <th>Транспорт</th>
                    <th>Вес,т / Объем,м3</th>
                    <th>Груз</th>
                    <th>Загрузка</th>
                    <th>Разгрузка</th>
                    <th>Ставка</th>
                </tr>
            </thead>
            <tbody>";
            foreach ($rows as $row) {
                //echo "<pre>"; print_r($row);
                $result_cargo_search .= "<tr>
                <td>" . $row['name_city_departure'] . " -> " . $row['name_city_arrival'] . "</td>
                <td>" . $row['transport'] . "</td>
                <td>" . $row['weight_from'] . "/" . $row['volume_from'] . "</td>
                <td>" . $row['load_info'] . "</td>
                <td>" . $row['name_city_departure'] . "</td>
                <td>" . $row['name_city_arrival'] . "</td>
                <td>" . $row['rate'] . "</td>
            </tr>";
            }
            $result_cargo_search .= "</tbody>
            </table>";
        } else {
            $result_cargo_search = "<hr><b>Ничего не найдено</b>";
        }

        return $this->render('index', [
            'result_cargo_search' => $result_cargo_search,
        ]);
    }
}
