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
        if (!Yii::$app->user->isGuest && Yii::$app->user->getIdentity()->isAdmin()) {
            return $this->render('admin');
        } else {
            return $this->goHome();
        }
    }

    /**
     * Displays logistpanel page.
     *
     * @return string
     */
    public function actionLogist()
    {
        if (!Yii::$app->user->isGuest && (Yii::$app->user->getIdentity()->isLogist() || Yii::$app->user->getIdentity()->isAdmin())) {
            return $this->render('logist');
        } else {
            return $this->goHome();
        }
    }

    public function actionChangeUser()
    {
        return $this->render('change_user');
    }

    public function actionCargoSearch()
    {
        //echo "<pre>"; print_r(Yii::$app->request->post());

        $query = "select * from load_information where id != 0";
        //откуда->куда
        if (!empty(Yii::$app->request->post('id_city_departure'))) {
            $query .= " and id_city_departure = " . Yii::$app->request->post('id_city_departure');
        }
        if (!empty(Yii::$app->request->post('id_city_arrival'))) {
            $query .= " and id_city_arrival = " . Yii::$app->request->post('id_city_arrival');
        }
        //вес
        if (!empty(Yii::$app->request->post('weight_from'))) {
            $query .= " and weight_from >= " . Yii::$app->request->post('weight_from');
        }
        if (!empty(Yii::$app->request->post('weight_to'))) {
            $query .= " and weight_from <= " . Yii::$app->request->post('weight_to');
        }
        //объем
        if (!empty(Yii::$app->request->post('volume_from'))) {
            $query .= " and volume_from >= " . Yii::$app->request->post('volume_from');
        }
        if (!empty(Yii::$app->request->post('volume_to'))) {
            $query .= " and volume_from <= " . Yii::$app->request->post('volume_to');
        }
        //дата
        if (!empty(Yii::$app->request->post('date_departure'))) {
            $query .= " and date_departure like '" . Yii::$app->request->post('date_departure') . "%'";
        }
        if (!empty(Yii::$app->request->post('date_arrival'))) {
            $query .= " and date_arrival like '" . Yii::$app->request->post('date_arrival') . "%'";
        }

        $query .= " ORDER BY date_create";

        $rows = Yii::$app->db->createCommand($query)->queryAll();

        //echo "<pre>"; print_r($rows);

        if ($rows) {
            $result_cargo_search = "<hr>
            <h3 class='mb-3 text-left'>Найдено <b>" . count($rows) . "</b> груза</h4>
            <table class='table table-striped table-bordered'>
            <thead>
                <tr>
                    <th>Направление</th>
                    <th>Транспорт</th>
                    <th>Вес, т / Объем, м3</th>
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
            $result_cargo_search = '<hr><br><div class="container">
            <div class="row justify-content-center mb-4">
               <div class="col-6">
                  <div class="card">
                     <div class="card-body">
                        <h3 class="text-center">Грузы отсутствуют</h3>
                        <hr>
                        <div class="row justify-content-center mb-2">
                           <i class="fas fa-boxes fa-7x"></i>
                        </div>
                        <p class="text-center">
                           Грузы, по указанным параметрам не найдены.<br>Воспользуйтесь <a href="/web/load-information/search">расширенным поиском</a> либо укажите другие данные для поиска.
                        </p>
                     </div>
                  </div>
               </div>
            </div>
         </div>';
        }

        return $this->render('index', [
            'result_cargo_search' => $result_cargo_search,
        ]);
    }

    public function actionTransportSearch()
    {
        //echo "<pre>"; print_r(Yii::$app->request->post());

        $query = "select * from transport where id != 0";
        //откуда->куда
        if (!empty(Yii::$app->request->post('id_city_departure_t'))) {
            $query .= " and id_city_departure = " . Yii::$app->request->post('id_city_departure_t');
        }
        if (!empty(Yii::$app->request->post('id_city_arrival_t'))) {
            $query .= " and id_city_arrival = " . Yii::$app->request->post('id_city_arrival_t');
        }
        //вес
        if (!empty(Yii::$app->request->post('capacity_from'))) {
            $query .= " and capacity >= " . Yii::$app->request->post('capacity_from');
        }
        if (!empty(Yii::$app->request->post('capacity_to'))) {
            $query .= " and capacity <= " . Yii::$app->request->post('capacity_to');
        }
        //объем
        if (!empty(Yii::$app->request->post('volume_from'))) {
            $query .= " and volume >= " . Yii::$app->request->post('volume_from');
        }
        if (!empty(Yii::$app->request->post('volume_to'))) {
            $query .= " and volume <= " . Yii::$app->request->post('volume_to');
        }
        //дата
        if (!empty(Yii::$app->request->post('date_departure'))) {
            $query .= " and date_departure like '" . Yii::$app->request->post('date_departure') . "%'";
        }
        if (!empty(Yii::$app->request->post('date_arrival'))) {
            $query .= " and date_arrival like '" . Yii::$app->request->post('date_arrival') . "%'";
        }

        $query .= " ORDER BY date_departure";

        $rows = Yii::$app->db->createCommand($query)->queryAll();

        //echo "<pre>"; print_r($rows);

        if ($rows) {
            $result_cargo_search = "<hr>
            <h3 class='mb-3 text-left'>Найдено <b>" . count($rows) . "</b> транспорта</h4>
            <table class='table table-striped table-bordered'>
            <thead>
                <tr>
                    <th>Направление</th>
                    <th>Внутр. габ. кузова</th>
                    <th>Грузоподъем., т / Объем, м3</th>
                    <th>Информация</th>
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
                <td>" . $row['body_dimensions'] . "</td>
                <td>" . $row['capacity'] . "/" . $row['volume'] . "</td>
                <td>" . $row['info'] . "</td>
                <td>" . $row['name_city_departure'] . "</td>
                <td>" . $row['name_city_arrival'] . "</td>
                <td>" . $row['rate'] . "</td>
            </tr>";
            }
            $result_cargo_search .= "</tbody>
            </table>";
        } else {
            $result_cargo_search = '<hr><br><div class="container">
            <div class="row justify-content-center mb-4">
               <div class="col-6">
                  <div class="card">
                     <div class="card-body">
                        <h3 class="text-center">Транспорт отсутствует</h3>
                        <hr>
                        <div class="row justify-content-center mb-2">
                           <i class="fas fa-shuttle-van fa-7x"></i>
                        </div>
                        <p class="text-center">
                        Транспорт, по указанным параметрам не найден.<br>Воспользуйтесь <a href="/web/transport/search">расширенным поиском</a> либо укажите другие данные для поиска.
                        </p>
                     </div>
                  </div>
               </div>
            </div>
         </div>';
        }

        return $this->render('index', [
            'result_cargo_search' => $result_cargo_search,
        ]);
    }
}
