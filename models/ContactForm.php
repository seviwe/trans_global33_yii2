<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class ContactForm extends Model
{
    public $name;
    public $phone_number;
    public $email;
    public $subject;
    public $body;
    public $verifyCode;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // name, email, subject and body are required
            [['name', 'phone_number', 'email', /*'subject',*/ 'body'], 'required'],
            // email has to be a valid email address
            ['email', 'email'],
            // verifyCode needs to be entered correctly
            ['verifyCode', 'captcha', 'captchaAction' => 'site/captcha'],
        ];
    }

    /**
     * @return array customized attribute labels
     */
    public function attributeLabels()
    {
        return [
            'verifyCode' => 'Подтвердите код',
            'name' => 'ФИО',
            'phone_number' => 'Номер телефона',
            'email' => 'Электронный адрес',
            // 'subject' => 'Тема',
            'body' => 'Текст сообщения',
        ];
    }

    // public function contact($emailto)
    // {
    //     if ($this->validate()) {

    //         $subject = "Message from Trans Global33";

    //         Yii::$app->mailer->compose()
    //             ->setFrom([$this->email => $this->name]) /* от кого */
    //             ->setTo($emailto) /* куда */
    //             ->setSubject($subject) /* имя отправителя */
    //             ->setTextBody($this->body) /* текст сообщения */
    //             ->send(); /* функция отправки письма */

    //         return true;
    //     }
    //     return false;
    // }

    public function sendMailFromContactForm($view, $subject, $params = [])
    {
        if ($this->validate()) {
            // Set layout params
            //\Yii::$app->mailer->getView()->params['userName'] = "123 test";

            $result = \Yii::$app->mailer->compose([
                'html' => 'views/' . $view . '-html',
                'text' => 'views/' . $view . '-text',
            ], $params)->setFrom([$this->email => $this->name])
                ->setTo(["global33@mail.test" => "Global Trans 33"])
                ->setSubject($subject)
                ->send();

            // Reset layout params
            //\Yii::$app->mailer->getView()->params['userName'] = null;

            return $result;
        }
        return false;
    }
}
