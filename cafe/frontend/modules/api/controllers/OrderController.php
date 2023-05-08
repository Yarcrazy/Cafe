<?php

namespace frontend\modules\api\controllers;

use common\models\Menu;
use common\models\Order;
use common\models\OrderMenu;
use Yii;
use yii\base\UnknownPropertyException;
use yii\rest\Controller;
use yii\web\BadRequestHttpException;
use yii\web\MethodNotAllowedHttpException;
use yii\web\Response;

class OrderController extends Controller
{
    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['contentNegotiator']['formats']['text/html'] = Response::FORMAT_JSON;
        return $behaviors;
    }

    public function actionNew() {
        if (!Yii::$app->request->isPost) {
            throw new MethodNotAllowedHttpException();
        }
        $order = new Order();
        if ($order->save()) {
            return ['id' => $order->id];
        }
    }

    public function actionAddDish() {
        if (!Yii::$app->request->isPost) {
            throw new MethodNotAllowedHttpException();
        }
        $menuId = Yii::$app->request->post('menu_id');
        $orderId = Yii::$app->request->post('order_id');
        $amount = Yii::$app->request->post('amount');

        if (((int) $menuId <= 0) || ((int) $orderId <= 0) || ((int) $amount <= 0)) {
            throw new BadRequestHttpException();
        }
        $menuItem = Menu::findOne(['id' => $menuId]);
        $order = Order::findOne(['id' => $orderId]);
        if (!$menuItem || !$order) {
            throw new UnknownPropertyException();
        }
        $orderMenu = new OrderMenu([
            'order_id' => $order->id,
            'menu_id' => $menuItem->id,
            'amount' => $amount
        ]);
        if ($orderMenu->save()) {
            return ['status' => 'ok'];
        }
    }

    public function actionPopularCooks() {
        if (!Yii::$app->request->isGet) {
            throw new MethodNotAllowedHttpException();
        }
        $from = Yii::$app->request->get('from');
        $to = Yii::$app->request->get('to');
        return Yii::$app->db->createCommand('
            SELECT c.name, sum(om.amount) as sum FROM cafe.public.cook c
            LEFT JOIN cafe.public.dish d on c.id = d.cook_id
            LEFT JOIN cafe.public.menu m on m.dish_id = d.id
            LEFT JOIN cafe.public.order_menu om on om.menu_id = m.id
            LEFT JOIN cafe.public.order o on o.id = om.order_id
            WHERE o.date >= :from AND o.date < :to
            GROUP BY c.name
            ORDER BY sum DESC
            LIMIT 10
        ', [
            ':from' => $from,
            ':to' => $to
        ])->queryAll();
    }
}