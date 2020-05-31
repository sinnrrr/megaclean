<?php

namespace app\controllers;

use Yii;
use yii\helpers\Url;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class CartController extends Controller
{
    public function actionDelete($id)
    {
        if (Yii::$app->request->isPjax) {
            Yii::$app->cart->remove($id);
            return $this->redirect(Url::toRoute(['site/cart', 'm' => 'delete']));
        } else {
            throw new NotFoundHttpException();
        }
    }

    public function actionChange($id, $mode, $quantity)
    {
        if (Yii::$app->request->isPjax) {
            if ($mode == 'increment') {
                Yii::$app->cart->change($id, $quantity + 1);
            } else {
                Yii::$app->cart->change($id, $quantity - 1);
            }

            return $this->redirect(Url::toRoute(['site/cart', 'm' => 'change']));
        } else {
            throw new NotFoundHttpException();
        }
    }

    public function actionAdd($id, $redirect) {
        Yii::$app->cart->add((Object) ['id' => $id], 1);

        $redirect = parse_url($redirect);

        if (isset($redirect['query'])) {
            $redirect = $redirect['path'] . '?' . $redirect['query'] . '&m=add';
        } else {
            $redirect = $redirect['path'] . '?m=add';
        }

        $this->redirect($redirect);
    }
}