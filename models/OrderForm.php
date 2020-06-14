<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class OrderForm extends Model
{
    public $name;
    public $email;
    public $phone;
    public $subject;
    public $body;
    public $verifyCode;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['name', 'email', 'phone'], 'required'],
            ['email', 'email'],
            ['phone', 'number'],
            ['verifyCode', 'captcha'],
        ];
    }

    /**
     * @return array customized attribute labels
     */
    public function attributeLabels()
    {
        return [
            'name' => Yii::t('contact', 'Name'),
            'email' => Yii::t('contact', 'Email'),
            'phone' => Yii::t('contact', 'Phone'),
            'verifyCode' => Yii::t('contact', 'Verification code'),
        ];
    }

    /**
     * Sends an email to the specified email address using the information collected by this model.
     * @return bool whether the model passes validation
     */
    public function order()
    {
        if ($this->validate()) {
            $products = Yii::$app->cart->getItems();

            foreach ($products as $item) {
                $quantity = $item->getQuantity();
                $product = $item->getProduct();

                if ($product->is_sellable && $product->is_rentable) {
                    $productMode = 'Оренда/Продаж';
                } else {
                    if ($product->is_sellable) {
                        $productMode = 'Продаж';
                    } elseif ($product->is_rentable) {
                        $productMode = 'Оренда';
                    }
                }

                $this->body .= "{$product->model} [{$productMode}] ({$quantity})" . PHP_EOL;
            }

            $this->subject = "Замовлення: {$this->phone} {$this->name}";

            Yii::$app->mailer->compose()
                ->setTo(Yii::$app->params['adminEmail'])
                ->setFrom($this->email)
                ->setSubject($this->subject)
                ->setTextBody($this->body)
                ->send();

//            Yii::$app->cart->clear();

            return true;
        }
        return false;
    }
}
